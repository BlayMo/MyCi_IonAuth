<?php

/* * **********************************************************
 * The MIT License
 *
 * Copyright 2017 Blas Monerris Alcaraz.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.

  --------------- CodeIgniter -----------------------------------

  @package	CodeIgniter
  @author	EllisLab Dev Team
  @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
  @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
  @license	http://opensource.org/licenses/MIT	MIT License
  @link	https://codeigniter.com
  @since	Version 1.0.0
  @filesource

  --------------------- Mi codigo  -------------------------

  @Proyecto: MyCi_IonAuth
  @Autor:    Blas Monerris Alcaraz
  @Objeto:   Aprendizaje/Desarrollo
  @Comienzo: 18-08-2017
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 7.1.6 + Codeigniter 3.1.5 + DataTables 1.10.13 Bootstrap 3.3.7

  Ion Auth 2 & harviacode/codeigniter-crud-generator

  Script creado el 20-08-2017
 * ******************************************************************** */

if (!defined('BASEPATH')){
exit('No direct script access allowed');}

class Modulos extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Modulos_model');
        $this->load->model('permisos/Permisos_model');
        $this->load->model('grupos/Grupos_model');
    }

    public function index()
    {
        if ( !$this->ion_auth->logged_in() ){ redirect(site_url('auth/login'));}
        
        //actualizo variable de sesion despues de actualizar tabla modulos
        $this->Modulos_model->ordena('modulos.id_grupo ASC');
        $online = $this->ion_auth->logged_in();
        $admin  = $this->ion_auth->is_admin();
        $modulos = $this->Modulos_model->get_all_array($online,$admin);
        $this->session->set_userdata('modulos_data',$modulos);

        $data = array(
            'modulos_data' => $this->Modulos_model->get_all()
        );
        
        $data['barra_nav']         = 'main/main_nav';
        $data['style']             = 'font-size:80%';
        
        $data['titulo_panel']      = 'Gestion Modulos';
        $data['btn_add']           = 'modulos/create';        
        $data['btn_imp']           = '/';
        $data['no_btn_add']        = FALSE;                
        $data['vprevia']           = 'modulos';//  boton vista previa
        $data['vista']             = 'modulos/modulos_list';
        
        $data['crear_disabled']         = '';
        $data['ver_disabled']           = '';
        $data['editar_disabled']        = '';
        $data['borrar_disabled']        = '';
        $data['sololectura']            = FALSE;
        
        //solo administrador tiene derechos sobre este modulo
        if (!$this->ion_auth->is_admin()){
            $data['no_btn_add']             = TRUE;
            $data['crear_disabled']         = ' disabled';
            $data['ver_disabled']           = ' disabled';
            $data['editar_disabled']        = ' disabled';
            $data['borrar_disabled']        = ' disabled';
        }
                        
        $this->_render_page('tablas_view', $this->botones($data));
        
    }

     //prepara botones 
    private function botones($data){
    //en myconfig los botones se definen como activos
        $data['btn_read']     = str_replace('btn-xs',$data['ver_disabled'].   ' btn-xs',$this->config->item('btn_read'));
        $data['btn_update']   = str_replace('btn-xs',$data['editar_disabled'].' btn-xs',$this->config->item('btn_update'));
        $data['btn_del']      = str_replace('btn-xs',$data['borrar_disabled'].' btn-xs',$this->config->item('btn_del'));
        $data['btn_crea']     = str_replace('btn-xs',$data['crear_disabled']. ' btn-xs',$this->config->item('btn_crea'));
        return $data;    
    }

    public function read($id) 
    {
        $row = $this->Modulos_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_modulo' => $row->id_modulo,
		'idmodulo' => $row->idmodulo,
		'id_grupo' => $row->id_grupo,
		'controller' => $row->controller,
		'descripcion' => $row->descripcion,
		'fecha_reg' => $row->fecha_reg,
	    );
            $this->load->view('modulos/modulos_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('modulos'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('modulos/create_action'),
	    'id_modulo' => set_value('id_modulo'),
	    'idmodulo' => set_value('idmodulo'),
	    'id_grupo' => set_value('id_grupo',2),
	    'controller' => set_value('controller'),
	    'descripcion' => set_value('descripcion'),
	    'fecha_reg' => set_value('fecha_reg'),
            'grupos_data' => $this->Grupos_model->get_all(),
            'name' => set_value('name'),
	);
        
        $data['vista'] = 'modulos/modulos_form';
        $this->load->view('read_view', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idmodulo' => generate_token(),
		'id_grupo' => $this->input->post('id_grupo',TRUE),
		'controller' => $this->input->post('controller',TRUE),
		'descripcion' => $this->input->post('descripcion',TRUE),
		'fecha_reg' => ahora(),
	    );
            
            if ($this->input->post('nid_grupo',TRUE) != '0'){
                $data['id_grupo'] = $this->input->post('nid_grupo',TRUE);
            }

            $this->Modulos_model->insert($data);
            //creo modulo en tabla de permisos
            $data2 = array(
		'idpermiso' => $data['idmodulo'],
		'id_user' => 1/*Solo admin puede crear modulos*/,
		'id_group' => $data['id_grupo'],
		'modulo' => $data['controller'],
		'crear' => 0,
		'ver' => 0,
		'editar' => 0,
		'borrar' => 0,
		'sololectura' => 1,
		'fecha_reg' => $data['fecha_reg'],
	    );

            $this->Permisos_model->insert($data2);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('modulos'));
        }
    }
    
    //se ejecuta la primera vez creando los modulos users,grupos,modulos
    //previamente se habran codificado el controlador, modelo y vistas
    public function crea_users(){
        $this->index();//desactivar esta linea para crear los primeros modulos 
        //crea users
        $data = array(
		'idmodulo' => generate_token(),
		'id_grupo' => 1,
		'controller' => 'users',
		'descripcion' => 'Usuarios',
		'fecha_reg' => ahora(),
	    );

            $this->Modulos_model->insert($data);
            //creo modulo en tabla de permisos
            $data2 = array(
		'idpermiso' => $data['idmodulo'],
		'id_user' => 1/*Solo admin puede crear modulos*/,
		'id_group' => $data['id_grupo'],
		'modulo' => $data['controller'],
		'crear' => 0,
		'ver' => 0,
		'editar' => 0,
		'borrar' => 0,
		'sololectura' => 1,
		'fecha_reg' => $data['fecha_reg'],
	    );
            $this->Permisos_model->insert($data2);
            //crea grupos
            $data3 = array(
		'idmodulo' => generate_token(),
		'id_grupo' => 1,
		'controller' => 'grupos',
		'descripcion' => 'Grupos',
		'fecha_reg' => ahora(),
	    );

            $this->Modulos_model->insert($data3);
            //creo modulo en tabla de permisos
            $data4 = array(
		'idpermiso' => $data3['idmodulo'],
		'id_user' => 1/*Solo admin puede crear modulos*/,
		'id_group' => $data3['id_grupo'],
		'modulo' => $data3['controller'],
		'crear' => 0,
		'ver' => 0,
		'editar' => 0,
		'borrar' => 0,
		'sololectura' => 1,
		'fecha_reg' => $data3['fecha_reg'],
	    );
            $this->Permisos_model->insert($data4);
            //crea modulos
            $data5 = array(
		'idmodulo' => generate_token(),
		'id_grupo' => 1,
		'controller' => 'modulos',
		'descripcion' => 'Modulos',
		'fecha_reg' => ahora(),
	    );

            $this->Modulos_model->insert($data5);
            //creo modulo en tabla de permisos
            $data6 = array(
		'idpermiso' => $data5['idmodulo'],
		'id_user' => 1/*Solo admin puede crear modulos*/,
		'id_group' => $data5['id_grupo'],
		'modulo' => $data5['controller'],
		'crear' => 0,
		'ver' => 0,
		'editar' => 0,
		'borrar' => 0,
		'sololectura' => 1,
		'fecha_reg' => $data5['fecha_reg'],
	    );
            $this->Permisos_model->insert($data6);
            
            $this->index();    
            
    }
            
    public function update($id) 
    {
        $row = $this->Modulos_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('modulos/update_action'),
		'id_modulo' => set_value('id_modulo', $row->id_modulo),
		'idmodulo' => set_value('idmodulo', $row->idmodulo),
		'id_grupo' => set_value('id_grupo', $row->id_grupo),
		'controller' => set_value('controller', $row->controller),
		'descripcion' => set_value('descripcion', $row->descripcion),
		'fecha_reg' => set_value('fecha_reg', $row->fecha_reg),
                'grupos_data' => $this->Grupos_model->get_all(),
                'name' => set_value('name', $row->name),
	    );
            
            $data['vista'] = 'modulos/modulos_form';
            $this->load->view('read_view', $data);
            
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('modulos'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_modulo', TRUE));
        } else {
            $data = array(
		/*'idmodulo' => generate_token(),*/
		'id_grupo' => $this->input->post('id_grupo',TRUE),
		'controller' => $this->input->post('controller',TRUE),
		'descripcion' => $this->input->post('descripcion',TRUE),
		'fecha_reg' => ahora(),
	    );
            
            if ($this->input->post('nid_grupo',TRUE) != '0'){
                $data['id_grupo'] = $this->input->post('nid_grupo',TRUE);
            }

            $this->Modulos_model->update($this->input->post('id_modulo', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('modulos'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Modulos_model->get_by_id($id);

        if ($row) {
            $this->Modulos_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('modulos'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('modulos'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('idmodulo', 'idmodulo', 'trim|required');
	$this->form_validation->set_rules('id_grupo', 'id grupo', 'trim|required');
	$this->form_validation->set_rules('controller', 'controller', 'trim|required');
	$this->form_validation->set_rules('descripcion', 'descripcion', 'trim');
	//$this->form_validation->set_rules('fecha_reg', 'fecha reg', 'trim|required');

	$this->form_validation->set_rules('id_modulo', 'id_modulo', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

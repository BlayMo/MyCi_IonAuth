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

  Script creado el 19-08-2017
 * ******************************************************************** */

if (!defined('BASEPATH')){
exit('No direct script access allowed');}

class Permisos extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Permisos_model');
        $this->load->model('users/Users_model'); 
    }

    public function index()
    {
        if ( !$this->ion_auth->logged_in() ){ redirect(site_url('auth/login'));}
        $permisos = $this->Permisos_model->get_all();

        $data = array(
            'permisos_data' => $permisos
        );
        
        $data['barra_nav']         = 'main/main_nav';
        $data['style']             = 'font-size:80%';
        
        $data['titulo_panel']      = 'Gestion permisos';
        $data['btn_add']           = 'permisos/create';        
        $data['btn_imp']           = '/';
        $data['no_btn_add']        = FALSE;//El registro de permisos se crea al crear el modulo                
        $data['vprevia']           = '/';// no boton vista previa
        $data['vista']             = 'permisos/permisos_list';
        $data['otro_btn']          = 'permisos/recrea';
        $data['texto_otro_btn']    = 'Regenerar';
        
        
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
            $data['otro_btn']               = 'permisos';
        }
        
        $this->_render_page('tablas_view', $this->botones($data));
        
    }
    
    //prepara botones segun tabla de permisos
    private function botones($data){
    //en myconfig los botones se definen como activos
        $data['btn_read']     = str_replace('btn-xs',$data['ver_disabled'].   ' btn-xs',$this->config->item('btn_read'));
        $data['btn_update']   = str_replace('btn-xs',$data['editar_disabled'].' btn-xs',$this->config->item('btn_update'));
        $data['btn_del']      = str_replace('btn-xs',$data['borrar_disabled'].' btn-xs',$this->config->item('btn_del'));
        $data['btn_crea']     = str_replace('btn-xs',$data['crear_disabled']. ' btn-xs',$this->config->item('btn_crea'));
        return $data;    
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('permisos/create_action'),
	    'id_permiso' => set_value('id_permiso'),
	    'idpermiso' => set_value('idpermiso'),
	    'id_user' => set_value('id_user',1),	    
	    'modulo' => set_value('modulo',0),
	    'crear' => set_value('crear',0),
	    'ver' => set_value('ver',0),
	    'editar' => set_value('editar',0),
	    'borrar' => set_value('borrar',0),
	    'sololectura' => set_value('sololectura',1),	    
            'users_drop' => $this->Users_model->get_drop(),
	);
        
        $data['vista'] = 'permisos/permisos_form';
        $this->load->view('read_view', $data);
        
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idpermiso' => generate_token(),
		'id_user' => $this->input->post('id_user',TRUE),
		'id_group' => 2,
		'modulo' => $this->input->post('modulo',TRUE),
		'crear' => $this->input->post('crear',TRUE),
		'ver' => $this->input->post('ver',TRUE),
		'editar' => $this->input->post('editar',TRUE),
		'borrar' => $this->input->post('borrar',TRUE),
		'sololectura' => $this->input->post('sololectura',TRUE),
		'fecha_reg' => ahora(),
	    );
            
            if ($this->input->post('nid_user',TRUE) != 0){
                $data['id_user'] = $this->input->post('nid_user',TRUE);
            }

            $this->Permisos_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('permisos'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Permisos_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('permisos/update_action'),
		'id_permiso' => set_value('id_permiso', $row->id_permiso),
		'idpermiso' => set_value('idpermiso', $row->idpermiso),
		'id_user' => set_value('id_user', $row->id_user),
		'id_group' => set_value('id_group', $row->id_group),
		'modulo' => set_value('modulo', $row->modulo),
		'crear' => set_value('crear', $row->crear),
		'ver' => set_value('ver', $row->ver),
		'editar' => set_value('editar', $row->editar),
		'borrar' => set_value('borrar', $row->borrar),
		'sololectura' => set_value('sololectura', $row->sololectura),
		'fecha_reg' => set_value('fecha_reg', $row->fecha_reg),
                'users_drop' => $this->Users_model->get_drop(),
	    );
            
            $data['vista'] = 'permisos/permisos_form';
            $this->load->view('read_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permisos'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_permiso', TRUE));
        } else {
            $data = array(
                /*'idpermiso' => generate_token(),*/
		'modulo' => $this->input->post('modulo',TRUE),
		'crear' => $this->input->post('crear',TRUE),
		'ver' => $this->input->post('ver',TRUE),
		'editar' => $this->input->post('editar',TRUE),
		'borrar' => $this->input->post('borrar',TRUE),
		'sololectura' => $this->input->post('sololectura',TRUE),
		'fecha_reg' => ahora(),
	    );
            
            if ($this->input->post('nid_user',TRUE) != 0){
                $data['id_user'] = $this->input->post('nid_user',TRUE);
            }
                                                
            $this->Permisos_model->update($this->input->post('id_permiso', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permisos'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Permisos_model->get_by_id($id);

        if ($row) {
            $this->Permisos_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('permisos'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permisos'));
        }
    }

    public function _rules() 
    {
	
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');	
	$this->form_validation->set_rules('modulo', 'modulo', 'trim|required');
	$this->form_validation->set_rules('crear', 'crear', 'trim|required|numeric|in_list[0,1]');
	$this->form_validation->set_rules('ver', 'ver', 'trim|required|numeric|in_list[0,1]');
	$this->form_validation->set_rules('editar', 'editar', 'trim|required|numeric|in_list[0,1]');
	$this->form_validation->set_rules('borrar', 'borrar', 'trim|required|numeric|in_list[0,1]');
	$this->form_validation->set_rules('sololectura', 'sololectura', 'trim|required|numeric|in_list[0,1]');
	
	$this->form_validation->set_rules('id_permiso', 'id_permiso', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function recrea(){
        
        $this->load->model(array('users/Registro_model','modulos/Modulos_model'));
        $users_data   = $this->Users_model->get_all();
        $modulos_data = $this->Modulos_model->get_all();
        
        $this->db->truncate('permisos');
        $this->db->truncate('registro');
        
        foreach ($users_data as $user) {
            $valor = 0;
            $sololectura = 1;
            
            if ($user->id == 1){
                $valor = 1;
                $sololectura = 0;
            }
            
            foreach ($modulos_data as $mod){
                $data = array(
                    'idpermiso' => generate_token(),
                    'id_user' => $user->id,
                    'id_group' => $mod->id_grupo,
                    'modulo' => $mod->controller,
                    'crear' => $valor,
                    'ver' => $valor,
                    'editar' => $valor,
                    'borrar' => $valor,
                    'sololectura' => $sololectura,
                    'fecha_reg' => ahora(),
                );
                
                //solo se crean permisos para modulos cuyo grupo es distinto de 1
                if ($mod->id_grupo != 1){
                    $this->Permisos_model->insert($data);}
               
            }
            //registro la creacion de permisos
            $data = array(
		'idregistro' => generate_token(),
		'id_user' => $user->id,
		'fecha_reg' => ahora(),
	    );
            $this->Registro_model->insert($data);        
        }        
        //$this->index();
        redirect(site_url('permisos'));
    }
    
    
}

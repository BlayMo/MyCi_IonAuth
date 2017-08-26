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

  Script creado el 22-08-2017
 * ******************************************************************** */

if (!defined('BASEPATH')){
exit('No direct script access allowed');}

class Grupos extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Grupos_model');
        
    }

    public function index()
    {
        if ( !$this->ion_auth->logged_in() ){ redirect(site_url('auth/login'));}
        $grupos = $this->Grupos_model->get_all();

        $data = array(
            'grupos_data' => $grupos
        );
        
        $data['barra_nav']         = 'main/main_nav';
        $data['style']             = 'font-size:80%';
        
        $data['titulo_panel']      = 'Gestion de Grupos';
        $data['btn_add']           = 'grupos/create';        
        $data['btn_imp']           = '/';
        $data['no_btn_add']        = FALSE;                
        $data['vprevia']           = '/';// no boton vista previa
        $data['vista']             = 'grupos/groupos_list';
        
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
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('grupos/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'description' => set_value('description'),
	);
        
        $data['vista'] = 'grupos/groups_form_new';
        $this->load->view('read_view', $data);
        
    }
    
    public function create_action() 
    {
        $this->_rules_new();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => strtolower($this->input->post('name',TRUE)),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Grupos_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('grupos'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Grupos_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('grupos/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'description' => set_value('description', $row->description),
	    );
            
            $data['vista'] = 'grupos/groups_form_edit';
            $this->load->view('read_view', $data);
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grupos'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules_edit();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => strtolower($this->input->post('name',TRUE)),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Grupos_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('grupos'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Grupos_model->get_by_id($id);

        if ($row) {
            $this->Grupos_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('grupos'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grupos'));
        }
    }

    public function _rules_edit() 
    {
	//$this->form_validation->set_rules('name', 'name', 'trim|required|alpha|is_unique[groups.name]');
	$this->form_validation->set_rules('description', 'description', 'trim|alpha_numeric_spaces');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_new() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required|alpha|is_unique[groups.name]');
	$this->form_validation->set_rules('description', 'description', 'trim|alpha_numeric_spaces');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
}

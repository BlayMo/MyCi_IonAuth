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

  Script creado el 18-08-2017
 * ******************************************************************** */

if (!defined('BASEPATH')){
exit('No direct script access allowed');}

class Users extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array(/*'Users_model',*/'permisos/Permisos_model'));
        
    }

    public function index()
    {
        if ( !$this->ion_auth->logged_in() ){ redirect(site_url('auth/login'));}
                        
        $data = array();
            
        $data['users'] = $this->ion_auth->users()->result();
        foreach ($data['users'] as $k => $user)
        {
            $data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }
                        
        $data['barra_nav']         = 'main/main_nav';
        $data['style']             = 'font-size:80%';
        
        $data['titulo_panel']      = 'Gestion de Usuarios';
        $data['btn_add']           = 'users/create';        
        $data['btn_imp']           = '/';
        $data['no_btn_add']        = FALSE;                
        $data['vprevia']           = '/';// no boton vista previa
        $data['vista']             = 'users/users_list';
        
        //variables de activacion/desactivacion botones 
        $row = $this->Permisos_model->get_by_id_user('users',$this->session->userdata('user_id'));
        $data['crear_disabled']         = ' disabled';
        $data['ver_disabled']           = ' disabled';
        $data['editar_disabled']        = ' disabled';
        $data['borrar_disabled']        = ' disabled';
        $data['sololectura']            = FALSE;
        
        if ($row){
            if ($row->crear == TRUE and $row->sololectura == FALSE){
                $data['crear_disabled']    = '';
            }

            if ($row->ver == TRUE and $row->sololectura == FALSE){
                $data['ver_disabled']      = '';
            }

            if ($row->editar == TRUE and $row->sololectura == FALSE){
                $data['editar_disabled']   = '';
            }

            if ($row->borrar == TRUE and $row->sololectura == FALSE){
                $data['borrar_disabled']   = '';
            }

            if ($row->sololectura == TRUE){
                $data['sololectura']      = TRUE;
            }
        }        
        $this->_render_page('tablas_view', $this->botones($data));  

        //$this->load->view('users/users_list', $data);
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

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'ip_address' => $row->ip_address,
		'username' => $row->username,
		'password' => $row->password,
		'salt' => $row->salt,
		'email' => $row->email,
		'activation_code' => $row->activation_code,
		'forgotten_password_code' => $row->forgotten_password_code,
		'forgotten_password_time' => $row->forgotten_password_time,
		'remember_code' => $row->remember_code,
		'created_on' => $row->created_on,
		'last_login' => $row->last_login,
		'active' => $row->active,
		'first_name' => $row->first_name,
		'last_name' => $row->last_name,
		'company' => $row->company,
		'phone' => $row->phone,
	    );
            $this->load->view('users/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function create(){
        redirect(site_url('auth/create_user'));
    }

    public function crea_permisos($id){
        $this->load->model(array('users/Registro_model','modulos/Modulos_model'));
        $row = $this->Registro_model->get_by_id_user($id);
        if (!$row) {
            $modulos = $this->Modulos_model->get_all();
            foreach ($modulos as $mod){
                $data = array(
                    'idpermiso' => generate_token(),
                    'id_user' => $id,
                    'id_group' => $mod->id_grupo,
                    'modulo' => $mod->controller,
                    'crear' => 0,
                    'ver' => 0,
                    'editar' => 0,
                    'borrar' => 0,
                    'sololectura' => 1,
                    'fecha_reg' => ahora(),
                );
                //solo se crean permisos para modulos cuyo grupo es distinto de 1
                if ($mod->id_grupo != 1){
                    $this->Permisos_model->insert($data);}
            }
            //registro la creacion de permisos
            $data = array(
		'idregistro' => generate_token(),
		'id_user' => $id,
		'fecha_reg' => ahora(),
	    );
            $this->Registro_model->insert($data);
        }else{
            $this->session->set_flashdata('message', 'Permisos creados el '.$row->fecha_reg);
        }
        
        $this->index();        
    }
    
}

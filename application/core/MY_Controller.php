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
  @Comienzo: 04-01-2017
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 7.1.6 + Codeigniter 3.1.5 + DataTables 1.10.13 Bootstrap 3.3.7

  Ion Auth 2 & harviacode/codeigniter-crud-generator

  Script creado el 18-08-2017
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
            
    function __construct(){
        parent::__construct();
               
        $this->load->library(array('ion_auth',
                                   'form_validation'));
        
        //$this->load->helper('htmlpurifier');
        $this->load->model(array('Ion_auth_model'));                                         
        $this->load->helper(array('language','form','array'));
        $this->lang->load('auth');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        date_default_timezone_set("Europe/Madrid");
        
        $this->fecha_act();
        if (ENVIRONMENT != 'production'){
            $this->output->enable_profiler(true);//Activa profiler de Forensics 
        }
                                      
    }
    
    function user_online()
    {
        // Compruebo quien esta online y almaceno sus datos en una cookie de session
        $aDatosUser = array('username' => '');

        if ($this->ion_auth->logged_in())
        {
            $user = $this->ion_auth->user()->row_array();
            
            //datos del usuario
            $aDatosUser = array(
                                'username'  => $user['username'],
                                'user_id'   => $user['id'],                                
                                /*'email'     => $user['email'],
                                'active'    => $user['active'],*/
                                );
            //grupo al que pertenece
            $groups = $this->ion_auth->get_users_groups()->result();
            $aDatosUser['groups'] =  $groups;
            
        }
        $this->session->set_userdata($aDatosUser);
    }
                                
        
    public function _render_page($view, $data = null, $returnhtml = false)
    {
                         
        $this->viewdata = (empty($data)) ? $this->data: $data;
                
        if (!$returnhtml) {
            removeCache();
            $this->load->view($view, $this->viewdata);

        }else{                
            $view_html = $this->load->view($view, $this->viewdata, $returnhtml);
            return $view_html;                    
        }
                   
    }
    
     private function fecha_act() {
        
        createFolder();                
        if (!file_exists('./files/actualizado.json')){
            $jsonvar = json_encode( date(DATE_ISO8601,  time()) ,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK );
            write_file('./files/actualizado.json',$jsonvar,'w+');
        }
        
        $json = file_get_contents('./files/actualizado.json');        
        $this->session->set_userdata('actualizado',json_decode($json));        
    }
      
            
}

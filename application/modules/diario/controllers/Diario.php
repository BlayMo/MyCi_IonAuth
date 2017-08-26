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

class Diario extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Diario_model');
        $this->load->model('permisos/Permisos_model');
    }

    public function index()
    {
        if ( !$this->ion_auth->logged_in() ){ redirect(site_url('auth/login'));}
        $diario = $this->Diario_model->get_all();

        $data = array(
            'diario_data' => $diario
        );
        
        $data['barra_nav']         = 'main/main_nav';
        $data['style']             = 'font-size:80%';
        
        $data['titulo_panel']      = 'Diario Contable';
        $data['btn_add']           = 'diario';        
        $data['btn_imp']           = '/';
        $data['no_btn_add']        = FALSE;                
        $data['vprevia']           = '/';// no boton vista previa
        $data['vista']             = 'diario/diario_list';
        
        //variables de activacion/desactivacion botones 
        $row = $this->Permisos_model->get_by_id_user('diario',
                $this->session->userdata('user_id'));
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


}

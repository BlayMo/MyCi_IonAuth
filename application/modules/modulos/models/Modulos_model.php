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

class Modulos_model extends MY_Model
{

    function __construct()
    {
        parent::__construct();
        $this->table = 'modulos';
        $this->id = 'id_modulo';
        //$this->order = 'DESC';
        $this->order = 'ASC';
        $this->where = $this->table.'.'.$this->id;
        $this->orden = $this->id.' '.$this->order;
    }
    
    
    private function my_set_relation()
    {
        $this->db->select();       
        $this->db->join('groups', 'modulos.id_grupo = groups.id','left');
        //$this->db->join('users', 'blog.id_user = users.id','left');
    }

    // get all
    function get_all_array($online,$admin)
    {
        $ret = array();        
        if ($online){            
            $this->db->select('controller,descripcion');
            //$this->my_set_relation();
            //el administrador tiene acceso a todos los modulos
            if (!$admin){
                $grupo = $this->session->userdata('groups');
                foreach ($grupo as $value) {
                    $this->db->or_where('modulos.id_grupo', $value->id);
                }
            }
            $this->db->order_by($this->orden);
            $ret = $this->db->get($this->table)->result_array();
        }
        
        return $ret;
    }
    
     // get all
    function get_all()
    {
        parent::get_all();
        $this->my_set_relation();
        $this->db->order_by($this->orden);
        return $this->db->get($this->table)->result();
    }
    
    // get data by id
    function get_by_id($id)
    {
        parent::get_by_id($id);
        $this->my_set_relation();
        $this->db->where($this->where, $id);
        //return $this->db->get($this->table)->row();
        return $this->db->get($this->table)->unbuffered_row();        
    }
    
    
}

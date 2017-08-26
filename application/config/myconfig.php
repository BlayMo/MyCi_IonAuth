<?php

/* * **********************************************************
 * The MIT License
 *
 * Copyright 2016 Blas Monerris Alcaraz.
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

  @Proyecto: MyCi_Eventos
  @Autor:    Blas Monerris Alcaraz
  @Objeto:   Desarrollo. Aplicacion para gestion de eventos sociales
  @Comienzo: 06-12-2016
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 7.1.6 + Codeigniter 3.1.5 + DataTables 1.10.13 Bootstrap 3.3.7

  Ion Auth 2 & harviacode/codeigniter-crud-generator

  Script creado el 06-12-2016
 * ******************************************************************** */


defined('BASEPATH') OR exit('No direct script access allowed');

//--------------------- main --------------------------
$config['page_heading']        = 'www.MyCiIonAuth.es';
$config['sitio_web']           = 'Sitio Web';
$config['email_sitio_web']     = 'admin@MyCiIonAuth.es';

//---------------------- botones ---------------------------

$config['btn_cerrar']   = '<button type="button" class="btn  btn-success btn-xs" style="margin:2px"><span class="glyphicon glyphicon-folder-close"></span>  Cerrar</button>';
$config['btn_abrir']    = '<button type="button" class="btn  btn-warning btn-xs" style="margin:2px"><span class="glyphicon glyphicon-folder-open"></span>  Abrir</button>';
$config['btn_read']     = '<button type="button" class="btn  btn-info btn-xs"    style="margin:2px"><span class="glyphicon glyphicon-eye-open"></span>  Ver</button>';
$config['btn_update']   = '<button type="button" class="btn  btn-primary btn-xs" style="margin:2px"><span class="glyphicon glyphicon-edit"></span>  Edita</button>';
$config['btn_del']      = '<button type="button" class="btn  btn-danger btn-xs"  style="margin:2px"><span class="glyphicon glyphicon-trash"></span></button>';
$config['btn_facturar'] = '<button type="button" class="btn  btn-primary btn-xs" style="margin:2px"><span class="glyphicon glyphicon-saved"></span>  Fact</button>';
$config['btn_albaran']  = '<button type="button" class="btn  btn-warning btn-xs" style="margin:2px"><span class="glyphicon glyphicon-indent-left"></span>  Alb</button>';
$config['btn_pdf']      = '<button type="button" class="btn  btn-primary btn-xs" style="margin:2px"><span class="glyphicon glyphicon-file"></span>  Pdf</button>';
$config['btn_crea']     = '<button type="button" class="btn  btn-primary btn-xs" style="margin:2px"><span class="glyphicon glyphicon-plus"></span>  Nuevo</button>';
$config['btn_cobro']    = '<button type="button" class="btn  btn-success btn-xs" style="margin:2px"><span class="glyphicon glyphicon-plus-sign"></span>  Cobro</button>';
$config['btn_abono']    = '<button type="button" class="btn  btn-danger btn-xs" style="margin:2px"><span class="glyphicon glyphicon-hand-down"></span>  Abono</button>';

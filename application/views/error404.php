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

  @Proyecto: MyCi_ElOlivar
  @Autor:    Blas Monerris Alcaraz
  @Objeto:   Desarrollo
  @Comienzo: 27-03-2017
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 7.0.5 + Codeigniter 3.1.4 + DataTables 1.10.13 Bootstrap 3.3.7

  Desarrollo tienda online venta de aceite. Productos e imagenes propiedad
  de J.V. Monerris. Todos los derechos reservados.

  Script creado el 22-05-2017, 18:40:12
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?> 


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="Blas Monerris Alcaraz">
      <title>Error</title>
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <!-- Custom styles for this template -->
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
         .error {
         margin: 0 auto;
         text-align: center;
         }
         .error-code {
         bottom: 60%;
         color: #2d353c;
         font-size: 96px;
         line-height: 100px;
         }
         .error-desc {
         font-size: 12px;
         color: #647788;
         }
         .m-b-10 {
         margin-bottom: 10px!important;
         }
         .m-b-20 {
         margin-bottom: 20px!important;
         }
         .m-t-20 {
         margin-top: 20px!important;
         }
      </style>
   </head>
   <body style="padding-top: 10em;">
      <div class="error">
           <div class="col-md-12 center">
             <h2><a href="<?=site_url('main')?>" class=""><?=base_url()?></a></h2>
         </div>
         <div class="error-code m-b-10 m-t-20">404 <i class="fa fa-warning"></i></div>
         <h3 class="font-bold">No podemos encontrar la p&aacute;gina</h3>
         <div class="error-desc">
            Parece que ha intentado acceder a una p&aacute;gina que no existe. <br/>
            Seguramente a&uacute;n no la tengo desarrollada.<br/>
            Int&eacute;ntelo de nuevo o vuelva a la p&aacute;gina principal del sitio.
            <div>
               <a class=" login-detail-panel-button btn" href="<?=base_url()?>">
               <i class="fa fa-arrow-left"></i>
               Volver al principio <p><img class="img-rounded" src="<?=site_url('assets')?>/Spain-256.png" alt=""/></p>                        
               </a>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   </body>
</html>



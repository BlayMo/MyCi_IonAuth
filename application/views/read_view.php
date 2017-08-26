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
  @Comienzo: 19-02-2017
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 7.0.5 + Codeigniter 3.1.3 + DataTables 1.10.13 Bootstrap 3.3.7

  Ion Auth 2 & harviacode/codeigniter-crud-generator

  Script creado el 26-05-2017, 20:56:32
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
$titulo = $this->config->item('sitio_web');
?> 
   <?php $this->load->view('header_comun')?>
   <body style="padding-bottom: 5em">
       <?php if(isset($barra_nav)){
            $this->load->view($barra_nav);    
       }?>
       <div class="container">
            <?php $this->load->view($vista);?>
       </div>
       <?php /*  ------------- pie de pagina -----------------------*/?>
       <script src="<?php echo base_url('assets/bootstrap/js/jquery.js') ?>"></script>
       <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
       <script type="text/javascript">
      //boton Up   
      $(document).ready(function(){
        $('body').append('<div id="toTop" class="btn btn-info pull-right"><span class="glyphicon glyphicon-chevron-up"></span> Up</div>');
          $(window).scroll(function () {
                          if ($(this).scrollTop() !== 0) {
                                  $('#toTop').fadeIn();
                          } else {
                                  $('#toTop').fadeOut();
                          }
                  }); 
      $('#toTop').click(function(){
          $("html, body").animate({ scrollTop: 0 }, 600);
          return false;
      });
      });
   </script> 
   </body>
</html>


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

  PHP 5.6 - 7.0.5 + Codeigniter 3.1.4 + Bootsrap 3.3.7 + mPdf + moment + geocoder +faker

  Ion Auth 2 & harviacode/codeigniter-crud-generator

  Script creado el 19-02-2017, 13:05:07
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
$cAssets = my_url('assets/bootstrap/css/');
$this->load->view('header_comun');
?>
<body>
   <?php $this->load->view($barra_nav);?>
   <div class="container">      
       <div class="col-md-4 text-center">
            <div  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
      <!--<div class="container">-->
      <div class="row">
         <!--<div class="col-md-12">-->
            <div class="panel panel-default">
               <a class="btn btn-info pull-right" href="#ayuda">Ayuda</a>  
               <div class="panel-heading">
                  <h3 class="panel-title"><?=$titulo_panel?></h3>                  
               </div>
               <div class="panel-body">                   
                <?php $this->load->view($vista);?>                   
               </div>
                <div class="panel-footer text-right">
                    <?php if (isset($otro_btn)){
                        echo anchor(site_url($otro_btn), $texto_otro_btn, 'class="btn btn-danger '.$crear_disabled.'"');}
                    ?> 
                    <?php if (!$no_btn_add){
                        echo anchor(site_url($btn_add), 'Nuevo', 'class="btn btn-primary '.$crear_disabled.'"');}
                    ?>                    
                    <?php echo anchor(site_url($vprevia), 'Vista Previa', 'class="btn btn-info" '); ?>  
                </div> 
            </div>
             
         <!--</div>-->
      </div>
      <!--</div>-->
             
   </div>
  <?php $this->load->view('copyright_footer');?>
    <?php $this->load->view('footer_scripts_js');?> 
    
    <script type="text/javascript">
        $(document).ready(function () {
            $("#mytable").dataTable({                
                "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"] ],
                "responsive": true,
                "searching": true,
                "ordering": true,                
                "processing": true,
                "language": {
                "url": "<?=my_url('assets/datatables/spanish.json')?>"
            }
            });              
        });        
    </script>
               
</body>
</html>


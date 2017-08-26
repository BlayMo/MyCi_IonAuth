
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

  --------------------- xxxxxx -------------------------

  @Proyecto: MyCi_IonAuth
  @Autor:    Blas Monerris Alcaraz
  @Objeto:   Aprendizaje/Desarrollo
  @Comienzo: 09-08-2016
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.1

  @mail: expresoweb2015@gmail.com

  PHP7 + Codeigniter 3.1.0 + addon

  Ion Auth 2 & harviacode/codeigniter-crud-generator

  Script creado el 04-12-2016
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
        <link rel="icon" href="../../favicon.ico">
        <title>Login</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?=my_url('assets/bootstrap/css/bootstrap.min.css')?>">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            body {                
/*            background-image: url("<?=my_url('').'assets/Foto-0068.jpg';?>");
            opacity: 0.8;*/
            }
        </style>
    </head>
    <body>
        <!--login modal-->
        <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="text-center" style="color:blue">Bienvenido a <a href="<?=site_url('/')?>"><?=$this->config->item('sitio_web')?></a></h1>
                        <!--<h3 class="text-center" style="color:red">Mis Cuentas</h3>-->
                        <h3 class="text-center" style="color:red">...cualquier texto... </h3>
                    </div>
                    <div class="modal-body">
                        <?php if($message): ?>
                        <div class="alert alert-warning">
                            <?php echo $message; ?>
                        </div>
                        <?php endif; ?>          
                        <?php echo form_open(site_url('auth/login'), 'class="form col-md-12 center-block"' )?>      
                        <div class="form-group">
                            <?php echo form_input($identity, null, 'class="form-control input-lg" placeholder="Email"');?>
                        </div>
                        <div class="form-group">
                            <?php echo form_input($password, null, 'class="form-control input-lg" placeholder="'.lang('login_password_label').'"');?>
                        </div>
                        <div class="form-group">
                            <?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-primary btn-lg btn-block"');?>                            
                        </div>
                        </form>
                        <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
    </body>
</html>


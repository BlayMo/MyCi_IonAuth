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

  Script creado el 19-08-2017
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?> 



<h2 style="margin-top:0px">Permisos <?php echo $button ?></h2>
<!--<form>-->
<?php echo form_open($action); ?>
   
   <div class="form-group">
      <label for="int">Id User <?php echo form_error('id_user') ?></label>
      <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" readonly />
      <select class="form-control" name="nid_user">
        <option value="0">Usuarios</option>
        <?php foreach ($users_drop as $value) {
           echo '<option value="'.$value->id.'">'.$value->username.'</option>';
           }?>                   
     </select>
   </div>
   <div class="form-group">
      <label for="varchar">Modulo <?php echo form_error('modulo') ?></label>
      <input type="text" class="form-control" name="modulo" id="modulo" placeholder="Modulo" value="<?php echo $modulo; ?>" />
   </div>
   <div class="form-group">
      <label for="tinyint">Crear <?php echo form_error('crear') ?></label>
      <input type="number" class="form-control" name="crear" id="crear" placeholder="Crear" value="<?php echo $crear; ?>" />
   </div>
   <div class="form-group">
      <label for="tinyint">Ver <?php echo form_error('ver') ?></label>
      <input type="number" class="form-control" name="ver" id="ver" placeholder="Ver" value="<?php echo $ver; ?>" />
   </div>
   <div class="form-group">
      <label for="tinyint">Editar <?php echo form_error('editar') ?></label>
      <input type="number" class="form-control" name="editar" id="editar" placeholder="Editar" value="<?php echo $editar; ?>" />
   </div>
   <div class="form-group">
      <label for="tinyint">Borrar <?php echo form_error('borrar') ?></label>
      <input type="number" class="form-control" name="borrar" id="borrar" placeholder="Borrar" value="<?php echo $borrar; ?>" />
   </div>
   <div class="form-group">
      <label for="tinyint">Solo lectura <?php echo form_error('sololectura') ?></label>
      <input type="number" class="form-control" name="sololectura" id="sololectura" placeholder="Sololectura" value="<?php echo $sololectura; ?>" />
   </div> 
   <input type="hidden" name="id_user"      value="<?php echo $id_user; ?>" />
   <input type="hidden" name="id_permiso"   value="<?php echo $id_permiso; ?>" /> 
   <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
   <a href="<?php echo site_url('permisos') ?>" class="btn btn-default">Cancel</a>
</form>


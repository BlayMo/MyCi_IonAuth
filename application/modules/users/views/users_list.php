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

?>


<table class="table table-bordered table-responsive table-striped" id="zmytable">
   <thead>
      <tr>
         <th width="80px">No</th>
         <th><?php echo lang('index_fname_th');?></th>
         <th><?php echo lang('index_lname_th');?></th>
         <th><?php echo lang('index_email_th');?></th>
         <th><?php echo lang('index_groups_th');?></th>
         <th><?php echo lang('index_status_th');?></th>
         <th><?php echo lang('index_action_th');?></th>
      </tr>
   </thead>
   <tbody>
      <?php
         $start = 0;
         foreach ($users as $user)
         {
             ?>
      <tr>
         <td><?php echo $user->id ?></td>
         <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
         <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
         <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
         <td>
            <?php foreach ($user->groups as $group):?>
            <?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8') ;?><br />
            <?php endforeach?>
         </td>
         <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link'),'class="btn btn-danger btn-xs '.$editar_disabled.'"'.' style="margin:2px"') : anchor("auth/activate/". $user->id, lang('index_inactive_link'),'class="'.$editar_disabled.'"');?></td>
         <td>
             <?php echo anchor("auth/edit_user/".$user->id,$btn_update,'class="btn btn-xs '.$editar_disabled.'"') ;?>
             <?php echo anchor("users/crea_permisos/".$user->id,'  Permisos', 'class="btn btn-danger '.$editar_disabled.' btn-xs"') ;?>
         </td>
      </tr>
      <?php
         }
         ?>
   </tbody>
</table>



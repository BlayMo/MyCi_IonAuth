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
<table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>		    
		    <th>Numero</th>
		    <th>Fecha Asiento</th>
		    <th>Factura Emitida</th>
		    <th>Factura Recibida</th>
		    <th>Concepto</th>
		    <th>Importe</th>
		    <th>Signo</th>
		    <th>Cuenta Debe</th>
		    <th>Cuenta Haber</th>		    
		    <th>Dia</th>
		    <th>Mes</th>
		    <th>A&ntilde;o</th>
		    <th>Trimestre</th>		    
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($diario_data as $diario)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>		    
		    <td><?php echo $diario->numero ?></td>
		    <td><?php echo $diario->fecha_asiento ?></td>
		    <td><?php echo $diario->factura_emitida ?></td>
		    <td><?php echo $diario->factura_recibida ?></td>
		    <td><?php echo $diario->concepto ?></td>
		    <td><?php echo $diario->importe ?></td>
		    <td><?php echo $diario->signo ?></td>
		    <td><?php echo $diario->cuenta_debe ?></td>
		    <td><?php echo $diario->cuenta_haber ?></td>		    
		    <td><?php echo $diario->dia ?></td>
		    <td><?php echo $diario->mes ?></td>
		    <td><?php echo $diario->anno ?></td>
		    <td><?php echo $diario->trimestre ?></td>		    
		    <td style="text-align:center">
			<?php 
			echo anchor(site_url('diario/read/'.$diario->id_asiento),$btn_read,'class="btn btn-xs '.$ver_disabled.'"'); 
			//echo ' | '; 
			echo anchor(site_url('diario/update/'.$diario->id_asiento),$btn_update,'class="btn btn-xs '.$editar_disabled.'"'); 
			//echo ' | '; 
			echo anchor(site_url('diario/delete/'.$diario->id_asiento),$btn_del,'class="btn btn-xs '.$borrar_disabled.'"'.'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

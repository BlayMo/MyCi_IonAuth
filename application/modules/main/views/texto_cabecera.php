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

  @Proyecto: MyCi_Proyecto
  @Autor:    Blas Monerris Alcaraz
  @Objeto:   Aprendizaje/Desarrollo
  @Comienzo: 18-08-2017
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 7.1.6 + Codeigniter 3.1.5 + otrosoftw

  textoacambiar

  Script creado el 24-08-2017
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
<hr>
<pre>
    Aplicación base realizada con Codeigniter 3.1.5 + IonAuth 2 para gestión de usuarios, grupos y acceso a modulos a nivel de usuario.
    La aplicación controla el acceso -login- y las tareas básicas -CRUD- a realizar en los módulos.
    Desarrollada bajo el pattern HMVC, cada módulo es una unidad lógica independiente, compuesta de modelo, vista y controlador.
    La base de datos contiene, entre otras, las siguientes tablas:
        - Permisos => Contiene los campos: usuarios, módulo, crear, ver, editar y sololectura.
                      Esta tabla  registra: quien -usuario-, donde -módulo- y como -crear,leer...- se accede.
        - Modulos =>  Contiene los campos: controller, grupo, descripcion.
                      Esta tabla  registra el controlador del módulo y el grupo al que pertenece dicho módulo. 
                      La información del campo 'descripcion' es el item que aparece en el menu de navegación.
        - Diario =>   Tabla de ejemplo con supuestos datos contables perteneciente al módulo 'Contabilidad'.
                      Esta tabla pertenece al grupo 'Contabilidad' y solo los usuarios pertenecientes a este grupo pueden acceder a este módulo.
                      La tabla 'permisos' registra por cada usuario del grupo, que autorizaciones de acceso  tiene cada uno. De esta forma un usuario
					  en un modulo determinado puede tener permisos para 'crear' y 'editar' y otro usuario solo 'sololectura'.
	
    El/los usuarios pertenecientes al grupo 'admin', tienen acceso total a todos los módulos. Es el "Administrator" el único que puede 'CRUD' en
    en las tablas de administracion : Permisos, users, grupos, módulos. Es además el único que puede modificar los permisos para los usuarios que no pertenecen
    al grupo 'admin'.	
</pre>


    <div class="row">
        <div class="col-lg-12" >
            <div class="well">
                <div id="pusers">
                <h3 >Tabla de usuarios</h3>
<pre>
    Una vez creado un nuevo usuario, con el botón "permisos" se crean en la tabla de "permisos" un registro por cada módulo.  Esta acción solo
    se puede ejecutar una sola vez y solo después de que el usuario haya sido creado.
    Esta acción queda registrada en la tabla "registro". No he desarrollado un módulo para esta tabla. Solo se usa para evitar que se repita
    la accion de crear permisos.
</pre>
                <img  class="img-responsive img-rounded" src="<?=my_url('files/')?>tabla_users.jpg"/>
                <pre>
                    Para acceso -Login- :
                        - Administrator <strong>admin@admin.com</strong>
                          Password      <strong>password</strong>
                        
                        - Usuario Testeo  <strong>test@mail.com</strong>
                          Password          <strong>12345678</strong>
                </pre>
                <hr>
                </div>
                <div id="pperm">
                <h3>Tabla de permisos</h3>
<pre>
    Por defecto los permisos asignados son: "0" => NO, "1" => SI.
    Ejemplo: Para que el usuario "test@mail.com" pueda editar registros en el módulo diario:
             Modificar en permisos "Editar" => 1 y "Solo Lectura" => 0.
    Para realizar cualquiera de las acciones CRUD: "sololectura" => "0", "crear" => "1", "editar" => "1", "ver" => "1", "borrar" => "1".
    Cuando "sololectura" => "1", las demás acciones no se realizan.
    Regenerar reinicializa para cada usuario todos los permisos a los diferentes módulos.
</pre>                
                <img  class="img-responsive img-rounded" src="<?=my_url('files/')?>tabla_permisos.jpg"/>
                <hr>
                </div>
                <div id="pmod">
                <h3>Tabla de modulos</h3>
<pre>
    Cuando se crea un nuevo módulo, se asigna a un grupo, de esta forma solo los usuarios pertenecientes a ese grupo tienen acceso al módulo.
    El campo "controller" contiene el nombre del controlador.
    El campo "descripcion" contiene la etiqueta que aparece en el menú de usuario.
    Borrar un módulo, significa eliminar el acceso a ese módulo.
    
    <strong>MUY IMPORTANTE: El programa no crea código ni borra carpetas en la estructura de la aplicación.</strong> Cuando se crea un módulo el programador debe
    crear el código que corresponda siguiendo el patrón HMVC. Sirva de ejemplo, los diferentes módulos ya creados en la carpeta 'aplication/modules'.
</pre>                
                <img  class="img-responsive img-rounded" src="<?=my_url('files/')?>tabla_modulos.jpg"/>
                <hr>
                </div>
                <div id="pnav">
                <h3>Menu de usuario 'Administrator'</h3>
                <pre>
                    Opciones de acceso del usuario "Administrator".
                </pre>
                <img  class="img-responsive img-rounded" src="<?=my_url('files/')?>menu_usuario.jpg"/>
                </div>
            </div>
        </div>
    </div>
<!--<div class="container">-->
    <div class="row">
        <div class="col-lg-6" id="plogin">
            <h3 class="text-center">Pantalla Login</h3>                
            <img  class="img-responsive img-rounded" src="<?=my_url('files/')?>pantalla_login.jpg"/>
        </div>
        <div class="col-lg-6" id="ppermisos">
            <h3 class="text-center">Pantalla Permisos</h3>                
            <img  class="img-responsive img-rounded" src="<?=my_url('files/')?>pantalla_permisos.jpg"/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6" id="pmodulos">
           <h3 class="text-center">Pantalla Modulos</h3>                
            <img  class="img-responsive img-rounded" src="<?=my_url('files/')?>pantalla_modulos.jpg"/>
        </div>
        <div class="col-lg-6">
            <h3 class="text-center">Controlador Diario. Código control permisos</h3>
        <pre>                 
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
        </pre>
        </div>
    </div>
<!--</div>-->

</div>


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

  Script creado el 23-08-2017
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Generate an encryption key for CodeIgniter.
 * http://codeigniter.com/user_guide/libraries/encryption.html
 */
 
function generate_token ($len = 32){
    $chars = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    );
    shuffle($chars);
    $num_chars = count($chars) - 1;
    $token = '';
    // Create random token at the specified length.
    for ($i = 0; $i < $len; $i++)
    {
            $token .= $chars[mt_rand(0, $num_chars)];
    }
return $token;
}


//devuelve la url sin la cadena "public/"
function my_url($param)
{        
    return str_replace('public/','',site_url($param));    
}


// Cambiando las cabeceras conseguimos que se refresque
// la página sin tener que forzar una recarga de nuestro navegador.
// Ver codeigniter CI_output set_header
function removeCache()
{
    $CI =& get_instance();
    $CI->output->set_header("HTTP/1.0 200 OK");
    $CI->output->set_header("HTTP/1.1 200 OK");
    $CI->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
    $CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
    $CI->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
    $CI->output->set_header('Pragma: no-cache');
}


//devuelve la fecha local formateada para events empleando la libreria moment
function ahora()
{    
    //gmDate("Y-m-d\TH:i:s\Z")
    //return gmdate(DATE_ISO8601); fecha GMT
    //return date("Y-m-d\TH:i:s\Z",  time()); //fecha local
    //date("Y-m-d H:i:s"); TIMESTAMP MySQL                
    return date(DATE_ISO8601,  time()); //fecha local si no empleamos moment             
}

//presenta SI o NO en funcion del valor
function puede($valor){
        if ($valor == 0){
            $ret = 'NO';
        }else{
            $ret = 'SI';
        }
        
        return $ret;
    }

//crea la carpeta 
function createFolder(){
    if(!is_dir("./files"))
    {
        mkdir("./files", 0777);
        //mkdir("./files/pdfs", 0777);
    }
}    

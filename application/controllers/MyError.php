<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MyError extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('error404');//Carga pagina en carpeta view
        //include_once './error404.html';
    }

}

/* End of file MyError.php */


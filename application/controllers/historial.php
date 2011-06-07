<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Historial extends CI_Controller {

    function __construct()
    {
            parent::__construct();
    }

    function index()
    {
    }

    function set($id)
    {
        $data['id'] = $id;
        $this->load->view("cuestionario", $data);
    }
}
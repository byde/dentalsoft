<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caja extends CI_Controller {

    function __construct()
    {
            parent::__construct();
    }

    function index()
    {

    }

    function cobrar($idagenda)
    {
        $this->load->model("agenda_model");
        $data['conceptos'] = $this->agenda_model->get_tratamientos_by_idagenda($idagenda);
        $sum=0;
        $data['idagenda'] = $idagenda;
        foreach($data['conceptos'] as $c):
            $sum += $c['costo'];
        endforeach;
        $data['total'] = $sum;
        $this->load->view("cobrar",$data);
    }
    
    function guardar($idagenda)
    {
        
    }
}
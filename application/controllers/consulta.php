<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta extends CI_Controller {

    function __construct()
    {
            parent::__construct();
    }

    function index()
    {

    }

    function consultar($idagenda)
    {
        $data['idagenda'] = $idagenda;
        $this->load->model("pacientes_model");
        $data['paciente'] = $this->pacientes_model->get_paciente_by_idagenda($idagenda);
        $this->load->view("consulta", $data);
    }

    function guardar($idagenda)
    {
        $this->load->model("historial_model");
        $this->historial_model->set_consulta($idagenda);
    }
    
    function ver($idconsulta)
    {
        $this->load->model("historial_model");
        $data['consulta'] = $this->historial_model->get_consulta_by_idconsulta($idconsulta);
        $this->load->view("historial/verConsulta",$data);
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Historial extends CI_Controller {

    function __construct()
    {
            parent::__construct();
    }

    function index()
    {
    }

    function guardar($idagenda,$idpaciente)
    {
        $this->load->model("historial_model");
        $this->historial_model->set_historial($idagenda, $idpaciente);
        echo "true";
    }
    
    function lista($idpaciente)
    {
        $this->load->model("historial_model");
        $data["cuestionarios"] = $this->historial_model->get_cuestionarios_by_idpaciente($idpaciente);
        $this->load->view("historial/listaCuestionarios", $data);
    }
    
    function ver($idcuestionario)
    {
        $this->load->model("historial_model");
        $data["cuestionario"] = $this->historial_model->get_cuestionario_by_idcuestionario($idcuestionario);
        $this->load->view("historial/verCuestionario", $data);
    }
}
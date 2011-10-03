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
    
    function imprimir($idcuestionario)
    {
        $this->load->model("historial_model");
        $data["cuestionario"] = $this->historial_model->get_cuestionario_by_idcuestionario($idcuestionario);
        $this->load->model("usuarios_model");
        $data['dr'] = $this->usuarios_model->get_usuario_by_idagenda($data["cuestionario"]['idagenda']);
        $data["meses"] = array(
            1 => "Enero",
            2 => "Febrero",
            3 => "Marzo",
            4 => "Abril",
            5 => "Mayo",
            6 => "Junio",
            7 => "Julio",
            8 => "Agosto",
            9 => "Septiembe",
            10 => "Octubre",
            11 => "Noviembre",
            12 => "Diciembe"
        );
        $this->load->view("historial/print", $data);
    }
}
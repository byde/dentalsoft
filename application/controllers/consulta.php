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
        echo $this->historial_model->set_consulta($idagenda);
    }
    
    function ver($idconsulta)
    {
        $this->load->model("historial_model");
        $data['consulta'] = $this->historial_model->get_consulta_by_idconsulta($idconsulta);
        $data['simbolos'] = $this->historial_model->get_simbolos_by_idconsulta($idconsulta);
        $data["rutas"] = array(
            1=>"ausencia",
            2=>"caries",
            3=>"restauracion",
            4=>"extraccion",
            5=>"endodoncia",
            6=>"protesis",
            7=>"dolorvertical",
            8=>"dolorhorisontal",
            9=>"movilidad",
            10=>"extrusion"
            );
        $this->load->view("historial/verConsulta",$data);
    }
    
    function imprimir($idconsulta)
    {
        $this->load->model("historial_model");
        $data['consulta'] = $this->historial_model->get_consulta_by_idconsulta($idconsulta);
        $data['simbolos'] = $this->historial_model->get_simbolos_by_idconsulta($idconsulta);
        $data["rutas"] = array(
            1=>"ausencia",
            2=>"caries",
            3=>"restauracion",
            4=>"extraccion",
            5=>"endodoncia",
            6=>"protesis",
            7=>"dolorvertical",
            8=>"dolorhorisontal",
            9=>"movilidad",
            10=>"extrusion"
            );
        $this->load->model("usuarios_model");
        $this->load->model("pacientes_model");
        $data["paciente"] = $this->pacientes_model->get_paciente_by_idagenda($data["consulta"]['idagenda']);
        $data['dr'] = $this->usuarios_model->get_usuario_by_idagenda($data["consulta"]['idagenda']);
        $data['edad'] = floor((time() - strtotime($data['paciente']['fecnac']))/31556926);
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
        $this->load->view("historial/printConsulta",$data);
    }
    
    function set_odontograma($idconsulta, $tipo, $left, $top)
    {
        $this->load->model("historial_model");
        $this->historial_model->set_simbolo($idconsulta, $tipo, $left, $top);
    }
}
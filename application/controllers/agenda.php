<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

    function __construct()
    {
            parent::__construct();
    }

    function index()
    {
	$this->load->library('session');
        $this->load->model("consultorios_model");
        $this->load->model("agenda_model");
        $data['consultorios'] =$this->consultorios_model->get_consultorios_by_activo();
        $data['horas'] = $this->agenda_model->get_horarios();
        $data['duracion'] = $this->session->userdata("agenda_duracion");
        $this->load->view("agenda", $data);
    }

    function medico($idpaciente)
    {
	$this->load->library('session');
        $this->load->model("usuarios_model");
        $data['medicos'] =$this->usuarios_model->get_medicos();
        $this->load->model("pacientes_model");
        $data['paciente'] = $this->pacientes_model->get_paciente_by_id($idpaciente);
        $this->load->model("tratamientos_model");
        $data['tratamientos'] = $this->tratamientos_model->get_tratamientos();
        $this->load->view("agenda/medico", $data);
    }

    function set_medico()
    {
	$this->load->library('session');
        $this->session->set_userdata("agenda_medico",  $this->input->post("medico"));
        $this->session->set_userdata("agenda_trat",  $this->input->post("trat"));
        $this->session->set_userdata("agenda_paciente",  $this->input->post("idpaciente"));

        $this->load->model("tratamientos_model");
        $tiempo = 0;
        foreach($this->input->post("trat") as $t):
                $t = $this->tratamientos_model->get_tiempo_by_tratamiento($t, $this->session->userdata("idusuario"));
                $tiempo += ($t == 0 ) ? 0 : $t['tiempo'];
        endforeach;
        $tiempo = ($tiempo == 0) ? 1 : $tiempo;
        $this->session->set_userdata("agenda_duracion", $tiempo);
        return "true";
    }

    function set_hora()
    {
	$this->load->library('session');
        $this->session->set_userdata("agenda_hora",  $this->input->post("seleccionada"));
        $this->session->set_userdata("agenda_fecha",  $this->input->post("fecha"));
        $this->session->set_userdata("agenda_consultorio",  $this->input->post("consultorio"));
        echo "true";
    }

    function aceptar()
    {
	$this->load->library('session');
        $this->load->model("usuarios_model");
        $data['medico'] = $this->usuarios_model->get_usuario_by_id($this->session->userdata("agenda_medico"));
        $this->load->model("tratamientos_model");
        $data['tratamientos'] = array();
        foreach($this->session->userdata("agenda_trat") as $t)
            $data['tratamientos'][] = $this->tratamientos_model->get_tratamiento_by_id($t);
        $data['fecha'] = $this->session->userdata("agenda_fecha");
        $this->load->model("agenda_model");
        $data['inicio'] = $this->agenda_model->get_hora_by_id($this->session->userdata("agenda_hora"));
        $data['fin'] = $this->agenda_model->get_hora_by_id($this->session->userdata("agenda_hora")+$this->session->userdata("agenda_duracion"));
        $diat = split('-', $this->session->userdata("agenda_fecha"));
        $dia = sprintf("%s-%s-%s", $diat[2],$diat[1],$diat[0]);
        $cita = array(
            "consultorio" => $this->session->userdata("agenda_consultorio"),
            "fecha" => $dia,
            "idpaciente" => $this->session->userdata("agenda_paciente"),
            "inicia" => $this->session->userdata("agenda_hora"),
            "termina" => $this->session->userdata("agenda_hora")+$this->session->userdata("agenda_duracion")-1,
            "medico" => $this->session->userdata("agenda_medico")
        );
        $this->agenda_model->set_cita($cita);
        $this->load->view("agenda/aceptar",$data);
    }

    function horario()
    {
	$this->load->library('session');
        $this->load->model("consultorios_model");
        $this->load->model("agenda_model");
        $data['consultorios'] =$this->consultorios_model->get_consultorios_by_activo();
        $data['horas'] = $this->agenda_model->get_horarios();
        $data['duracion'] = $this->session->userdata("agenda_duracion");
        $this->load->view("agenda/agenda", $data);
    }

    function horariocodi($consultorio, $dia)
    {
	$this->load->library('session');
        $this->load->model("agenda_model");
        $diat = split('-', $dia);
        $dia = sprintf("%s-%s-%s", $diat[2],$diat[1],$diat[0]);
        $data['horas'] = $this->agenda_model->get_horarios_by_con_dia_med($consultorio, $dia, $this->session->userdata("agenda_medico"));
        //$data
        echo json_encode($data);
    }

    function horariocodism($consultorio, $dia)
    {
        $this->load->model("agenda_model");
        $diat = split('-', $dia);
        $dia = sprintf("%s-%s-%s", $diat[2],$diat[1],$diat[0]);
        $data['horas'] = $this->agenda_model->get_horarios_by_con_dia($consultorio, $dia);
        //$data
        echo json_encode($data);
    }
}
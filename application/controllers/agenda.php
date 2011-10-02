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
                $tra = $this->tratamientos_model->get_tiempo_by_tratamiento($t, $this->input->post("medico"));
                $tiempo += (!is_array($tra)) ? 1 : $tra['tiempo'];
        endforeach;
        $this->session->set_userdata("agenda_duracion", $tiempo);
        return "true " .$this->input->post("medico");
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
        $diat = explode('-', $this->session->userdata("agenda_fecha"));
        $dia = sprintf("%s-%s-%s", $diat[2],$diat[1],$diat[0]);
        $cita = array(
            "consultorio" => $this->session->userdata("agenda_consultorio"),
            "fecha" => $dia,
            "idpaciente" => $this->session->userdata("agenda_paciente"),
            "inicia" => $this->session->userdata("agenda_hora"),
            "termina" => $this->session->userdata("agenda_hora")+$this->session->userdata("agenda_duracion"),
            "medico" => $this->session->userdata("agenda_medico")
        );
        $idagenda = $this->agenda_model->set_cita($cita);
        $this->agenda_model->set_tratamientos_by_idagenda($idagenda, $data["tratamientos"]);
        $this->load->view("agenda/aceptar",$data);
    }

    function horario()
    {
	$this->load->library('session');
        $this->load->model("consultorios_model");
        $this->load->model("agenda_model");
        $data["fecha"] = date('d-m-Y');
        $data['consultorios'] =$this->consultorios_model->get_consultorios_by_activo();
        $data['horas'] = $this->agenda_model->get_horarios();
        $data['duracion'] = $this->session->userdata("agenda_duracion");
        $data["re"] = ($this->session->userdata("agenda_idagenda")>0) ? "re" : "";
        $this->load->view("agenda/agenda", $data);
    }

    function horariocodi($consultorio, $dia)
    {
	$this->load->library('session');
        $this->load->model("agenda_model");
        $diat = explode('-', $dia);
        $dia = sprintf("%s-%s-%s", $diat[2],$diat[1],$diat[0]);
            $data['horas'] = $this->agenda_model->get_horarios_by_con_dia_med($consultorio, $dia, $this->session->userdata("agenda_medico"));
        //$data
        echo json_encode($data);
    }

    function horariocodism($consultorio, $dia)
    {
        $this->load->model("agenda_model");
        $diat = explode('-', $dia);
        $dia = sprintf("%s-%s-%s", $diat[2],$diat[1],$diat[0]);
        $data['horas'] = $this->agenda_model->get_horarios_by_con_dia($consultorio, $dia);
        //$data
        echo json_encode($data);
    }
    
    function confirmar()
    {
        $this->load->view("agenda/filtroConfirmar");
    }
    function confirma($dia)
    {
        $this->load->model("agenda_model");
        $data['citas'] = $this->agenda_model->get_confirma($dia);
        $data['dia'] = $dia;
        //echo $dia;
        $this->load->view("agenda/listaConfirma", $data);
    }
    function confirmarcita($idagenda, $dia)
    {
        $this->load->model("agenda_model");
        $this->agenda_model->set_confirma($idagenda);
        echo '<div class="notification success"> <span class="strong">Confirmacion Exitosa</span> La cita ha sido confirmada exitosamente</div>';
        $this->confirma($dia);
    }
    function listanoasistio()
    {
        $this->load->model("agenda_model");
        $data['citas']=$this->agenda_model->get_noasistio();
        $this->load->view("agenda/listaNoasistio", $data);
    }
    function noasistio()
    {
        $this->load->view("agenda/filtroNoasistio");
    }
    
    function cancelarnoasistio($idagenda)
    {
        $this->load->model("agenda_model");
        $this->agenda_model->set_cancelar($idagenda);
        echo '<div class="notification success"> <span class="strong">Cancelacion Exitosa</span> La cita ha sido cancelada exitosamente</div>';
        $this->listanoasistio();
    }
    
    function reprogramar($idagenda)
    {
	$this->load->library('session');
        $this->load->model("agenda_model");
        $data['agenda'] =$this->agenda_model->get_agenda_by_idagenda($idagenda);
        $this->load->model("usuarios_model");
        $data['medicos'] =$this->usuarios_model->get_medicos();
        $this->load->model("pacientes_model");
        $data['paciente'] = $this->pacientes_model->get_paciente_by_idagenda($idagenda);
        $this->load->model("tratamientos_model");
        $data['tratamientos'] = $this->tratamientos_model->get_tratamientos();
        $data['txa'] = $this->tratamientos_model->get_idtratamiento_by_idagenda($idagenda);
        $this->load->view("agenda/reprogramar", $data);
    }
    
    function reset_medico($idagenda)
    {
	$this->load->library('session');
        $this->session->set_userdata("agenda_idagenda",  $idagenda);
        echo $this->set_medico();
    }

    function reaceptar()
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
        $diat = explode('-', $this->session->userdata("agenda_fecha"));
        $dia = sprintf("%s-%s-%s", $diat[2],$diat[1],$diat[0]);
        $cita = array(
            "consultorio" => $this->session->userdata("agenda_consultorio"),
            "fecha" => $dia,
            "idpaciente" => $this->session->userdata("agenda_paciente"),
            "inicia" => $this->session->userdata("agenda_hora"),
            "termina" => $this->session->userdata("agenda_hora")+$this->session->userdata("agenda_duracion"),
            "medico" => $this->session->userdata("agenda_medico")
        );
        $idagenda = $this->session->userdata("agenda_idagenda");
        $this->agenda_model->reset_cita($idagenda,$cita);
        $this->agenda_model->set_tratamientos_by_idagenda($idagenda, $data["tratamientos"]);
        $this->session->unset_userdata("agenda_idagenda");
        $this->load->view("agenda/aceptar",$data);
    }
    
    function cuestionario ($idagenda)
    {
        $data["idagenda"] = $idagenda;
        $this->load->model("pacientes_model");
        $data["paciente"] = $this->pacientes_model->get_paciente_by_idagenda($idagenda);
        $this->load->view("historial/cuestionario", $data);
    }
}

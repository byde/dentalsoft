<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ficha extends CI_Controller {

    function __construct()
    {
            parent::__construct();
    }

    function index()
    {
    }

    function ver($id)
    {
        $this->load->helper("url");
        $data['id'] = $id;
        $this->load->helper('date');
        $this->load->model('pacientes_model');
        $data['paciente'] = $this->pacientes_model->get_paciente_by_id($id);
        $data['edad'] = floor((time() - strtotime($data['paciente']['fecnac']))/31556926);
        $data['nac'] = mdate("%d-%m-%Y", strtotime($data['paciente']['fecnac']));
        $this->load->view("ficha",$data);
    }

    function personal($id)
    {
        $this->load->view("ficha/personal", $data);
    }

    function citas($idagenda)
    {
        $this->load->model("agenda_model");
        $data['citas'] = $this->agenda_model->get_citas_by_paciente($idagenda);
        $data['id'] = $idagenda;
        $this->load->view("ficha/citas", $data);
    }
}
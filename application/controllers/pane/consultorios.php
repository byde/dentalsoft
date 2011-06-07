<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultorios extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('panel/');
	}
	function nuevo()
	{
		$this->load->helper('url');
		$this->load->view('panel/nuevo_consultorio');
	}
	
	function modificar($id)
	{
		$this->load->helper('url');
		$this->load->model('consultorios_model');
		$data['consultorio'] = $this->consultorios_model->get_consultorio_by_id($id);
		$data['id'] = $id;
		$this->load->view('panel/modificar_consultorio', $data);
	}
	
	function modificarbyid($id)
	{
		$this->load->library('session');
		$this->load->model('consultorios_model');
		$in = $this->consultorios_model->set_consultorio_by_id($id);
		if ($in) {
			$this->session->set_flashdata('alert', true);
			$this->session->set_flashdata('alertMsg', "Se modifico el consulorio correctamente. ");
			$this->session->set_flashdata('alertTitle', "CONSULTORIO MODIFICADO!");
		}
	}
	
	function lock($id,$activo)
	{
		$this->load->model('consultorios_model');
		$in = $this->consultorios_model->activar_consultorio_by_id($id,$activo);
	}
	
	function agregar()
	{
		$this->load->library('session');
		$this->load->model('consultorios_model');
		$in = $this->consultorios_model->set_consultorio();
		if ($in)
			$this->session->set_flashdata('alertBien', true);
		else
			$this->session->set_flashdata('alertMal', true);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
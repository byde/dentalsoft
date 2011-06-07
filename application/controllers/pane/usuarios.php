<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

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
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('usuarios_model');
		$data['perfiles'] = $this->usuarios_model->get_perfiles();
		$this->load->view('panel/nuevo_usuario', $data);
	}
	
	function modificar($id)
	{
		$this->load->helper('url');
		$this->load->model('usuarios_model');
		$data['usuario'] = $this->usuarios_model->get_usuario_by_id($id);
		$data['perfiles'] = $this->usuarios_model->get_perfiles();
		$data['id'] = $id;
		$this->load->view('panel/modificar_usuario', $data);
	}
	
	function modificarbyid($id)
	{
		$this->load->library('session');
		$this->load->model('usuarios_model');
		$in = $this->usuarios_model->set_usuario_by_id($id);
		if ($in) {
			$this->session->set_flashdata('alert', true);
			$this->session->set_flashdata('alertMsg', "Se modifico al usuario correctamente. ");
			$this->session->set_flashdata('alertTitle', "USUARIO MODIFICADO!");
		}
	}
	
	function lock($id,$activo)
	{
		$this->load->model('usuarios_model');
		$in = $this->usuarios_model->activar_usuario_by_id($id,$activo);
	}
	
	function agregar()
	{
		$this->load->library('session');
		$this->load->model('usuarios_model');
		$in = $this->usuarios_model->set_usuario();
		if ($in)
			$this->session->set_flashdata('alertBien', true);
		else
			$this->session->set_flashdata('alertMal', true);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
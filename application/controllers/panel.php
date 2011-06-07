<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('panel');
	}
	
	function usuarios()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('usuarios_model');
		$data['usuarios'] = $this->usuarios_model->get_usuarios();
//		var_dump($data['usuarios']);
		$data['usuarios_total'] = $this->usuarios_model->get_total_usuarios();
		$data['mensaje'] = $this->session->flashdata('alert');
		$data['alertTitle'] = $this->session->flashdata('alertTitle');
		$data['alertMsg'] = $this->session->flashdata('alertMsg');
		$this->load->view('panel/usuarios', $data);
	}
	
	function consultorios()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('consultorios_model');
		$data['consultorios'] = $this->consultorios_model->get_consultorios();
//		var_dump($data['usuarios']);
		$data['consultorios_total'] = $this->consultorios_model->get_total_consultorios();
		$data['mensaje'] = $this->session->flashdata('alert');
		$data['alertTitle'] = $this->session->flashdata('alertTitle');
		$data['alertMsg'] = $this->session->flashdata('alertMsg');
		$this->load->view('panel/consultorios', $data);
	}
	
	function tratamientos()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('tratamientos_model');
		$data['tratamientos'] = $this->tratamientos_model->get_tratamientos();
//		var_dump($data['usuarios']);
		$data['tratamientos_total'] = $this->tratamientos_model->get_total_tratamientos();
		$data['mensaje'] = $this->session->flashdata('alert');
		$data['alertTitle'] = $this->session->flashdata('alertTitle');
		$data['alertMsg'] = $this->session->flashdata('alertMsg');
		$this->load->view('panel/tratamientos', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
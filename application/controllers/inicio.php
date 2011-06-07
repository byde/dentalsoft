<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->library('session');
		if($this->session->userdata("idusuario") > 0) {
			$this->load->model('Menu_model');
			$data['menus'] = $this->Menu_model->get_menus_by_idperfil($this->session->userdata("idperfil"));
			$this->load->view('inicio', $data);
		} else
			$this->load->view('login');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
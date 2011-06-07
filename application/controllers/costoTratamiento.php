<?php

class CostoTratamiento extends CI_Controller
{

	function _contruct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->nuevoCosTrat();
	}
	
	function agregar()
	{
		
		$this->load->model('CostoTratamiento_model');
		$in = $this->CostoTratamiento_model->set_CostoTratamiento();
		if ($in){
			$this->session->set_flashdata('alertBien', true);
			echo "Heck Yeah!!";
		}
		else
			$this->session->set_flashdata('alertMal', true);
	}
	
	function nuevoCosTrat()
	{
		$this->load->library('session');
		$perfil = $this->session->userdata("idusuario");
		if($perfil != 3){
			header("Location: " . base_url() . "index.php");
		}
		else{
			$this->load->model('tratamientos_model');
			$data['tratamientos'] = $this->tratamientos_model->get_tratamientos();
			$this->load->view('costosTratamientos/nuevoCostoTratamiento',$data);	
		}
	}
}

?>
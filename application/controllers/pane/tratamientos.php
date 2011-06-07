<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tratamientos extends CI_Controller {

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
		$this->load->view('panel/nuevo_tratamiento');
	}
	
	function modificar($id)
	{
		$this->load->helper('url');
		$this->load->model('tratamientos_model');
		$data['tratamiento'] = $this->tratamientos_model->get_tratamiento_by_id($id);
		$data['id'] = $id;
		$this->load->view('panel/modificar_tratamiento', $data);
	}
	
	function modificarbyid($id)
	{
		$this->load->library('session');
		$this->load->model('tratamientos_model');
		$in = $this->tratamientos_model->set_tratamiento_by_id($id);
		if ($in) {
			$this->session->set_flashdata('alert', true);
			$this->session->set_flashdata('alertMsg', "Se modifico el consulorio correctamente. ");
			$this->session->set_flashdata('alertTitle', "CONSULTORIO MODIFICADO!");
		}
	}
	
	function lock($id,$activo)
	{
		$this->load->model('tratamientos_model');
		$in = $this->tratamientos_model->activar_tratamiento_by_id($id,$activo);
	}
	
	function agregar()
	{
		$this->load->library('session');
		$this->load->model('tratamientos_model');
		$in = $this->tratamientos_model->set_tratamiento();
		if ($in)
			$this->session->set_flashdata('alertBien', true);
		else
			$this->session->set_flashdata('alertMal', true);
	}

        function medico ()
        {
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('tratamientos_model');
		$data['tratamientos'] = $this->tratamientos_model->get_tratamientos();
//		var_dump($data['usuarios']);
		$data['tratamientos_total'] = $this->tratamientos_model->get_total_tratamientos();
		$data['mensaje'] = $this->session->flashdata('alert');
		$data['alertTitle'] = $this->session->flashdata('alertTitle');
		$data['alertMsg'] = $this->session->flashdata('alertMsg');

		$perfil = $this->session->userdata("idperfil");
		$id     = $this->session->userdata("idusuario");
                if($perfil != 2){
			header("Location: " . base_url() . "index.php");
		}else{
			$this->load->model('tratamientos_model');
			$data['tratamientos'] = $this->tratamientos_model->get_tratamientos_by_med($id);
			$this->load->view('panel/tratamientos_med',$data);
		}
        }

        function nuevoCosTrat()
	{
		$this->load->library('session');
		$perfil = $this->session->userdata("idperfil");
		if($perfil != 2){
			header("Location: " . base_url() . "index.php");
		}
		else{
			$this->load->model('tratamientos_model');
			$data['tratamientos'] = $this->tratamientos_model->get_tratamientos();
			$this->load->view('costosTratamientos/nuevoCostoTratamiento',$data);
		}
	}

        function modificarcosto($id)
        {
		$this->load->library('session');
		$this->load->model('tratamientos_model');
                $data['tratamiento'] = $this->tratamientos_model->get_costo_by_id_med($id,$this->session->userdata("idusuario"));
                $this->load->view("panel/modificar_costo", $data);

        }

        function modificarcostobyid($id = 0)
        {
            $this->load->library('session');
            $this->load->model('tratamientos_model');
            if($id==0)
                $this->tratamientos_model->set_CostoTratamiento($this->session->userdata("idusuario"));
            else
                $in = $this->tratamientos_model->update_costo($id);

            if ($in)
                $this->session->set_flashdata('alertBien', true);
            else
                $this->session->set_flashdata('alertMal', true);
        }

        function agregarCosTrat()
	{
		$this->load->model('tratamientos_model');
		$in = $this->tratamientos_model->set_CostoTratamiento();
		if ($in){
			$this->session->set_flashdata('alertBien', true);
			echo "Heck Yeah!!";
		}
		else
			$this->session->set_flashdata('alertMal', true);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
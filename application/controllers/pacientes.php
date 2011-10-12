<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pacientes extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->library('session');
		$data['mensaje'] = $this->session->flashdata('alert');
		$data['alertTitle'] = $this->session->flashdata('alertTitle');
            $data['alertMsg'] = $this->session->flashdata('alertMsg');
            $this->load->view('pacientes',$data);
	}

        function buscar($b) {
            $this->load->model('pacientes_model');
            $this->load->helper("url");
            $data['pacientes'] = $this->pacientes_model->get_pacientes_busqueda($b);
            $data['pacientes_total'] = count($data['pacientes']);
            if ($data['pacientes'])
                $this->load->view('pacientes/busqueda_resultado',$data);
            else
                echo "false";
        }

        function todos()
        {
            $this->load->model('pacientes_model');
                $data['pacientes'] = $this->pacientes_model->get_pacientes();
                $data['pacientes_total'] = $this->pacientes_model->get_pacientes_total();
		$this->load->helper("url");
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'index.php/pacientes';
		$config['total_rows'] = $data['pacientes_total'];
		$config['per_page'] = '30';
		$config['cur_tag_open'] = '<li class="current">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['anchor_class'] = " class=\"paginacion\" ";

		$this->pagination->initialize($config);

		$data['paginas'] = $this->pagination->create_links();
                $this->load->view('pacientes/todos',$data);
        }

        function nuevo()
        {
            $this->load->helper("url");
            $this->load->model("pacientes_model");
            $data['edocivil'] = $this->pacientes_model->get_edocivil();
            $this->load->view('pacientes/nuevo', $data);
        }

        function agregar()
        {
            $this->load->model('pacientes_model');
            $in = $this->pacientes_model->set_paciente();
            if ($in) {
			$this->session->set_flashdata('alert', true);
			$this->session->set_flashdata('alertMsg', "Se registro al paciente correctamente. ");
			$this->session->set_flashdata('alertTitle', "PACIENTE REGISTRADO");
		}
        }

        function comentario ($id)
        {
            $this->load->model('pacientes_model');
            echo $this->pacientes_model->get_comentario($id);
        }
        
        function editar ($idpaciente)
        {
            $this->load->helper("url");
            $this->load->model("pacientes_model");
            $data['edocivil'] = $this->pacientes_model->get_edocivil();
            $data['paciente'] = $this->pacientes_model->get_paciente_by_id($idpaciente);
            $this->load->view('pacientes/editar', $data);
        }
        
        function guardareditar($idpaciente)
        {
            $this->load->model('pacientes_model');
            $this->pacientes_model->set_paciente_by_idpaciente($idpaciente);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
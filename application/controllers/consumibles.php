<?php
/**
 * @author Sandsower
 * @property CI_Loader $load
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Email $email
 * @property CI_Form_validation $form_validation
 * @property CI_URI $uri
 * @property Firephp $firephp
 * @property ADOConnection $adodb
 * @property Content_model $content_model
 */
class Consumibles extends CI_Controller
{
	function _construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->model('Consumibles_model');
		$data['consumibles'] = $this->Consumibles_model->get_consumibles();
		$this->load->view('consumibles/todos',$data);
	}
	
	function eliminar($id)
	{
		$this->load->model('Consumibles_model');
		$r = $this->Consumibles_model->eliminar_consumible($id);
		if($r)
			header('Location: '.base_url().'index.php/consumibles');
		else
			echo "<script language='JavaScript'>
        		alert('No se pudo borrar elemento');
        	</script>"; 
	}

	function modificar($id)
	{
		$this->load->helper('url');
		$this->load->model('Consumibles_model');
		$data['consumible'] = $this->Consumibles_model->get_consumible_by_id($id);
		$data['id'] = $id;
		$this->load->view('consumibles/modificar_consumible', $data);
	}
	
	function modificarbyid($id)
	{
		$this->load->model('Consumibles_model');
		$in = $this->Consumibles_model->set_consumible_by_id($id);
		if ($in) {
			header('Location: '.base_url().'index.php/consumibles');
		}else
			echo "<script language='JavaScript'>
        		alert('No se pudo borrar elemento');
        	</script>";
	}
}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->library('session');
		if($this->session->userdata("user_id") > 0)
			$this->load->view('welcome_message');
		else
			$this->load->view('login');
	}
	
	function in ($user, $pass){
		$this->load->model('Log_model');
		$this->load->library('session');
		if ($this->session->userdata("tries") == 5)
			echo "-1";
		else {
			$user = $this->Log_model->in($user, $pass);
			if ($user != false) {
				$this->session->set_userdata($user);
				$this->session->unset_userdata("tries");
				//var_dump($user);
				echo "true";
			} else {
				$this->session->set_userdata("tries", $this->session->userdata("tries") + 1);
				echo "false";
			}
		}
	}
	
	function out ()
	{
		$this->load->library('session');
		$this->load->helper('url');
		$this->session->sess_destroy();
		header("Location: " . base_url() . "index.php");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
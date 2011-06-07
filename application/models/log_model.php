<?php
class Log_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function in ($user, $pass){
		$this->load->database();
		$q = sprintf("SELECT idusuario, nombre, user, apellidos, idperfil FROM usuarios 
			WHERE user = '%s' AND pass = MD5('%s') AND activo = 1",
			$user, $pass);
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->row_array();
		return false;
	}

}
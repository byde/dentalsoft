<?php
class Menu_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_menus_by_idperfil ($idperfil){
		$this->load->database();
		$q = sprintf("SELECT m.* FROM menus m, menus_perfiles mp WHERE m.idmenu = mp.idmenu AND mp.idperfil = %s",
			$idperfil);
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		return false;
	}
}
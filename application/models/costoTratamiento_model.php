<?php

class CostoTratamiento_model extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	
	function set_CostoTratamiento()
	{
		$data = array('costos' => $this->input->post("costo"),
					  'tiempos' => $this->input->post("tiempo"),
					  'idtratamientos' => $this->input->post("id"));

		$this->db->insert('costos_tiempos_tratamientos', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		return false;
	}
	
}

?>
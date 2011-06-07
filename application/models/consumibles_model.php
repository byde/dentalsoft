<?php

class Consumibles_model extends CI_Model
{
	function _construct()
	{
        parent::__construct();
		$this->load->database();
	}
	
	function get_consumibles()
	{
		$query = $this->db->query("SELECT * FROM consumibles");
		if ($query->num_rows() > 0)
			return $query->result_array();
		return false;
	}
	
	function eliminar_consumible($id)
	{
		$this->db->where('idconsumible =', $id);
		$this->db->delete('consumibles');
		if ($this->db->affected_rows() > 0)
			return true;
		return false;
	}
	
	function get_consumible_by_id($id)
	{

		$query = ("SELECT * FROM consumibles WHERE idconsumible=".$this->uri->segment(3));
		$q = $this->db->query($query);
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function set_consumible_by_id($id)
	{
		$data = array(
               	'nombre' => $this->input->post("nombre"),
				'precio' => $this->input->post("costo"),
				'existencias' => $this->input->post("existencias")
            );
		$this->db->where('idconsumible =', $id);
		$this->db->update('consumibles', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		return false;
	}
}

?>
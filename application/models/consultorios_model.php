<?php
class Consultorios_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }

	function get_consultorios (){
		$q = "SELECT * FROM consultorios";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		return false;
	}
	
	function get_consultorio_by_id($id)
	{
		$this->db->where('idconsultorio =', $id);
		$query = $this->db->get('consultorios');
		if ($query->num_rows() > 0)
			return $query->row_array();
		return false;
	}

	function get_total_consultorios (){
		$q = "SELECT * FROM consultorios";
		$query = $this->db->query($q);
		return $query->num_rows();
	}

	function set_consultorio()
	{
		$data = array('nombre' => $this->input->post("nombre"));

		$this->db->insert('consultorios', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		return false;
		//$q = sprintf("INSERT INTO usuarios (nombre, apellidos, user, pass, idperfil)");
	}

	function set_consultorio_by_id($id)
	{
			$data = array(
               'nombre' => $this->input->post("nombre")
            );
		$this->db->where('idconsultorio =', $id);
		$this->db->update('consultorios', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		return false;
		//$q = sprintf("INSERT INTO usuarios (nombre, apellidos, user, pass, idperfil)");
	}
	
	function activar_consultorio_by_id($id,$activo)
	{
		$data = ($activo == 0) ? array('activo' => 1) : array('activo' => 0);
		$this->db->where('idconsultorio =', $id);
		$this->db->update('consultorios', $data);
	}

        function get_consultorios_by_activo()
        {
		$q = "SELECT * FROM consultorios WHERE activo = 1";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		return false;
        }
}
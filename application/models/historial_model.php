<?php

class Historial_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function set_historial($idagenda, $idpaciente) {
        $in = array();
        foreach ($this->input->post() as $k=>$v)
        {
            $in[$k] = ($v == "on") ? 1: $v;
        }
        $this->db->set("idagenda", $idagenda);
        $this->db->set("idpaciente", $idpaciente);
        $this->db->set("fecha", "DATE(NOW())", false);
	$this->db->set($in);
        $this->db->insert("cuestionarios");
        $this->db->update("agenda", array("idestado" => 1), "idagenda = " .  $idagenda);
    }
    
    function get_cuestionarios_by_idpaciente($idpaciente)
    {
        $q = sprintf("SELECT cu.idcuestionario, DATE_FORMAT(cu.fecha, '%%d-%%m-%%Y') as fecha, co.idconsulta
            FROM cuestionarios cu LEFT JOIN consulta co ON cu.idagenda = co.idagenda WHERE cu.idpaciente = %s ORDER BY cu.idcuestionario DESC", $idpaciente);
        
        $query = $this->db->query($q);
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }
    
    function get_cuestionario_by_idcuestionario($idcuestionario)
    {
        $this->db->where("idcuestionario = ". $idcuestionario);
        $this->db->select("*, DATE_FORMAT(fecha, '%d') as dia, DATE_FORMAT(fecha, '%c') as mes, DATE_FORMAT(fecha, '%Y') as anio", FALSE);
        $query = $this->db->get("cuestionarios");
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }
    
    function set_consulta($idagenda)
    {
        $this->db->set($this->input->post());
        $this->db->set("fecha", "NOW()", false);
        $this->db->set("idagenda", $idagenda);
        $this->db->insert("consulta");
        $this->db->where("idagenda", $idagenda);
        $this->db->set("idestado", 2);
        $this->db->update("agenda");
    }
    
    function get_consulta_by_idconsulta($idconsulta)
    {
        $this->db->where("idconsulta = ". $idconsulta);
        $this->db->select("*, DATE_FORMAT(fecha, '%d-%m-%Y') as fecha", FALSE);
        $query = $this->db->get("consulta");
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }

}

?>
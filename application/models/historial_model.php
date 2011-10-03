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
        $this->db->where("idpaciente = ". $idpaciente);
        $this->db->order_by("idcuestionario ". "DESC");
        $this->db->select("idcuestionario, DATE_FORMAT(fecha, '%d-%m-%Y') as fecha", FALSE);
        $query = $this->db->get("cuestionarios");
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

}

?>
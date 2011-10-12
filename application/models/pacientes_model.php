<?php

class Pacientes_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function get_pacientes() {
        $query = $this->db->get("pacientes");
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }

    function get_pacientes_busqueda($b) {
        $bus = sprintf(" WHERE nombre like '%s' OR apellidos like '%s' OR telefono1 like '%s'", "%" . $b . "%", "%" . $b . "%", "%" . $b . "%");
        $sql = sprintf("SELECT * FROM pacientes %s LIMIT 0,30", $bus);
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }

    function get_paciente_by_id($id) {
        $sql = sprintf("SELECT p.*, e.edocivil as civil, DATE_FORMAT(fecnac, '%%d-%%m-%%Y') as fecnac_es FROM pacientes p JOIN edocivil e ON p.edocivil = e.idedocivil WHERE idpaciente = %s", $id);
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }

    function get_pacientes_total() {
        $query = $this->db->get("pacientes");
        return $query->num_rows();
    }

    function set_paciente() {
//var_dump($data);
        $this->db->insert('pacientes', $this->input->post());
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    function get_comentario($id) {
        $q = sprintf("SELECT nota FROM pacientes WHERE idpaciente = %s", $id);
        $query = $this->db->query($q);
        $row = $query->row_array();
        return $row['nota'];
    }

    function get_edocivil() {
        $query = $this->db->get("edocivil");
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }

    function get_paciente_by_idagenda($idagenda) {
        
        //$sql = sprintf("SELECT p.*, e.edocivil as civil, DATE_FORMAT(fecnac, '%%d-%%m-%%Y') as fecnac_es FROM pacientes p JOIN edocivil e ON p.edocivil = e.idedocivil WHERE idpaciente = %s", $id);
        $sql = sprintf("SELECT CONCAT(p.nombre, ' ', p.apellidos) as paciente, p.*, e.edocivil as civil, DATE_FORMAT(fecnac, '%%d-%%m-%%Y') as fecnac_es FROM agenda a JOIN pacientes p ON p.idpaciente = a.idpaciente JOIN edocivil e ON p.edocivil = e.idedocivil WHERE a.idagenda = %s", $idagenda);
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }

    function set_paciente_by_idpaciente($idpaciente) {
//var_dump($data);
        $this->db->where("idpaciente", $idpaciente);
        $this->db->update('pacientes', $this->input->post());
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

}
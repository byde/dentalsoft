<?php

class Agenda_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function get_horarios() {
        $query = $this->db->get("horarios");
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }

    function get_horarios_by_con_dia_med($c, $dia, $med) {
        $sql = sprintf("SELECT h.*, a.idagenda, a.inicia, a.termina FROM horarios h LEFT JOIN agenda a ON (a.consultorio = %s OR a.medico = %s) AND a.inicia = h.idhorario AND a.fecha = DATE('%s')", $c, $med, $dia);
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }

    function get_horarios_by_con_dia($c, $dia) {
        $sql = sprintf("SELECT h.*, a.idagenda, a.inicia, a.termina, CONCAT(p.nombre, ' ', p.apellidos) as paciente, a.idpaciente, u.user as medico FROM horarios h LEFT JOIN agenda a ON a.consultorio = %s AND a.inicia = h.idhorario AND a.fecha = DATE('%s') LEFT JOIN pacientes p ON a.idpaciente = p.idpaciente LEFT JOIN usuarios u ON u.idusuario = a.medico", $c, $dia);
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }

    function get_hora_by_id($id) {
        $this->db->where('idhorario =', $id);
        $query = $this->db->get('horarios');
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }

    function get_total_consultorios() {
        $q = "SELECT * FROM consultorios";
        $query = $this->db->query($q);
        return $query->num_rows();
    }

    function set_cita($data) {
        $this->db->insert('agenda', $data);
        if ($this->db->affected_rows() > 0)
            return $this->db->insert_id();
        return false;
        //$q = sprintf("INSERT INTO usuarios (nombre, apellidos, user, pass, idperfil)");
    }

    function set_consultorio_by_id($id) {
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

    function activar_consultorio_by_id($id, $activo) {
        $data = ($activo == 0) ? array('activo' => 1) : array('activo' => 0);
        $this->db->where('idconsultorio =', $id);
        $this->db->update('consultorios', $data);
    }

    function get_citas_by_paciente($id) {
        $q = sprintf("SELECT a.*, e.estado, CONCAT(DAY(a.fecha), '-', MONTH(a.fecha), '-', YEAR(a.fecha)) as fechacita, c.nombre as consu, u.user, (SELECT h.hora FROM horarios h WHERE h.idhorario = a.inicia) as ini, (SELECT h.hora FROM horarios h WHERE h.idhorario = a.termina) as fin FROM agenda a LEFT JOIN usuarios u ON u.idusuario = a.medico LEFT JOIN consultorios c ON c.idconsultorio = a.consultorio LEFT JOIN estados e ON a.idestado = e.idestado WHERE idpaciente = %s", $id);
        $query = $this->db->query($q);
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }

    function get_confirma($dia) {
        $w = "idestado = 0 AND fecha > DATE(NOW()) AND confirmada is null AND DATEDIFF(fecha, DATE(NOW())) <= ";
        switch ($dia) {
            case 1:
                $w .= "1";

                break;
            case 3:
                $w .= "3";

                break;

            default:
                $w .= "5";
                break;
        }

        $this->db->where($w);
        $this->db->order_by("fecha", "ASC");
        $this->db->select("CONCAT(pacientes.nombre, ' ', pacientes.apellidos) as paciente, DATE_FORMAT(agenda.fecha, '%d-%m-%Y') as fecha, idagenda, agenda.idpaciente", false);
        $this->db->join("pacientes", "pacientes.idpaciente = agenda.idpaciente");
        $query = $this->db->get("agenda");
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }

    function set_confirma($idagenda) {
        $this->db->where('idagenda', $idagenda);
        $this->db->set('confirmada', "DATE(NOW())", FALSE);
        $this->db->update('agenda');
    }

    function get_noasistio() {
        $w = "idestado = 0 AND fecha < DATE(NOW())";
        $this->db->where($w);
        $this->db->select("CONCAT(pacientes.nombre, ' ', pacientes.apellidos) as paciente, DATE_FORMAT(agenda.fecha, '%d-%m-%Y') as fecha, idagenda, agenda.idpaciente", false);
        $this->db->join("pacientes", "pacientes.idpaciente = agenda.idpaciente");
        $query = $this->db->get("agenda");
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }

    function set_cancelar($idagenda) {
        $this->db->where('idagenda', $idagenda);
        $this->db->set('idestado', 4);
        $this->db->update('agenda');
    }

    function get_agenda_by_idagenda($idagenda) {
        $this->db->where("idagenda", $idagenda);
        $query = $this->db->get("agenda");
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }

    function set_tratamientos_by_idagenda($idagenda, $tratamientos) {
        $this->db->delete('agenda_tratamientos', array('idagenda' => $idagenda)); 
        foreach ($tratamientos as $t) {
            $this->db->set('idagenda', $idagenda);
            $this->db->set('idtratamiento', $t['idtratamiento']);
            $this->db->insert('agenda_tratamientos');
        }
    }

    function reset_cita($idagenda, $data) {
        $this->db->update('agenda', $data, "idagenda = " . $idagenda);
        if ($this->db->affected_rows() > 0)
            return $this->db->insert_id();
        return false;
        //$q = sprintf("INSERT INTO usuarios (nombre, apellidos, user, pass, idperfil)");
    }

}
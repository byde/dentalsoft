<?php

class Tratamientos_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function get_tratamientos() {
        $query = $this->db->get("tratamientos");
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }

    function get_tratamiento_by_id($id) {
        $this->db->where('idtratamiento =', $id);
        $query = $this->db->get('tratamientos');
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }

    function get_total_tratamientos() {
        $q = "SELECT * FROM tratamientos";
        $query = $this->db->query($q);
        return $query->num_rows();
    }

    function set_tratamiento() {
        $data = array('nombre' => $this->input->post("nombre"));

        $this->db->insert('tratamientos', $data);
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
        //$q = sprintf("INSERT INTO usuarios (nombre, apellidos, user, pass, idperfil)");
    }

    function set_tratamiento_by_id($id) {
        $data = array(
            'nombre' => $this->input->post("nombre")
        );
        $this->db->where('idtratamiento =', $id);
        $this->db->update('tratamientos', $data);
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
        //$q = sprintf("INSERT INTO usuarios (nombre, apellidos, user, pass, idperfil)");
    }

    function activar_tratamiento_by_id($id, $activo) {
        $data = ($activo == 0) ? array('activo' => 1) : array('activo' => 0);
        $this->db->where('idtratamiento =', $id);
        $this->db->update('tratamientos', $data);
    }

    function get_tratamientos_by_med($id) {
        $sql = sprintf("SELECT t.*, ctt.idcostos_tiempos_tratamientos as idcosto, ctt.tiempo, ctt.costo FROM tratamientos t LEFT JOIN costos_tiempos_tratamientos ctt ON t.idtratamiento = ctt.idtratamiento AND ctt.idusuario = %s", $id);
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }

    function get_costo_by_id_med($id, $med) {
        $sql = sprintf("SELECT t.*, ctt.idcostos_tiempos_tratamientos idcosto, ctt.tiempo, ctt.costo FROM tratamientos t LEFT JOIN costos_tiempos_tratamientos ctt ON t.idtratamiento = ctt.idtratamiento AND ctt.idusuario = %s WHERE t.idtratamiento = %s", $med, $id);
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }

    function set_CostoTratamiento($iduser) {
        $data = array('costo' => $this->input->post("costo"),
            'tiempo' => $this->input->post("tiempo"),
            'idtratamiento' => $this->input->post("idtratamiento"),
            'idusuario' => $iduser);

        $this->db->insert('costos_tiempos_tratamientos', $data);
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    function update_costo($id) {
        $data = array(
            'costo' => $this->input->post("costo"),
            'tiempo' => $this->input->post("tiempo")
        );
        $this->db->where('idcostos_tiempos_tratamientos =', $id);
        $this->db->update('costos_tiempos_tratamientos', $data);
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    function get_tiempo_by_tratamiento($id, $med) {
        $sql = sprintf("SELECT ctt.idcostos_tiempos_tratamientos idcosto, ctt.tiempo, ctt.costo FROM tratamientos t LEFT JOIN costos_tiempos_tratamientos ctt ON t.idtratamiento = ctt.idtratamiento AND ctt.idusuario = %s WHERE t.idtratamiento = %s", $med, $id);
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->row_array();
        return 0;
    }

    function get_idtratamiento_by_idagenda($id) {
        $this->db->where('idagenda =', $id);
        $this->db->select('idtratamiento');
        $query = $this->db->get('agenda_tratamientos');
        $result = array();
        if ($query->num_rows() > 0) {
            $res = $query->row_array();
            foreach ($res as $r) {
                $result[] = $r["idtratamiento"];
            }
        }
        return $result;
    }

}
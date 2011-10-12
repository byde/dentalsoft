<?php

class Caja_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function set_pago($idagenda, $monto, $estado) {
        $this->db->insert("pagos",array("idagenda"=>$idagenda, "monto"=>$monto, "estado"=>$estado));
        return $this->db->insert_id();
    }

    function set_abono($idpago, $abono) {
        $this->db->set('fecha', "DATE(NOW())", FALSE);
        $this->db->insert("abonos",array("idpago"=>$idpago, "abono" => $abono));
        return $this->db->insert_id();
    }
    
    function get_pagos_activos_by_idpaciente($idpaciente)
    {
        $q = sprintf("SELECT DATE_FORMAT(a.fecha, '%%d-%%m-%%Y') cita, p.monto, p.idpago FROM agenda a, pagos p WHERE a.idpaciente = %s AND p.estado = 0 AND a.idagenda = p.idagenda", $idpaciente);
        //echo $q;
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
            $res = $query->result_array();
            $nuevo = array();
            foreach($res as $r)
            {
                $abono = $this->get_abonos_by_idpago($r["idpago"]);
                $nuevo[] = array(
                    "cita" => $r["cita"],
                    "monto" => $r["monto"],
                    "idpago" => $r["idpago"],
                    "abonos" => $abono,
                    "saldo" => $this->get_saldo_by_idpago($r["idpago"])
                );
            }
            return $nuevo;
        }
        return false;
    }
    
    function get_abonos_by_idpago($idpago)
    {
        $this->db->where("idpago", $idpago);
        $this->db->select("*, DATE_FORMAT(fecha, '%d-%m-%Y') fecha_es", FALSE);
        $query = $this->db->get("abonos");
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }
    
    function get_saldo_by_idpago($idpago)
    {
        $this->db->where("idpago", $idpago);
        $this->db->select("SUM(abono) pagado", FALSE);
        $query = $this->db->get("abonos");
        $res = 0;
        if ($query->num_rows() > 0)
            $res = $query->row_array();
        
        $this->db->where("idpago", $idpago);
        $this->db->select("monto");
        $query = $this->db->get("pagos");
        $res2 = 0;
        if ($query->num_rows() > 0)
            $res2 = $query->row_array();
        return $res2["monto"] - $res["pagado"];
        //return false;
    }
    
    function get_pago_by_idpago($idpago)
    {
        $this->db->where("idpago", $idpago);
        $query = $this->db->get("pagos");
        if ($query->num_rows() > 0)
            return $query->row_array();
        return false;
    }
    
    function set_estado($idpago, $estado) {
        $this->db->where('idpago', $idpago);
        $this->db->set('estado', $estado);
        $this->db->update('pagos');
    }
}
?>
<?php

class Agenda_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function set_pago() {
        $query = $this->db->get("horarios");
        if ($query->num_rows() > 0)
            return $query->result_array();
        return false;
    }
}
?>
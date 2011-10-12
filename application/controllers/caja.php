<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caja extends CI_Controller {

    function __construct()
    {
            parent::__construct();
    }

    function index()
    {

    }

    function cobrar($idagenda)
    {
        $this->load->model("agenda_model");
        $data['conceptos'] = $this->agenda_model->get_tratamientos_by_idagenda($idagenda);
        $sum=0;
        $data['idagenda'] = $idagenda;
        foreach($data['conceptos'] as $c):
            $sum += $c['costo'];
        endforeach;
        $data['total'] = $sum;
        $this->load->view("cobrar",$data);
    }
    
    function guardar($idagenda)
    {
        $this->load->model("caja_model");
        $this->load->model("agenda_model");
        $estado = (($this->input->post("monto") - $this->input->post("abono")) == 0) ? 1 : 0;
        $idpago = $this->caja_model->set_pago($idagenda, $this->input->post("monto"),$estado);
        $this->agenda_model->set_estado($idagenda,3);
        if($estado==0)
            $this->caja_model->set_abono($idpago, $this->input->post("abono"));
    }
    
    function resumen($idpaciente)
    {
        $this->load->model("caja_model");
        $data["pagos"] =  $this->caja_model->get_pagos_activos_by_idpaciente($idpaciente);
        $this->load->view("caja/resumen", $data);
    }
    
    function abonar($idpago)
    {
        $this->load->model("caja_model");
        $data["idpago"] = $idpago;
        $pago =  $this->caja_model->get_saldo_by_idpago($idpago);
        $data["monto"] = $pago;
        $this->load->view("caja/abonar", $data);
    }
    
    function abonar_pago($idpago)
    {
        $this->load->model("caja_model");
        $this->caja_model->set_abono($idpago, $this->input->post("abono"));
        $saldo =  $this->caja_model->get_saldo_by_idpago($idpago);
        if($saldo == 0)
            $this->caja_model->set_estado($idpago,1);
    }
}
<?php

class Status extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Status_model');
    }

    public function index()
    {
        $data['judul'] = 'Data Status';
        $data['status'] = $this->Status_model->getAllStatus();
        $this->load->view('templates/header', $data);
        $this->load->view('tablestatus/index', $data);
        $this->load->view('templates/footer');
    }
}

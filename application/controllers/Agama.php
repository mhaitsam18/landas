<?php

class Agama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Agama_model');
    }

    public function index()
    {
        $data['judul'] = 'Data Agama';
        $data['agama'] = $this->Agama_model->getAllAgama();
        $this->load->view('templates/header', $data);
        $this->load->view('tableagama/index', $data);
        $this->load->view('templates/footer');
    }
}

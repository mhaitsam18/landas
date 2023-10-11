<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['profil'] = $this->db->get_where('profil', ['id' => 1])->row_array();
        $data['pegawai'] = $this->db->get('pegawai')->result_array();
        $data['demografi'] = $this->db->get_where('kondisi_demografi', ['id' => 1])->row_array();
        $data['geografis'] = $this->db->get_where('kondisi_geografis', ['id' => 1])->row_array();
        $data['agama'] = $this->db->get('rek_a')->result_array();
        $data['jenis_kelamin'] = $this->db->get('rek_jk')->result_array();
        $data['pekerjaan'] = $this->db->get('rek_p')->result_array();
        $data['pendidikan'] = $this->db->get('rek_s')->result_array();
        $data['kesehatan'] = $this->db->get('saranak')->result_array();
        $data['sarana_pendidikan'] = $this->db->get('saranap')->result_array();
        $data['sarana_ibadah'] = $this->db->get('saranari')->result_array();

        $this->load->view('profil/profil', $data);
    }
}
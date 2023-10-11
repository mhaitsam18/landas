<?php

class Surat_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function tambahsuratmasuk()
    {
        $config['upload_path']          = './img/file';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['max_size']             = 100;
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['upload_path'] = FCPATH . 'assets/img/file';

        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');
        $data_image = $this->upload->data('file_name');
        $location = '';
        $pict = $location . $data_image;

        $data = [
            "id" => "",
            "tanggal" => $this->input->post('tanggal', true),
            "no_surat" => $this->input->post('no_surat', true),
            "perihal" => $this->input->post('perihal', true),
            "pengirim" => $this->input->post('pengirim', true),
            "gambar" => $pict
        ];

        $this->db->insert('surat_masuk', $data);
    }

    public function caridatasurat_masuk()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('tanggal', $keyword);
        $this->db->or_like('no_surat', $keyword);
        $this->db->or_like('perihal', $keyword);
        $this->db->or_like('pengirim', $keyword);
        return $this->db->get('surat_masuk')->result_array();
    }
    public function getsuratmasuk()
    {
        return $query = $this->db->get('surat_masuk')->result_array();
    }


    public function hapussmasuk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('surat_masuk');
    }

    public function getSuratMBy($id)
    {
        return $this->db->get_where('surat_masuk', ['id' => $id])->row_array();
    }

    public function editsm($id)
    {
        $config['upload_path']          = './img/file';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['max_size']             = 100;
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['upload_path'] = FCPATH . 'assets/img/file';

        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');
        $data_image = $this->upload->data('file_name');
        $location = '';
        $pict = $location . $data_image;

        $data = [
            "id" => "",
            "tanggal" => $this->input->post('tanggal', true),
            "no_surat" => $this->input->post('no_surat', true),
            "perihal" => $this->input->post('perihal', true),
            "pengirim" => $this->input->post('pengirim', true),
            "gambar" => $pict
        ];

        $this->db->where('id', $id);
        $this->db->update('surat_masuk', $data);
    }

    public function getsuratkeluar()
    {
        return $query = $this->db->get('surat_keluar')->result_array();
    }

    public function tambahsuratkeluar()
    {
        $config['upload_path']          = './img/file';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['max_size']             = 100;
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['upload_path'] = FCPATH . 'assets/img/file';

        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');
        $data_image = $this->upload->data('file_name');
        $location = '';
        $pict = $location . $data_image;

        $data = [
            "id" => "",
            "tanggal" => $this->input->post('tanggal', true),
            "no_surat" => $this->input->post('no_surat', true),
            "perihal" => $this->input->post('perihal', true),
            "pengirim" => $this->input->post('pengirim', true),
            "gambar" => $pict
        ];

        $this->db->insert('surat_keluar', $data);
    }

    public function hapusskeluar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('surat_keluar');
    }

    public function getSuratKBy($id)
    {
        return $this->db->get_where('surat_keluar', ['id' => $id])->row_array();
    }

    public function editsk($id)
    {
        $config['upload_path']          = './img/file';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['max_size']             = 100;
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['upload_path'] = FCPATH . 'assets/img/file';

        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');
        $data_image = $this->upload->data('file_name');
        $location = '';
        $pict = $location . $data_image;

        $data = [
            "id" => "",
            "tanggal" => $this->input->post('tanggal', true),
            "no_surat" => $this->input->post('no_surat', true),
            "perihal" => $this->input->post('perihal', true),
            "pengirim" => $this->input->post('pengirim', true),
            "gambar" => $pict
        ];

        $this->db->where('id', $id);
        $this->db->update('surat_keluar', $data);
    }

    public function caridatasurat_keluar()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('tanggal', $keyword);
        $this->db->or_like('no_surat', $keyword);
        $this->db->or_like('perihal', $keyword);
        $this->db->or_like('pengirim', $keyword);
        return $this->db->get('surat_keluar')->result_array();
    }
}

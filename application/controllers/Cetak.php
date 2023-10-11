<?php

class Cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function surat($id)
    {
        $data['surat'] = $this->db->select('a.file_surat_selesai, a.id, a.nama, a.resi, a.nik, a.status_kependudukan, a.alamat, a.nohp, a.nohp, a.email, a.tanggalinput, b.nama_surat, a.status, a.setuju, a.file_upload, a.hasil_surat, a.id_user')->from('inputsurat a')->join('jenis_surat b', 'a.jenissurat = b.id')->where('a.id', $id)->get()->row_array();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "surat.pdf";
		$this->pdf->load_view('surat/surat', $data);
    }
}

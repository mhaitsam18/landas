<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Status_model');
        $this->load->model('Surat_model');
        $this->load->model('Penduduk_model');
        $this->load->library('form_validation');
    }

    public function pdk()
    {
        $data['title'] = 'LANDAS';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/pdk_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/pdk', $data);
        $this->load->view('templates/footer');
    }


    public function rekap()
    {
        $data['title'] = 'LANDAS | Rekap Penduduk Musiman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['query'] = $this->db->get('v_satu')->result_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => 26])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/rekap_rtw', $data);
        $this->load->view('templates/footer');
    }

    public function get_users_by_un($id)
    {
        $this->db->from($this->user);
        $this->db->where('email', $id);
        $query = $this->db->get();

        return $query;
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Permohonan';
        $data['status'] = $this->Status_model->getStatus();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['jenis_surat'] = $this->db->get('jenis_surat')->result();
        // $data['permohonan'] = $this->db->get_where('inputsurat', ['id' => $id])->row_array();
        $data['permohonan'] = $this->db->select('a.id, a.nama, a.resi, a.nik, a.status_kependudukan, a.alamat, a.nohp, a.nohp, a.email, a.tanggalinput, b.nama_surat, a.status, a.setuju, a.file_upload, a.hasil_surat, a.id_user')->from('inputsurat a')->join('jenis_surat b', 'a.jenissurat = b.id')->where('a.id', $id)->get()->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]', ['exact_length' => 'NIK must contain 16 number!', 'numeric' => 'NIK must contain only number!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'No HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('tanggalinput', 'Tanggal Input', 'required');
        $this->form_validation->set_rules('status_kependudukan', 'Status Kependudukan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/pdk_sidebar', $data);
            $this->load->view('templates/topbar2', $data);
            $this->load->view('user/edit_permohonan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->update_permohonan($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/index');
        }
    }

    public function update_permohonan($id)
    {
        $data = [
            "resi" => $this->input->post('resi', true),
            "nama" => $this->input->post('nama', true),
            "nik" => $this->input->post('nik', true),
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "email" => $this->input->post('email', true),
            "tanggalinput" => $this->input->post('tanggalinput', true),
            "status_kependudukan" => $this->input->post('status_kependudukan', true),
            "id_user" => $this->session->userdata('id_user'),
            "status" => 1,
            "setuju" => 0
        ];

        $this->db->where('id', $id);
        $this->db->update('inputsurat', $data);

        $this->session->set_flashdata(
            'flash',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Permohonan <strong>berhasil</strong> diperbarui.
            </div>'
        );
        redirect('user/monitorp');
    }

    public function menginput()
    {
        $data['title'] = 'Input Permohonan';
        $data['status'] = $this->Status_model->getStatus();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['jenis_surat'] = $this->db->get('jenis_surat')->result();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]', ['exact_length' => 'NIK must contain 16 number!', 'numeric' => 'NIK must contain only number!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'No HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('tanggalinput', 'Tanggal Input', 'required');
        $this->form_validation->set_rules('jenissurat', 'Jenis Surat', 'required');
        $this->form_validation->set_rules('status_kependudukan', 'Status Kependudukan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/pdk_sidebar', $data);
            $this->load->view('templates/topbar2', $data);
            $this->load->view('user/ipermohonan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->create_permohonan();
        }
    }

    public function create_permohonan()
    {
        $resi = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10);
        $data = [
            "resi" => $resi,
            "nama" => $this->input->post('nama', true),
            "nik" => $this->input->post('nik', true),
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "email" => $this->input->post('email', true),
            "tanggalinput" => $this->input->post('tanggalinput', true),
            "jenissurat" => $this->input->post('jenissurat', true),
            "status" => 1,
            "status_kependudukan" => $this->input->post('status_kependudukan', true),
            // "file_upload" => $this->_uploadFile("all_files"),
            "id_user" => $this->session->userdata('id_user'),

        ];

        $input = $this->db->insert('inputsurat', $data);
        $inputsurat_id = $this->db->insert_id();
        $file = $this->input->post('file');
        foreach ($this->input->post('nama_file') as $key => $value) {
            $input = $this->db->insert('file_persyaratan', [
                'inputsurat_id' => $inputsurat_id,
                'nama_file' => $value,
                'file' => $this->_uploadFileArray("file", $key),
            ]);
        }
        if ($input) {
            $temp_data = [
                'inputsurat_id' => $inputsurat_id,
                'isi' => 'Permohonan oleh ' . $this->session->userdata('nama') . ' telah masuk',
                'user_id' => 26
            ];

            $this->db->insert('notifikasi', $temp_data);
        }
        $this->session->set_flashdata(
            'flash',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Permohonan <strong>berhasil</strong> dibuat.
            </div>'
        );
        redirect('user/monitorp');
    }

    public function setujui($id)
    {

        $this->db->query("UPDATE inputsurat SET setuju = '1', status = '3' WHERE `inputsurat`.`id` = " . $id);
        redirect('user/view_permohonan');
    }

    private function _uploadFile($type_file)
    {

        $namaFiles = $_FILES[$type_file]['name'];
        $ukuranFile = $_FILES[$type_file]['size'];
        $type = $_FILES[$type_file]['type'];
        $eror = $_FILES[$type_file]['error'];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES[$type_file]['tmp_name'];

        if ($eror === 4) {
            // $flahdata = $this->alert('Maaf', 'danger', 'Gagal Mengunggah Gambar!');

            // $this->session->set_flashdata('alert', $flahdata);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda belum memilih file.
                </div>'
            );
            redirect('user/menginput');
            return false;
        }

        $ekstensiGambarValid = ['rar', 'zip'];

        $ekstensiGambar = explode('.', $namaFiles);
        // var_dump($namaFiles);die();

        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            // $flahdata = $this->alert('Maaf', 'danger', 'Ada File yang Kamu Upload Bukan Gambar!');

            // $this->session->set_flashdata('alert', $flahdata);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    File yang anda upload bukan RAR atau ZIP!
                </div>'
            );
            redirect('user/menginput');
            return false;
        }

        $namaFilesBaru = "file-uploads" . $type_file;
        $namaFilesBaru .= uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/file_upload_surat/' . $namaFilesBaru);

        return $namaFilesBaru;
    }
    private function _uploadFileArray($type_file, $index)
    {

        $namaFiles = $_FILES[$type_file]['name'][$index];
        $ukuranFile = $_FILES[$type_file]['size'][$index];
        $type = $_FILES[$type_file]['type'][$index];
        $eror = $_FILES[$type_file]['error'][$index];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES[$type_file]['tmp_name'][$index];

        if ($eror === 4) {
            // $flahdata = $this->alert('Maaf', 'danger', 'Gagal Mengunggah Gambar!');

            // $this->session->set_flashdata('alert', $flahdata);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda belum memilih file.
                </div>'
            );
            redirect('user/menginput');
            return false;
        }

        $ekstensiGambarValid = ['rar', 'zip', 'pdf'];

        $ekstensiGambar = explode('.', $namaFiles);
        // var_dump($namaFiles);die();

        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            // $flahdata = $this->alert('Maaf', 'danger', 'Ada File yang Kamu Upload Bukan Gambar!');

            // $this->session->set_flashdata('alert', $flahdata);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    File yang anda upload bukan RAR atau ZIP!
                </div>'
            );
            redirect('user/menginput');
            return false;
        }

        $namaFilesBaru = "file-uploads" . $type_file;
        $namaFilesBaru .= uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/file_upload_surat/' . $namaFilesBaru);

        return $namaFilesBaru;
    }

    public function monitorp()
    {

        $userid = $this->session->userdata('id_user');

        $data['title'] = 'LANDAS | Monitoring Permohonan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->Penduduk_model->TampilMonitor();
        $data['query'] = $this->db->get_where('inputsurat', ['id_user' => $userid])->result_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => 26])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/pdk_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/monitor', $data);
        $this->load->view('templates/footer');
    }

    public function lihatBerkas($inputsurat_id = null)
    {
        $userid = $this->session->userdata('id_user');

        $data['title'] = 'LANDAS | Berkas Permohonan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['data_berkas'] = $this->db->get_where('file_persyaratan', ['inputsurat_id' => $inputsurat_id])->result();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => 26])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/pdk_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/surat-berkas', $data);
        $this->load->view('templates/footer');
    }

    public function monitoring_permohonan()
    {
        if ($this->session->userdata('role_id') != 3) {
            redirect('/');
        }

        $userid = $this->session->userdata('id_user');

        $data['title'] = 'LANDAS | Monitoring Permohonan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->Penduduk_model->TampilAllMonitorLurah();
        $data['query'] = $this->db->get_where('inputsurat', ['id_user' => $userid])->result_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => 26])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/monitoring_permohonan', $data);
        $this->load->view('templates/footer');
    }

    public function proses_ttd()
    {
        // $upload_signature = $_FILES['signature']['name'];
        // if ($upload_signature) {
        //     $config['allowed_types'] = 'png';
        //     $config['upload_path'] = './assets/img/tanda-tangan';
        //     $config['max_size']     = '200048';
        //     $this->load->library('upload', $config);
        //     if ($this->upload->do_upload('signature')) {
        //         $new_signature = $this->upload->data('file_name');
        //         // $this->db->set('tanda_tangan', $new_signature);
        //         $this->db->where('id', $this->input->post('id'));
        //         $this->db->update('inputsurat', [
        //             'tanda_tangan' => $new_signature
        //         ]);
        //         redirect($_SERVER['HTTP_REFERER']);
        //     } else {
        //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
        //         redirect($_SERVER['HTTP_REFERER']);
        //     }
        // }
        $sig_string = $_POST['signature'];
        $nama_file = "signature_" . date("his") . ".png";
        file_put_contents("./assets/img/tanda-tangan/" . $nama_file, file_get_contents($sig_string));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('inputsurat', [
            'tanda_tangan' => $nama_file
        ]);
        $this->db->where('inputsurat_id', $this->input->post('id'));
        $this->db->update('suratket', [
            'tanda_tangan' => $nama_file
        ]);

        $surat = $this->db->get_where('inputsurat', ['id' => $this->input->post('id')])->row();
        $to = $surat->nohp;
        $msg = urlencode("Halo $surat->nama, Surat Kamu sudah ditandatangani, silahkan buka Aplikasi LANDAS kamu ya!");
        if ($this->_sendSMS($to, $msg) == "success") {
        } else {
        }

        redirect($_SERVER['HTTP_REFERER']);
        // if (file_exists($nama_file)) {
        //     echo "<p>File Signature berhasil disimpan - " . $nama_file . "</p>";
        //     echo "<p style='border:solid 1px teal;width:355px;height:110px;'><img src='" . $nama_file . "'></p>";
        // }
    }
    function _sendSMS($to, $msg)
    {
        //init SMS gateway, look at android SMS gateway
        $idmesin = "1303";
        $pin = "035754";

        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$idmesin&pin=$pin&to=$to&text=$msg");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //setting agar dapat dijalankan pada localhost
        //mematikan ssl verify (https)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);
        return ($output);
    }

    public function dashboard()
    {
        if ($this->session->userdata('role_id') != 3) {
            redirect('/');
        }

        $data['title'] = 'LANDAS | Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['query'] = $this->Penduduk_model->dbinfo();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['surat_masuk'] = $this->Penduduk_model->SuratMasuk();
        $data['surat_keluar'] = $this->Penduduk_model->SuratKeluar();

        $jenis_surat = $this->db->get('jenis_surat')->result_array();
        foreach ($jenis_surat as $key => $js) {
            $jenis_surat[$key]['count_masuk'] = $this->Penduduk_model->SuratMasukJenisSurat($js['id']);
            $jenis_surat[$key]['count_keluar'] = $this->Penduduk_model->SuratKeluarJenisSurat($js['id']);
        }
        $data['jenis_surat'] = $jenis_surat;

        $data['tipe'] = "Lurah";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/dashboard3', $data);
        $this->load->view('templates/footer');
    }

    public function dashboard2()
    {
        if ($this->session->userdata('role_id') != 2) {
            redirect('/');
        }

        $data['title'] = 'LANDAS | Dashboard ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['query'] = $this->Penduduk_model->dbinfo();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['tipe'] = "Masyarakat";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/pdk_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/dashboard3', $data);
        $this->load->view('templates/footer');
    }

    public function view_permohonan()
    {

        $data['title'] = 'LANDAS | View Permohonan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['query'] = $this->Penduduk_model->dbinfo();
        $data['hasil'] = $this->Penduduk_model->TampilAllMonitor();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => 26])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/view_permohonan', $data);
        $this->load->view('templates/footer');
    }

    public function kirim_surat()
    {

        $idpengajuan = $this->input->post('idpengajuan');
        $surat = $this->_kirimSurat();

        $data = [
            'hasil_surat' => $surat,
        ];

        $where = [
            'id' => $idpengajuan,
        ];

        $this->db->update('inputsurat', $data, $where);

        redirect($_SERVER['HTTP_REFERER']);
    }

    private function _kirimSurat()
    {

        $namaFiles = $_FILES['kirim_surat']['name'];
        $ukuranFile = $_FILES['kirim_surat']['size'];
        $type = $_FILES['kirim_surat']['type'];
        $eror = $_FILES['kirim_surat']['error'];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES['kirim_surat']['tmp_name'];

        if ($eror === 4) {
            // $flahdata = $this->alert('Maaf', 'danger', 'Gagal Mengunggah Gambar!');

            // $this->session->set_flashdata('alert', $flahdata);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda belum memilih file.
                </div>'
            );
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        }

        $ekstensiGambarValid = ['pdf'];

        $ekstensiGambar = explode('.', $namaFiles);
        // var_dump($namaFiles);die();

        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            // $flahdata = $this->alert('Maaf', 'danger', 'Ada File yang Kamu Upload Bukan Gambar!');

            // $this->session->set_flashdata('alert', $flahdata);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    File yang anda upload bukan PDF!
                </div>'
            );
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        }

        $namaFilesBaru = "file-uploads";
        $namaFilesBaru .= uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/surats/' . $namaFilesBaru);

        return $namaFilesBaru;
    }


    public function rec2()
    {
        $data['title'] = 'LANDAS | Rekap Penduduk Musiman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['query'] = $this->db->get('v_satu')->result_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => 26])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/rekap_rtw', $data);
        $this->load->view('templates/footer');
    }

    public function syarats()
    {
        $data['title'] = 'LANDAS | Syarat dan Prosedur';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/pdk_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/syarats', $data);
        $this->load->view('templates/footer');
    }

    public function terima($id)
    {
        if ($this->session->userdata('role_id') != 3) {
            redirect('/');
        }

        $data = [
            "status" => 3,
            "setuju" => 1

        ];

        $this->db->where('id', $id);
        $this->db->update('inputsurat', $data);

        $this->session->set_flashdata(
            'flash',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Permohonan <strong>berhasil</strong> diterima.
            </div>'
        );
        redirect('user/monitoring_permohonan');
    }

    public function rating($id)
    {
        $data['title'] = 'Berikan Rating Pelayanan';
        $data['status'] = $this->Status_model->getStatus();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['jenis_surat'] = $this->db->get('jenis_surat')->result();
        // $data['permohonan'] = $this->db->get_where('inputsurat', ['id' => $id])->row_array();
        $data['permohonan'] = $this->db->select('a.file_surat_selesai, a.id, a.nama, a.resi, a.nik, a.status_kependudukan, a.alamat, a.nohp, a.nohp, a.email, a.tanggalinput, b.nama_surat, a.status, a.setuju, a.file_upload, a.hasil_surat, a.id_user')->from('inputsurat a')->join('jenis_surat b', 'a.jenissurat = b.id')->where('a.id', $id)->get()->row_array();

        $this->form_validation->set_rules('rating', 'Rating', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/pdk_sidebar', $data);
            $this->load->view('templates/topbar2', $data);
            $this->load->view('user/rating', $data);
            $this->load->view('templates/footer');
        } else {

            $this->update_rating($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Terimakasih.
                </div>'
            );
            redirect('user/monitorp');
        }
    }

    public function update_rating($id)
    {
        $data = [
            "rating" => $this->input->post('rating', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('inputsurat', $data);
    }

    public function proses_tolak($id)
    {
        $data['title'] = 'Tolak Permohonan Surat';
        $data['status'] = $this->Status_model->getStatus();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['jenis_surat'] = $this->db->get('jenis_surat')->result();
        // $data['permohonan'] = $this->db->get_where('inputsurat', ['id' => $id])->row_array();
        $data['permohonan'] = $this->db->select('a.keterangan, a.id, a.nama, a.resi, a.nik, a.status_kependudukan, a.alamat, a.nohp, a.nohp, a.email, a.tanggalinput, b.nama_surat, a.status, a.setuju, a.file_upload, a.hasil_surat, a.id_user')->from('inputsurat a')->join('jenis_surat b', 'a.jenissurat = b.id')->where('a.id', $id)->get()->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/rtw_sidebar', $data);
            $this->load->view('templates/topbar2', $data);
            $this->load->view('user/tolak_permohonan_surat', $data);
            $this->load->view('templates/footer');
        } else {

            $this->update_tolak_surat($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> ditolak.
                </div>'
            );
            redirect('user/index');
        }
    }

    public function update_tolak_surat($id)
    {
        $data = [
            "status" => 3,
            "setuju" => 0,
            "keterangan" => $this->input->post('keterangan', true)
        ];

        $this->db->where('id', $id);
        $this->db->update('inputsurat', $data);

        $this->session->set_flashdata(
            'flash',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Permohonan <strong>berhasil</strong> ditolak.
            </div>'
        );
        redirect('user/monitoring_permohonan');
    }



    public function upload_surat_selesai($id)
    {
        $data['title'] = 'Upload Surat Selesai';
        $data['status'] = $this->Status_model->getStatus();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['jenis_surat'] = $this->db->get('jenis_surat')->result();
        // $data['permohonan'] = $this->db->get_where('inputsurat', ['id' => $id])->row_array();
        $data['permohonan'] = $this->db->select('a.id, a.nama, a.resi, a.nik, a.status_kependudukan, a.alamat, a.nohp, a.nohp, a.email, a.tanggalinput, b.nama_surat, a.status, a.setuju, a.file_upload, a.hasil_surat, a.id_user')->from('inputsurat a')->join('jenis_surat b', 'a.jenissurat = b.id')->where('a.id', $id)->get()->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/rtw_sidebar', $data);
            $this->load->view('templates/topbar2', $data);
            $this->load->view('user/upload_surat_selesai', $data);
            $this->load->view('templates/footer');
        } else {

            $this->update_surat_selesai($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/index');
        }
    }

    public function update_surat_selesai($id)
    {
        $data = [
            "file_surat_selesai" => $this->_uploadSuratSelesai("file_surat_selesai", $id),
            "status" => 3,
            "setuju" => 1
        ];

        $this->db->where('id', $id);
        $this->db->update('inputsurat', $data);

        $this->session->set_flashdata(
            'flash',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Permohonan <strong>berhasil</strong> disetujui.
            </div>'
        );
        redirect('user/monitoring_permohonan');
    }

    private function _uploadSuratSelesai($type_file, $id)
    {

        $namaFiles = $_FILES[$type_file]['name'];
        $ukuranFile = $_FILES[$type_file]['size'];
        $type = $_FILES[$type_file]['type'];
        $eror = $_FILES[$type_file]['error'];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES[$type_file]['tmp_name'];

        if ($eror === 4) {
            // $flahdata = $this->alert('Maaf', 'danger', 'Gagal Mengunggah Gambar!');

            // $this->session->set_flashdata('alert', $flahdata);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda belum memilih file.
                </div>'
            );
            redirect('user/upload_surat_selesai/' . $id);
            return false;
        }

        $ekstensiGambarValid = ['pdf'];

        $ekstensiGambar = explode('.', $namaFiles);
        // var_dump($namaFiles);die();

        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            // $flahdata = $this->alert('Maaf', 'danger', 'Ada File yang Kamu Upload Bukan Gambar!');

            // $this->session->set_flashdata('alert', $flahdata);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    File yang anda upload bukan JPG atau JPEG!
                </div>'
            );
            redirect('user/upload_surat_selesai/' . $id);
            return false;
        }

        $namaFilesBaru = "surat-selesai-" . $type_file;
        $namaFilesBaru .= uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/surat_selesai/' . $namaFilesBaru);

        return $namaFilesBaru;
    }

    public function tolak($id)
    {
        if ($this->session->userdata('role_id') != 3) {
            redirect('/');
        }

        $data = [
            "status" => 3,
            "setuju" => 0

        ];

        $this->db->where('id', $id);
        $this->db->update('inputsurat', $data);

        $this->session->set_flashdata(
            'flash',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Permohonan <strong>berhasil</strong> ditolak.
            </div>'
        );
        redirect('user/monitoring_permohonan');
    }


    public function view_rekapjk()
    {

        $data['title'] = 'LANDAS | View Rekap berdasarkan Jenis Kelamin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getRekJK();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/rek_jeniskelamin', $data);
        $this->load->view('templates/footer');
    }

    public function view_rekAgm()
    {

        $data['title'] = 'LANDAS | View Data Agama';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getRekA();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/rek_agama', $data);
        $this->load->view('templates/footer');
    }

    public function view_rekSt()
    {

        $data['title'] = 'LANDAS | View Rekap berdasarkan Pendidikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getRekS();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/rek_studi', $data);
        $this->load->view('templates/footer');
    }

    public function view_rekPkj()
    {

        $data['title'] = 'LANDAS | View Rekap berdasarkan Pekerjaaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getRekP();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/rek_pekerjaan', $data);
        $this->load->view('templates/footer');
    }

    public function view_sape()
    {

        $data['title'] = 'LANDAS | View Sarana Pendidikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getSaranaP();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/saranapdk', $data);
        $this->load->view('templates/footer');
    }

    public function view_sake()
    {

        $data['title'] = 'LANDAS | View Sarana Kesehatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getSaranaK();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/saranakes', $data);
        $this->load->view('templates/footer');
    }

    public function view_sri()
    {

        $data['title'] = 'LANDAS | View Sarana Rumah Ibadah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getSaranaRI();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/saranaibadah', $data);
        $this->load->view('templates/footer');
    }

    #########################################
    #Bagian Nindy#

    public function index()
    {
        $data['title'] = 'LANDAS | Data Akun Penduduk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['penduduk'] = $this->Penduduk_model->getAllPend();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function activ()
    {
        $data['title'] = 'LANDAS | Aktivasi Akun Penduduk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['penduduk'] = $this->Penduduk_model->getAllPendNon();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/activ', $data);
        $this->load->view('templates/footer');
    }

    public function setujuact($id)
    {

        $this->db->query("UPDATE user SET is_active = '1' WHERE `user`.`id` = " . $id);
        redirect('user/activ');
    }

    public function tolakact($id)
    {
        $this->db->query("UPDATE user SET is_active = '2' WHERE `user`.`id` = " . $id);
        redirect('user/activ');
    }


    public function recmus()
    {
        $data['title'] = 'LANDAS | Rekap Penduduk Musiman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->recmus();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/rekapmus', $data);
        $this->load->view('templates/footer');
    }

    public function recmus_p()
    {
        $data['title'] = 'LANDAS | Rekap Penduduk Musiman';
        $data['query'] = $this->Penduduk_model->recmus();
        $this->load->view('templates/header', $data);
        $this->load->view('user/rekapmus_p', $data);
    }

    public function recttp_p()
    {
        $data['title'] = 'LANDAS | Rekap Penduduk Tetap';
        $data['query'] = $this->Penduduk_model->recttp();
        $this->load->view('templates/header', $data);
        $this->load->view('user/rekapttp_p', $data);
    }

    public function recttp()
    {
        $data['title'] = 'LANDAS | Rekap Penduduk Tetap';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->recttp();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/rekapttp', $data);
        $this->load->view('templates/footer');
    }

    public function monitora()
    {

        $userid = $this->session->userdata('id_user');

        $data['title'] = 'LANDAS | Monitoring Permohonan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['hasil'] = $this->Penduduk_model->TampilAllMonitorBagUm();
        $data['query'] = $this->db->get_where('inputsurat', ['id_user' => $userid])->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/monitor_permohonan', $data);
        $this->load->view('templates/footer');
    }

    public function surat_masuk()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['surat_masuk'] = $this->Surat_model->getsuratmasuk();

        $data['surat_masuk'] = $this->Surat_model->caridatasurat_masuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/suratmsk', $data);
        $this->load->view('templates/footer');
    }

    public function tambahsurat_masuk()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/addsmasuk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Surat_model->tambahsuratmasuk();
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Surat <strong>berhasil</strong> ditambahkan. 
                </div>'
            );
            redirect('user/surat_masuk');
        }
    }
    public function hapussm($id)
    {

        $this->Surat_model->hapussmasuk($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Surat berhasil <strong>dihapus</strong>.</div>');
        redirect('user/surat_masuk');
    }

    public function editsmasuk($id)
    {
        $data['title'] = 'Edit Surat';
        $data['suratmasuk'] = $this->Surat_model->getSuratMBy($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->db->get('surat_masuk')->result_array();
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');



        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/edit_sm', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Surat_model->editsm($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/surat_masuk');
        }
    }


    public function dashboardbu()
    {
        $data['title'] = 'LANDAS | Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->dbinfo();
        $data['surat_masuk'] = $this->Penduduk_model->SuratMasukBU();
        $data['surat_keluar'] = $this->Penduduk_model->SuratKeluarBU();
        $data['jumlahpen'] = $this->Penduduk_model->JumlahPenduduk();
        $data['pmasuk'] = $this->Penduduk_model->PermohonanMasuk();
        $data['pproses'] = $this->Penduduk_model->PermohonanProses();
        $data['pselesai'] = $this->Penduduk_model->PermohonanSelesai();
        $data['syarat'] = $this->Penduduk_model->syarat_sket();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function tambahdashi()
    {
        $data['title'] = 'Dashboard Informatif';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();

        $this->form_validation->set_rules('isidbi', 'Isi DBI', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/add_dashi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->tambahdbi();
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Announcement <strong>berhasil</strong> ditambahkan. 
                </div>'
            );
            redirect('user/dashboard');
        }
    }

    public function hapusdashi($id)
    {

        $this->Penduduk_model->hapusdbi($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil <strong>dihapus</strong>.</div>');
        redirect('user/dashboardbu');
    }

    public function editdashi($id)
    {
        $data['title'] = 'Edit Announcement';
        $data['dbi'] = $this->Penduduk_model->getdbyId($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->db->get('dbi')->result_array();

        $this->form_validation->set_rules('isidbi', 'Isi Announcement', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/editdbi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->editdbi($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/dashboardbu');
        }
    }

    public function tambahsket()
    {
        $data['title'] = 'Syarat Surat Keterangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();

        $this->form_validation->set_rules('syarat_ske', 'Syarat Surat Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/add_sket', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->tambahsket();
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Announcement <strong>berhasil</strong> ditambahkan. 
                </div>'
            );
            redirect('user/dashboardbu');
        }
    }

    public function hapusket($id)
    {

        $this->Penduduk_model->hapus_sket($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil <strong>dihapus</strong>.</div>');
        redirect('user/dashboardbu');
    }

    public function editsket($id)
    {
        $data['title'] = 'Edit Announcement';
        $data['dbi'] = $this->Penduduk_model->getsketbyId($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->db->get('syarat_sket')->result_array();

        $this->form_validation->set_rules('syarat_ske', 'Syarat Surat Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/edit_ske', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->edit_sket($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/dashboardbu');
        }
    }


    public function surat_keluar()
    {
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['surat_keluar'] = $this->Surat_model->getsuratkeluar();

        $data['surat_keluar'] = $this->Surat_model->caridatasurat_keluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/suratklr', $data);
        $this->load->view('templates/footer');
    }

    public function tambahsurat_keluar()
    {
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/addskeluar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Surat_model->tambahsuratkeluar();
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Surat <strong>berhasil</strong> ditambahkan. 
                </div>'
            );
            redirect('user/surat_keluar');
        }
    }

    public function hapussk($id)
    {

        $this->Surat_model->hapusskeluar($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Surat berhasil <strong>dihapus</strong>.</div>');
        redirect('user/surat_keluar');
    }

    public function editskeluar($id)
    {
        $data['title'] = 'Edit Surat';
        $data['suratkeluar'] = $this->Surat_model->getSuratKBy($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->db->get('surat_keluar')->result_array();
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');



        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/edit_sk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Surat_model->editsk($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/surat_keluar');
        }
    }


    public function detail($id)
    {
        $data['title'] = 'Detail Akun Penduduk';
        $data['penduduk'] = $this->Penduduk_model->details($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function accsur($id)
    {
        $data['title'] = 'Surat Keterangan';
        $data['penduduk'] = $this->Penduduk_model->accsur($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/suratket', $data);
        $this->load->view('templates/footer');
    }

    public function viewpermohonan()
    {

        $data['title'] = 'LANDAS | View Permohonan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['hasil'] = $this->Penduduk_model->TampilAllMonitorBU();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/viewp', $data);
        $this->load->view('templates/footer');
    }

    public function downloadsurat($id)
    {

        $data['title'] = 'LANDAS | Surat';
        $data['surat'] = $this->db->get_where('suratket', ['inputsurat_id' => $id])->row_array();

        if ($data['surat']['id_sk'] == 1) {
            $this->load->view('surat/suratkb', $data);
        } else if ($data['surat']['id_sk'] == 2) {
            $this->load->view('surat/suratkbm', $data);
        } else if ($data['surat']['id_sk'] == 3) {
            $this->load->view('surat/suratkkm', $data);
        } else if ($data['surat']['id_sk'] == 4) {
            $this->load->view('surat/suratket_p', $data);
        } else if ($data['surat']['id_sk'] == 5) {
            $this->load->view('surat/suratketdom', $data);
        } else if ($data['surat']['id_sk'] == 6) {
            $this->load->view('surat/suratket', $data);
        } else if ($data['surat']['id_sk'] == 7) {
            $this->load->view('surat/suratkki', $data);
        }
    }
    public function tandatanganisurat($id)
    {

        $data['title'] = 'LANDAS | Surat';
        $data['surat'] = $this->db->get_where('suratket', ['inputsurat_id' => $id])->row_array();

        if ($data['surat']['id_sk'] == 1) {
            $this->load->view('surat/tanda-tangan/suratkb', $data);
        } else if ($data['surat']['id_sk'] == 2) {
            $this->load->view('surat/tanda-tangan/suratkbm', $data);
        } else if ($data['surat']['id_sk'] == 3) {
            $this->load->view('surat/tanda-tangan/suratkkm', $data);
        } else if ($data['surat']['id_sk'] == 4) {
            $this->load->view('surat/tanda-tangan/suratket_p', $data);
        } else if ($data['surat']['id_sk'] == 5) {
            $this->load->view('surat/tanda-tangan/suratketdom', $data);
        } else if ($data['surat']['id_sk'] == 6) {
            $this->load->view('surat/tanda-tangan/suratket', $data);
        } else if ($data['surat']['id_sk'] == 7) {
            $this->load->view('surat/tanda-tangan/suratkki', $data);
        }
    }


    public function view_rek()
    {

        $data['title'] = 'LANDAS | View Rekap Penduduk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();

        $data['query'] = $this->Penduduk_model->getRekJK();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/rekap_pdk', $data);
        $this->load->view('templates/footer');
    }

    public function view_rekjk()
    {

        $data['title'] = 'LANDAS | View Rekap berdasarkan Jenis Kelamin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getRekJK();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/rek_jk', $data);
        $this->load->view('templates/footer');
    }

    public function edit_rjk($id)
    {
        $data['title'] = 'Edit Data Jenis Kelamin';
        $data['dbi'] = $this->Penduduk_model->getrjkbyId($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->db->get('rek_jk')->result_array();

        $this->form_validation->set_rules('kelompok_j', 'Kelompok', 'required');
        $this->form_validation->set_rules('jumlah_j', 'Jumlah', 'required');
        $this->form_validation->set_rules('persentase', 'Persentase', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/edit_rjk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->edit_rjk($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/view_rekjk');
        }
    }

    public function view_rekA()
    {

        $data['title'] = 'LANDAS | View Data Agama';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getRekA();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/rek_a', $data);
        $this->load->view('templates/footer');
    }


    public function edit_ra($id)
    {
        $data['title'] = 'Edit Data Agama';
        $data['dbi'] = $this->Penduduk_model->getrabyId($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->db->get('rek_a')->result_array();

        $this->form_validation->set_rules('kelompok_a', 'Kelompok', 'required');
        $this->form_validation->set_rules('jumlah_a', 'Jumlah', 'required');
        $this->form_validation->set_rules('persentase_a', 'Persentase', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/edit_ra', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->edit_ra($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/view_rekA');
        }
    }

    public function view_rekS()
    {

        $data['title'] = 'LANDAS | View Rekap berdasarkan Pendidikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getRekS();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/rek_s', $data);
        $this->load->view('templates/footer');
    }

    public function edit_rs($id)
    {
        $data['title'] = 'Edit Data Pendidikan';
        $data['dbi'] = $this->Penduduk_model->getrsbyId($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->db->get('rek_s')->result_array();

        $this->form_validation->set_rules('kelompok_s', 'Kelompok', 'required');
        $this->form_validation->set_rules('jumlah_s', 'Jumlah', 'required');
        $this->form_validation->set_rules('persentase_s', 'Persentase', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/edit_rs', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->edit_rs($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/view_rekS');
        }
    }

    public function view_rekP()
    {

        $data['title'] = 'LANDAS | View Rekap berdasarkan Pekerjaaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getRekP();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/rek_p', $data);
        $this->load->view('templates/footer');
    }

    public function edit_rp($id)
    {
        $data['title'] = 'Edit Data Pendidikan';
        $data['dbi'] = $this->Penduduk_model->getrpbyId($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->db->get('rek_p')->result_array();

        $this->form_validation->set_rules('kelompok_p', 'Kelompok', 'required');
        $this->form_validation->set_rules('jumlah_p', 'Jumlah', 'required');
        $this->form_validation->set_rules('persentase_p', 'Persentase', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/edit_rp', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->edit_rp($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/view_rekP');
        }
    }

    public function rekjk_p()
    {
        $data['title'] = 'LANDAS | Rekap Penduduk berdasarkan Jenis Kelamin';
        $data['query'] = $this->Penduduk_model->getRekJK();
        $this->load->view('templates/header', $data);
        $this->load->view('user/rekjk_p', $data);
    }

    public function rekA_p()
    {
        $data['title'] = 'LANDAS | Data Agama';
        $data['query'] = $this->Penduduk_model->getRekA();
        $this->load->view('templates/header', $data);
        $this->load->view('user/reka_p', $data);
    }

    public function rekS_p()
    {
        $data['title'] = 'LANDAS | Rekap Penduduk berdasarkan Pendidikan';
        $data['query'] = $this->Penduduk_model->getRekS();
        $this->load->view('templates/header', $data);
        $this->load->view('user/reks_p', $data);
    }

    public function rekP_p()
    {
        $data['title'] = 'LANDAS | Rekap Penduduk berdasarkan Pekerjaan';
        $data['query'] = $this->Penduduk_model->getRekP();
        $this->load->view('templates/header', $data);
        $this->load->view('user/rekp_p', $data);
    }

    public function view_saranap()
    {

        $data['title'] = 'LANDAS | View Sarana Pendidikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getSaranaP();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/saranap', $data);
        $this->load->view('templates/footer');
    }

    public function edit_sapen($id)
    {
        $data['title'] = 'Edit Data Sarana Pendidikan';
        $data['dbi'] = $this->Penduduk_model->getsapenbyId($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->db->get('saranap')->result_array();

        $this->form_validation->set_rules('sarana_p', 'Sarana', 'required');
        $this->form_validation->set_rules('jumlah_sp', 'Jumlah', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/edit_sapen', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->edit_sapen($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/view_saranap');
        }
    }

    public function view_saranak()
    {

        $data['title'] = 'LANDAS | View Sarana Kesehatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getSaranaK();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/saranak', $data);
        $this->load->view('templates/footer');
    }

    public function edit_sakes($id)
    {
        $data['title'] = 'Edit Data Sarana Kesehatan';
        $data['dbi'] = $this->Penduduk_model->getsakesbyId($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->db->get('saranak')->result_array();

        $this->form_validation->set_rules('sarana_k', 'Sarana', 'required');
        $this->form_validation->set_rules('jumlah_sk', 'Jumlah', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/edit_sakes', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->edit_sakes($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/view_saranak');
        }
    }

    public function view_saranari()
    {

        $data['title'] = 'LANDAS | View Sarana Rumah Ibadah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->Penduduk_model->getSaranaRI();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/saranari', $data);
        $this->load->view('templates/footer');
    }

    public function edit_sari($id)
    {
        $data['title'] = 'Edit Data Rumah Ibadah';
        $data['dbi'] = $this->Penduduk_model->getsaribyId($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->db->get('saranari')->result_array();

        $this->form_validation->set_rules('sarana_ri', 'Sarana', 'required');
        $this->form_validation->set_rules('jumlah_ri', 'Jumlah', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/edit_sari', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->edit_sari($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/view_saranari');
        }
    }

    public function sakes_p()
    {
        $data['title'] = 'LANDAS | Data Sarana Kesehatan';
        $data['query'] = $this->Penduduk_model->getSaranaK();
        $this->load->view('templates/header', $data);
        $this->load->view('user/sakes_p', $data);
    }

    public function sapen_p()
    {
        $data['title'] = 'LANDAS | Data Sarana Pendidikan';
        $data['query'] = $this->Penduduk_model->getSaranaP();
        $this->load->view('templates/header', $data);
        $this->load->view('user/sapen_p', $data);
    }

    public function sari_p()
    {
        $data['title'] = 'LANDAS | Data Rumah Ibadah';
        $data['query'] = $this->Penduduk_model->getSaranaRI();
        $this->load->view('templates/header', $data);
        $this->load->view('user/sari_p', $data);
    }

    public function buat($id)
    {

        // $this->db->query("UPDATE inputsurat SET setuju = '1', status = '2' WHERE `inputsurat`.`id` = " . $id);
        redirect('user/proses');
    }

    public function setujuip($id)
    {

        $this->db->query("UPDATE inputsurat SET setuju = '0', status = '2' WHERE `inputsurat`.`id` = " . $id);
        redirect('user/viewpermohonan');
    }

    public function tolakp($id)
    {

        $this->db->query("UPDATE inputsurat SET setuju = '0', status = '4' WHERE `inputsurat`.`id` = " . $id);
        redirect('user/viewpermohonan');
    }

    public function proses()
    {

        $data['title'] = 'LANDAS | View Permohonan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('surat/proses', $data);
        $this->load->view('templates/footer');
    }

    public function suratket_p()
    {
        $this->load->view('surat/suratket_p');
    }

    public function suratket($id)
    {
        $data['query'] = $this->Penduduk_model->accsur($id);
        $this->load->view('surat/suratket');
    }

    public function prosesu($id)
    {
        $data['title'] = 'LANDAS | Proses Permohonan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['penduduk'] = $this->Penduduk_model->getAllSurat();
        $data['permohonan'] = $this->db->select('a.id, a.nama, a.resi, a.nik, a.status_kependudukan, a.alamat, a.nohp, a.nohp, a.email, a.tanggalinput, a.jenissurat, b.nama_surat, a.status, a.setuju, a.file_upload, a.hasil_surat, a.id_user')->from('inputsurat a')->join('jenis_surat b', 'a.jenissurat = b.id')->where('a.id', $id)->get()->row_array();
        $data['pemohon'] = $this->db->select('a.id, a.nama, a.nik, a.email, a.image, a.tempatlahir, a.tanggallahir, a.pekerjaan, b.agama, a.jenis_kelamin, a.alamat, c.status')->from('user a')->join('agama b', 'a.agama = b.id')->join('status c', 'a.status = c.id')->where('a.id', $data['permohonan']['id_user'])->get()->row_array();
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nomor', 'nomor', 'required');
        $this->form_validation->set_rules('ttl', 'ttl', 'required');
        $this->form_validation->set_rules('jenisk', 'jenisk', 'required');
        $this->form_validation->set_rules('agama', 'agama', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
        $this->form_validation->set_rules('nik', 'nik', 'required|numeric|exact_length[16]', ['exact_length' => 'NIK must contain 16 number!', 'numeric' => 'NIK must contain only number!']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('surat/formproses', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->prosesu();
            $this->db->query("UPDATE inputsurat SET setuju = '0', status = '2' WHERE `inputsurat`.`id` = " . $id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Surat <strong>berhasil</strong> dibuat.
                </div>'
            );
            redirect('user/viewpermohonan');
        }
    }

    public function proses_tolakBU($id)
    {
        $data['title'] = 'Tolak Permohonan Surat';
        $data['status'] = $this->Status_model->getStatus();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['jenis_surat'] = $this->db->get('jenis_surat')->result();
        // $data['permohonan'] = $this->db->get_where('inputsurat', ['id' => $id])->row_array();
        $data['permohonan'] = $this->db->select('a.keterangan, a.id, a.nama, a.resi, a.nik, a.status_kependudukan, a.alamat, a.nohp, a.nohp, a.email, a.tanggalinput, b.nama_surat, a.status, a.setuju, a.file_upload, a.hasil_surat, a.id_user')->from('inputsurat a')->join('jenis_surat b', 'a.jenissurat = b.id')->where('a.id', $id)->get()->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/tolak_permohonan_surat', $data);
            $this->load->view('templates/footer');
        } else {

            $this->update_tolak_suratBU($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> ditolak.
                </div>'
            );
            redirect('user/viewpermohonan');
        }
    }

    public function update_tolak_suratBU($id)
    {
        $data = [
            "status" => 4,
            "setuju" => 0,
            "keterangan" => $this->input->post('keterangan', true)
        ];

        $this->db->where('id', $id);
        $this->db->update('inputsurat', $data);

        $this->session->set_flashdata(
            'flash',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Permohonan <strong>berhasil</strong> ditolak.
            </div>'
        );
        redirect('user/monitora');
    }
}

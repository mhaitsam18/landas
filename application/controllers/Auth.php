<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model');
        $this->load->model('Agama_model');
        $this->load->model('Status_model');
        $this->load->library('form_validation');
        $this->load->library('encrypt');

        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';
    }

    public function index()
    {

        $this->load->view('auth/lpage');
    }

    public function login()
    {
        $data['title'] = 'LANDAS | Login';

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('katasandi', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->Penduduk_model->login();
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Akun <strong>berhasil</strong> dibuat. Silahkan Login.
                </div>'
            );
            redirect('auth/login');
        }
    }
    public function loginm()
    {
        $data['title'] = 'LANDAS | Login';

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('katasandi', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/loginm');
            $this->load->view('templates/auth_footer');
        } else {
            $this->Penduduk_model->loginm();
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Akun <strong>berhasil</strong> dibuat. Silahkan Login.
                </div>'
            );
            redirect('auth/loginm');
        }
    }
    public function loginr()
    {
        $data['title'] = 'LANDAS | Login';

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('katasandi', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/loginr');
            $this->load->view('templates/auth_footer');
        } else {
            $this->Penduduk_model->loginr();
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Akun <strong>berhasil</strong> dibuat. Silahkan Login.
                </div>'
            );
            redirect('auth/loginr');
        }
    }

    public function konfirmasi($nik)
    {
        $this->Penduduk_model->konfirmasi_akun($nik);
        echo "Akun anda telah berhasil di verifikasi, silahkan <a href='http://localhost/proyek_akhir/auth/loginm'>klik untuk login</a>";
    }

    public function regist()
    {
        $data['title'] = 'LANDAS | Registration';
        $data['agama'] = $this->Agama_model->getAgama();
        $data['status'] = $this->Status_model->getStatus();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]|is_unique[user.nik]', ['is_unique' => 'NIK is already registered.', 'exact_length' => 'NIK must contain 16 number!', 'numeric' => 'NIK must contain only number!']);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', ['is_unique' => 'Email already in use.']);
        $this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('scanktp', 'Scan KTP', 'required');
        $this->form_validation->set_rules('scankk', 'Scan KK', 'required');
        $this->form_validation->set_rules('katasandi1', 'Password', 'required|min_length[8]|matches[katasandi2]', ['matches' => 'Password doesnt match!', 'min_length' => 'Password is too short!']);
        $this->form_validation->set_rules('katasandi2', 'Password', 'required|min_length[8]|matches[katasandi1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration', $data, $data);
            $this->load->view('templates/auth_footer');
        } else {
            $this->Penduduk_model->regist();
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Akun <strong>berhasil</strong> dibuat. Silahkan Login.
                </div>'
            );
            $this->kirim_email($this->input->post('nik'), $this->input->post('nama'), $this->input->post('email'));
            redirect('auth/loginm');
        }
    }

    private function kirim_email($nik, $nama, $email)
    {
        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'maharajagina@gmail.com'; // user email anda
        $mail->Password = 'owxiilbyjpeukpsc'; // password email anda
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('maharajagina@gmail.com', 'LANDAS'); // user email anda
        $mail->addReplyTo('maharajagina@gmail.com', ''); //user email anda

        // Email subject
        $mail->Subject = 'Aplikasi LANDAS'; //subject email

        // Add a recipient
        $mail->addAddress($email); //email tujuan pengiriman email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "Hallo " . $nama . "<br><a href='http://localhost/proyek_akhir/auth/konfirmasi/" . $nik . "'>Klik untuk konfirmasi akun anda!</a>";
        $mail->Body = $mailContent;


        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata(
            'flash',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                You have been <strong>logged out</strong>.
            </div>'
        );
        redirect('auth');
    }

    public function hapus($id)
    {

        $this->Penduduk_model->hapusAkun($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil <strong>dihapus</strong>.</div>');
        redirect('user/index');
    }

    public function hapus_surat($id)
    {

        $this->Penduduk_model->hapusSurat($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil <strong>dihapus</strong>.</div>');
        redirect('user/monitorp');
    }



    public function edit($id)
    {
        $data['title'] = 'Edit Akun Penduduk';
        $data['penduduk'] = $this->Penduduk_model->getPendudukId($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['query'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');



        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->editakun($id);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('user/index');
        }
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Akun';
        $data['agama'] = $this->Agama_model->getAgama();
        $data['status'] = $this->Status_model->getStatus();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]|is_unique[user.nik]', ['is_unique' => 'NIK is already registered.', 'exact_length' => 'NIK must contain 16 number!', 'numeric' => 'NIK must contain only number!']);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', ['is_unique' => 'Email already in use.']);
        $this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('scanktp', 'Scan KTP', 'required');
        $this->form_validation->set_rules('scankk', 'Scan KK', 'required');
        $this->form_validation->set_rules('katasandi1', 'Password', 'required|min_length[8]|matches[katasandi2]', ['matches' => 'Password doesnt match!', 'min_length' => 'Password is too short!']);
        $this->form_validation->set_rules('katasandi2', 'Password', 'required|min_length[8]|matches[katasandi1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->regist();
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Akun <strong>berhasil</strong> dibuat. 
                </div>'
            );
            redirect('user/index');
        }
    }

    public function detail()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/pdk_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/myprofile', $data);
        $this->load->view('templates/footer');
    }

    public function detail2()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => 26])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/rtw_sidebar', $data);
        $this->load->view('templates/topbar2', $data);
        $this->load->view('user/myprofile', $data);
        $this->load->view('templates/footer');
    }

    public function detail3()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/topbar3', $data);
        $this->load->view('user/mypro', $data);
        $this->load->view('templates/footer');
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

        $ekstensiGambarValid = ['jpg', 'jpeg'];

        $ekstensiGambar = explode('.', $namaFiles);
        // var_dump($namaFiles);die();

        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            // $flahdata = $this->alert('Maaf', 'danger', 'Ada File yang Kamu Upload Bukan Gambar!');

            // $this->session->set_flashdata('alert', $flahdata);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    File yang anda upload bukan Gambar!
                </div>'
            );
            redirect('auth/editpro');
            return false;
        }

        $namaFilesBaru = "foto" . $type_file;
        $namaFilesBaru .= uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/img/profile/' . $namaFilesBaru);

        return $namaFilesBaru;
    }

    public function editpro()
    {
        $data['title'] = 'Edit Akun Penduduk';
        $data['penduduk'] = $this->Penduduk_model->editpro();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('image', 'Image', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/pdk_sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editpro', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->editpro();
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('auth/detail');
        }
    }

    public function editpro2()
    {
        $data['title'] = 'Edit Akun Penduduk';
        $data['penduduk'] = $this->Penduduk_model->editpro();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('image', 'Image', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/rtw_sidebar', $data);
            $this->load->view('templates/topbar2', $data);
            $this->load->view('user/editpro', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->editpro();
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('auth/detail');
        }
    }

    public function editpro3()
    {
        $data['title'] = 'Edit Akun Penduduk';
        $data['penduduk'] = $this->Penduduk_model->editpro();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('image', 'Image', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/editpro', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penduduk_model->editpro();
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> diubah.
                </div>'
            );
            redirect('auth/detail3');
        }
    }

    public function fpassword()
    {

        $data['title'] = 'LANDAS | Reset Password';

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/reset_password');
            $this->load->view('templates/auth_footer');
        } else {
            // Kirim email reset
            $email = $this->input->post('email');
            $encrypt = $this->encrypt->encode($this->input->post('email'));
            $this->kirim_email_reset_password($email, $encrypt);
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Email untuk mereset passwrd <strong>berhasil</strong> dikirim.<br>Silahkan cek email anda untuk melakukan proses reset password.
                </div>'
            );
            redirect('auth/loginm');
        }
    }

    private function kirim_email_reset_password($email, $encrypt)
    {
        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'maharajagina@gmail.com'; // user email anda
        $mail->Password = 'owxiilbyjpeukpsc'; // password email anda
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('maharajagina@gmail.com', 'LANDAS'); // user email anda
        $mail->addReplyTo('maharajagina@gmail.com', ''); //user email anda

        // Email subject
        $mail->Subject = 'Aplikasi LANDAS'; //subject email

        // Add a recipient
        $mail->addAddress($email); //email tujuan pengiriman email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "Hallo<br><a href='http://localhost/proyek_akhir/auth/reset/" . $encrypt . "'>Klik untuk mereset password anda!</a>";
        $mail->Body = $mailContent;


        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

    public function reset($encrypt)
    {
        $hasil_decode = $this->encrypt->decode($encrypt);
        $data['title'] = 'LANDAS | Atur Ulang Sandi';
        $data['encrypt'] = $encrypt;
        $cek = $this->db->get_where('user', ['email' => $hasil_decode])->num_rows();
        $data['user'] = $this->db->get_where('user', ['email' => $hasil_decode])->row_array();

        if ($cek > 0) {
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/proses_reset_password', $data);
                $this->load->view('templates/auth_footer');
            } else {
                $this->ubah_password($hasil_decode);
                $this->session->set_flashdata(
                    'flash',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Kata sandi anda berhasil diatur ulang, silahkan login dengan sandi baru anda.
                    </div>'
                );
                redirect('auth/loginm');
            }
        } else {
            redirect('/');
        }
    }

    public function ubah_password($email)
    {
        $data = [
            "katasandi" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];

        $this->db->where('email', $email);
        $this->db->update('user', $data);

        $this->session->set_flashdata(
            'flash',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Password anda <strong>berhasil</strong> diperbarui.
            </div>'
        );
        redirect('auth/loginm');
    }

    public function gantipw()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user_id' => $this->session->userdata('id_user')])->result_array();
        $data['query'] = $this->db->get('user')->result_array();


        $this->form_validation->set_rules('ckatasandi', 'Current Password', 'required');
        $this->form_validation->set_rules('nkatasandi1', 'New Password', 'required|min_length[8]|matches[nkatasandi2]', ['matches' => 'Password doesnt match!', 'min_length' => 'Password is too short!']);
        $this->form_validation->set_rules('nkatasandi2', 'Confirm New Password', 'required|min_length[8]|matches[nkatasandi1]', ['matches' => 'Password doesnt match!', 'min_length' => 'Password is too short!']);


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar3', $data);
            $this->load->view('user/gantipass', $data);
            $this->load->view('templates/footer');
        } else {
            $ckatasandi = $this->input->post('ckatasandi');
            $nkatasandi1 = $this->input->post('nkatasandi1');
            if (!password_verify($ckatasandi, $data['user']['katasandi'])) {
                $this->session->set_flashdata(
                    'flash',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Current Password <strong>Salah</strong> .
                </div>'
                );
                redirect('auth/gantipw');
            } else {
                if ($ckatasandi == $nkatasandi1) {
                    $this->session->set_flashdata(
                        'flash',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Current Password <strong>Tidak Boleh sama</strong> dengan New Password .
                    </div>'
                    );
                } else {
                    $password_hash = password_hash($nkatasandi1, PASSWORD_DEFAULT);

                    $this->db->set('katasandi', $password_hash);
                    $this->db->where('email', $data['user']['email']);
                    $this->db->update('user');
                    $this->session->set_flashdata(
                        'flash',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Password <strong>Berhasil</strong> diubah.
                    </div>'
                    );
                    redirect('auth/gantipw');
                }
            }
        }
    }
}

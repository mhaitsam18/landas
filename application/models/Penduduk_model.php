<?php

class Penduduk_model extends CI_model
{
    public function getAllPenduduk()
    {
        return $this->db->get('user')->result_array();
    }

    public function regist()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nik" => $this->input->post('nik', true),
            "email" => $this->input->post('email', true),
            "image" => 'default.jpg',
            "katasandi" => password_hash($this->input->post('katasandi1'), PASSWORD_DEFAULT),
            "tempatlahir" => $this->input->post('tempatlahir', true),
            "tanggallahir" => $this->input->post('tanggallahir', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "agama" => $this->input->post('agama', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "status" => $this->input->post('status', true),
            "scanktp" => $this->input->post('scanktp', true),
            "scankk" => $this->input->post('scankk', true),
            "role_id" => 2,
            "is_active" => 0,
        ];


        return $this->db->insert('user', $data);
    }


    public function loginm()
    {
        $email = $this->input->post('email');
        $katasandi = $this->input->post('katasandi');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($katasandi, $user['katasandi'])) {
                    if ($user['role_id'] == 2) {
                        $data = [
                            'id_user' => $user['id'],
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],
                        ];
                        $this->session->set_userdata($data);
                        redirect('user/dashboard2');
                    } else {
                        $this->session->set_flashdata(
                            'flash',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Email is not <strong>registered</strong> as `Penduduk`.
                            </div>'
                        );
                        redirect('auth/loginm');
                    }
                } else {
                    $this->session->set_flashdata(
                        'flash',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Password <strong>is not</strong> correct.
                        </div>'
                    );
                    redirect('auth/loginm');
                }
            } else {
                $this->session->set_flashdata(
                    'flash',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Email <strong>has not</strong> been activated.
                    </div>'
                );
                redirect('auth/loginm');
            }
        } else {
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Email <strong>is not</strong> registered.
                </div>'
            );
            redirect('auth/loginm');
        }
    }
    public function loginr()
    {
        $email = $this->input->post('email');
        $katasandi = $this->input->post('katasandi');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($katasandi, $user['katasandi'])) {
                    if ($user['role_id'] == 3) {
                        $data = [
                            'id' => $user['id'],
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],
                        ];
                        $this->session->set_userdata($data);
                        redirect('user/dashboard');
                    } else {
                        $this->session->set_flashdata(
                            'flash',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Email is not <strong>registered</strong> as `Ketua RT/RW`.
                            </div>'
                        );
                        redirect('auth/login');
                    }
                } else {
                    $this->session->set_flashdata(
                        'flash',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Password <strong>is not</strong> correct.
                        </div>'
                    );
                    redirect('auth/loginr');
                }
            } else {
                $this->session->set_flashdata(
                    'flash',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Email <strong>has not</strong> been activated.
                    </div>'
                );
                redirect('auth/loginr');
            }
        } else {
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Email <strong>is not</strong> registered.
                </div>'
            );
            redirect('auth/login');
        }
    }


    public function hapusSurat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('inputsurat');
    }


    public function konfirmasi_akun($nik)
    {
        $data = [
            "is_active" => 1
        ];

        $this->db->where('nik', $nik);
        $this->db->update('user', $data);
    }

    public function inputan()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nik" => $this->input->post('nik', true),
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "email" => $this->input->post('email', true),
            "tanggalinput" => $this->input->post('tanggalinput', true),
            "jenissurat" => $this->input->post('jenissurat', true),
            "status" => $this->input->post('status', true),
            "scanktp" => $this->input->post('scanktp', true),
            "scankk" => $this->input->post('scankk', true),

        ];

        $this->db->insert('inputsurat', $data);
    }

    public function SuratMasukJenisSurat($jenis_surat)
    {
        $data = [
            'jenissurat' => $jenis_surat
        ];
        $this->db->select('a.id, a.nama, a.resi, a.nik, a.status_kependudukan, a.alamat, a.nohp, a.nohp, a.email, a.tanggalinput, b.nama_surat, a.status, a.setuju, a.file_upload, a.hasil_surat, a.id_user');
        $this->db->from('inputsurat a');
        $this->db->join('jenis_surat b', 'a.jenissurat = b.id');
        $this->db->where($data);
        return $this->db->get()->num_rows();
    }

    public function SuratKeluarJenisSurat($jenis_surat)
    {
        $data = [
            'status' => 3,
            'setuju' => 1,
            'jenissurat' => $jenis_surat
        ];
        $this->db->select('a.id, a.nama, a.resi, a.nik, a.status_kependudukan, a.alamat, a.nohp, a.nohp, a.email, a.tanggalinput, b.nama_surat, a.status, a.setuju, a.file_upload, a.hasil_surat, a.id_user');
        $this->db->from('inputsurat a');
        $this->db->join('jenis_surat b', 'a.jenissurat = b.id');
        $this->db->where($data);
        return $this->db->get()->num_rows();
    }

    public function SuratMasuk()
    {

        $this->db->select('a.id, a.nama, a.resi, a.nik, a.status_kependudukan, a.alamat, a.nohp, a.nohp, a.email, a.tanggalinput, b.nama_surat, a.status, a.setuju, a.file_upload, a.hasil_surat, a.id_user');
        $this->db->from('inputsurat a');
        $this->db->join('jenis_surat b', 'a.jenissurat = b.id');
        return $this->db->get()->num_rows();
    }

    public function SuratKeluar()
    {
        $data = [
            'status' => 3,
            'setuju' => 1
        ];
        $this->db->select('a.id, a.nama, a.resi, a.nik, a.status_kependudukan, a.alamat, a.nohp, a.nohp, a.email, a.tanggalinput, b.nama_surat, a.status, a.setuju, a.file_upload, a.hasil_surat, a.id_user');
        $this->db->from('inputsurat a');
        $this->db->join('jenis_surat b', 'a.jenissurat = b.id');
        $this->db->where($data);
        return $this->db->get()->num_rows();
    }

    public function TampilMonitor()
    {

        $data = [
            'id_user' => $this->session->userdata('id_user'),
        ];

        $this->db->select('a.keterangan, a.rating, a.file_surat_selesai, a.id, a.nama, a.resi, a.nik, a.status_kependudukan, a.alamat, a.nohp, a.nohp, a.email, a.tanggalinput, b.nama_surat, a.status, a.setuju, a.file_upload, a.hasil_surat, a.id_user');
        $this->db->from('inputsurat a');
        $this->db->join('jenis_surat b', 'a.jenissurat = b.id');
        $this->db->order_by('a.id', 'desc');
        $this->db->where($data);
        return $this->db->get()->result_array();
    }

    public function TampilAllMonitor()
    {

        $this->db->select('a.keterangan, a.rating, a.file_surat_selesai, a.id as id, resi, nama, nik, alamat, nohp,email,tanggalinput,b.nama_surat,status,setuju,file_upload,hasil_surat,id_user');
        $this->db->from('inputsurat a');
        $this->db->join('jenis_surat b', 'a.jenissurat = b.id');
        $this->db->where('status', 1);
        return $this->db->get()->result_array();

        //status 2 berarrti di acc oleh bagian UMUM dan data masuk ke lurah
        //status 3 berarrti di tolak oleh bagian UMUM

    }

    public function TampilAllMonitorBU()
    {

        $this->db->select('a.keterangan, a.rating, a.file_surat_selesai, a.id as id, resi, nama, nik, alamat, nohp,email,tanggalinput,b.nama_surat,status,setuju,file_upload,hasil_surat,id_user');
        $this->db->from('inputsurat a');
        $this->db->join('jenis_surat b', 'a.jenissurat = b.id');
        $this->db->where('status', 1);
        return $this->db->get()->result_array();

        //status 2 berarrti di acc oleh bagian UMUM dan data masuk ke lurah
        //status 3 berarrti di tolak oleh bagian UMUM

    }

    public function TampilAllMonitorBagUm()
    {

        $this->db->select('a.keterangan, a.rating, a.file_surat_selesai, a.id as id, resi, nama, nik, alamat, nohp,email,tanggalinput,b.nama_surat,status,setuju,file_upload,hasil_surat,id_user');
        $this->db->from('inputsurat a');
        $this->db->join('jenis_surat b', 'a.jenissurat = b.id');
        return $this->db->get()->result_array();

        //status 2 berarrti di acc oleh bagian UMUM dan data masuk ke lurah
        //status 3 berarrti di tolak oleh bagian UMUM

    }

    public function TampilAllMonitorLurah()
    {

        $this->db->select('a.keterangan, a.id as id, resi, nama, nik, alamat, nohp,email,tanggalinput,b.nama_surat,status,setuju,file_upload,hasil_surat,id_user, tanda_tangan');
        $this->db->from('inputsurat a');
        $this->db->join('jenis_surat b', 'a.jenissurat = b.id');
        $this->db->order_by('a.id', 'desc');
        return $this->db->get()->result_array();

        //status 2 berarrti di acc oleh bagian UMUM dan data masuk ke lurah
        //status 3 berarrti di tolak oleh bagian UMUM

    }


    public function editpro()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nik" => $this->input->post('nik', true),
            "email" => $this->input->post('email', true),
            "image" => $this->input->post('image', true)
        ];

        $this->db->where('nik', $this->input->post('nik'));
        $this->db->update('user', $data);
    }


    ###################################################
    #Bagian Nindy#

    public function getAllPend()
    {
        return $this->db->get_where('user', ['role_id' => '2'])->result_array();
    }

    public function getAllPendNon()
    {
        return $this->db->get_where('user', ['is_active' => '0'])->result_array();
    }

    public function getAllSurat()
    {
        return $this->db->get('inputsurat')->result_array();
    }


    public function login()
    {
        $email = $this->input->post('email');
        $katasandi = $this->input->post('katasandi');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($katasandi, $user['katasandi'])) {
                    if ($user['role_id'] == 1) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        redirect('user/dashboardbu');
                    } else {
                        $this->session->set_flashdata(
                            'flash',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Email is not <strong>registered</strong> as Admin.
                            </div>'
                        );
                        redirect('auth/login');
                    }
                } else {
                    $this->session->set_flashdata(
                        'flash',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Password <strong>is not</strong> correct.
                        </div>'
                    );
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata(
                    'flash',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Email <strong>has not</strong> been activated.
                    </div>'
                );
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata(
                'flash',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Email <strong>is not</strong> registered.
                </div>'
            );
            redirect('auth/login');
        }
    }

    public function hapusAkun($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function getPendudukBy($nik)
    {
        return $this->db->get_where('v_dua', ['nik' => $nik])->row_array();
    }

    public function getPendudukId($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function editakun($id)
    {
        $data = [
            "id" => "",
            "nama" => $this->input->post('nama', true),
            "nik" => $this->input->post('nik', true),
            "email" => $this->input->post('email', true),
            "alamat" => $this->input->post('alamat', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function dbinfo()
    {
        return $this->db->get('dbi')->result_array();
    }

    public function hapusdbi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('dbi');
    }

    public function editdbi($id)
    {
        $data = [
            "isidbi" => $this->input->post('isidbi', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('dbi', $data);
    }

    public function getdbyId($id)
    {
        return $this->db->get_where('dbi', ['id' => $id])->row_array();
    }

    public function tambahdbi()
    {
        $data = [
            "isidbi" => $this->input->post('isidbi', true)

        ];

        $this->db->insert('dbi', $data);
    }

    public function syarat_sket()
    {
        return $this->db->get('syarat_sket')->result_array();
    }

    public function hapus_sket($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('syarat_sket');
    }

    public function edit_sket($id)
    {
        $data = [
            "syarat_ske" => $this->input->post('syarat_ske', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('syarat_sket', $data);
    }

    public function getsketbyId($id)
    {
        return $this->db->get_where('syarat_sket', ['id' => $id])->row_array();
    }

    public function tambahsket()
    {
        $data = [
            "syarat_ske" => $this->input->post('syarat_ske', true)

        ];

        $this->db->insert('syarat_sket', $data);
    }

    public function editpr()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nik" => $this->input->post('nik', true),
            "email" => $this->input->post('email', true),
            "image" => $this->input->post('image', true)
        ];

        $this->db->where('nik', $this->input->post('nik'));
        $this->db->update('user', $data);
    }

    public function detailac($id)
    {
        $this->db->select('id,nama, email, image');
        $query = $this->db->get_where('user', ['id' => $id]);
        return $query->row_array();
    }

    public function details($id)
    {
        $this->db->select('user.id,nama, nik, tempatlahir, tanggallahir, agama.agama, status.status, scanktp, scankk, alamat, email');
        $this->db->join('agama', 'agama.id = user.agama');
        $this->db->join('status', 'status.id = user.status');
        $query = $this->db->get_where('user', ['user.id' => $id]);
        return $query->row_array();
    }

    public function accsur($id)
    {
        $this->db->select('user.id, nomor, user.nama, user.nik, ttl, inputsurat.alamat, jenisk, suratket.agama, suratket.status, pekerjaan, suratket.tanggal');
        $this->db->join('user', 'suratket.id_user = user.id');
        $this->db->join('inputsurat', 'suratket.id_user = inputsurat.status');
        $query = $this->db->get_where('suratket', ['suratket.id_user' => $id]);
        return $query->row_array();
    }



    public function prosesu()
    {
        $data = [
            "nomor" => $this->input->post('nomor', true),
            "nama" => $this->input->post('nama', true),
            "ttl" => $this->input->post('ttl', true),
            "jenisk" => $this->input->post('jenisk', true),
            "agama" => $this->input->post('agama', true),
            "status" => $this->input->post('status', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "nik" => $this->input->post('nik', true),
            "alamat" => $this->input->post('alamat', true),
            "tanggal" => $this->input->post('tanggal', true),
            "id_user" => $this->input->post('id_user', true),
            "id_sk" => $this->input->post('id_sk', true),
            "inputsurat_id" => $this->input->post('inputsurat_id', true)
        ];

        $this->db->insert('suratket', $data);
    }



    public function getRekJK()
    {
        return $this->db->get('rek_jk')->result_array();
    }

    public function edit_rjk($id)
    {

        $data = [
            "id" => "",
            "kelompok_j" => $this->input->post('kelompok_j', true),
            "jumlah_j" => $this->input->post('jumlah_j', true),
            "persentase" => $this->input->post('persentase', true),

        ];

        $this->db->where('id', $id);
        $this->db->update('rek_jk', $data);
    }

    public function getrjkbyId($id)
    {
        return $this->db->get_where('rek_jk', ['id' => $id])->row_array();
    }

    public function getRekP()
    {
        return $this->db->get('rek_p')->result_array();
    }

    public function edit_rp($id)
    {

        $data = [
            "id" => "",
            "kelompok_p" => $this->input->post('kelompok_p', true),
            "jumlah_p" => $this->input->post('jumlah_p', true),
            "persentase_p" => $this->input->post('persentase_p', true),

        ];

        $this->db->where('id', $id);
        $this->db->update('rek_p', $data);
    }

    public function getrpbyId($id)
    {
        return $this->db->get_where('rek_p', ['id' => $id])->row_array();
    }

    public function getRekA()
    {
        return $this->db->get('rek_a')->result_array();
    }

    public function edit_ra($id)
    {

        $data = [
            "id" => "",
            "kelompok_a" => $this->input->post('kelompok_a', true),
            "jumlah_a" => $this->input->post('jumlah_a', true),
            "persentase_a" => $this->input->post('persentase_a', true),

        ];

        $this->db->where('id', $id);
        $this->db->update('rek_a', $data);
    }

    public function getrabyId($id)
    {
        return $this->db->get_where('rek_a', ['id' => $id])->row_array();
    }

    public function getRekS()
    {
        return $this->db->get('rek_s')->result_array();
    }

    public function edit_rs($id)
    {

        $data = [
            "id" => "",
            "kelompok_s" => $this->input->post('kelompok_s', true),
            "jumlah_s" => $this->input->post('jumlah_s', true),
            "persentase_s" => $this->input->post('persentase_s', true),

        ];

        $this->db->where('id', $id);
        $this->db->update('rek_s', $data);
    }

    public function getrsbyId($id)
    {
        return $this->db->get_where('rek_s', ['id' => $id])->row_array();
    }

    public function getSaranaP()
    {
        return $this->db->get('saranap')->result_array();
    }

    public function edit_sapen($id)
    {

        $data = [
            "id" => "",
            "sarana_p" => $this->input->post('sarana_p', true),
            "jumlah_sp" => $this->input->post('jumlah_sp', true),

        ];

        $this->db->where('id', $id);
        $this->db->update('saranap', $data);
    }

    public function getsapenbyId($id)
    {
        return $this->db->get_where('saranap', ['id' => $id])->row_array();
    }

    public function getSaranaK()
    {
        return $this->db->get('saranak')->result_array();
    }

    public function edit_sakes($id)
    {

        $data = [
            "id" => "",
            "sarana_k" => $this->input->post('sarana_k', true),
            "jumlah_sk" => $this->input->post('jumlah_sk', true),

        ];

        $this->db->where('id', $id);
        $this->db->update('saranak', $data);
    }

    public function getsakesbyId($id)
    {
        return $this->db->get_where('saranak', ['id' => $id])->row_array();
    }

    public function getSaranaRI()
    {
        return $this->db->get('saranari')->result_array();
    }

    public function edit_sari($id)
    {

        $data = [
            "id" => "",
            "sarana_ri" => $this->input->post('sarana_ri', true),
            "jumlah_ri" => $this->input->post('jumlah_ri', true),

        ];

        $this->db->where('id', $id);
        $this->db->update('saranari', $data);
    }

    public function getsaribyId($id)
    {
        return $this->db->get_where('saranari', ['id' => $id])->row_array();
    }

    public function recmus()
    {
        $this->db->select('user.id,nama, nik, status.status, alamat, email, image');
        $this->db->join('status', 'status.id = user.status');
        return $this->db->get_where('user', ['user.status' => '2'])->result_array();
    }

    public function recttp()
    {
        $this->db->select('user.id,nama, nik, status.status, alamat, email, image');
        $this->db->join('status', 'status.id = user.status');
        return $this->db->get_where('user', ['user.status' => '1'])->result_array();
    }

    public function SuratMasukBU()
    {

        $this->db->select('id, tanggal, no_surat, perihal, pengirim, gambar');
        $this->db->from('surat_masuk');
        return $this->db->get()->num_rows();
    }

    public function SuratKeluarBU()
    {

        $this->db->select('id, tanggal, no_surat, perihal, pengirim, gambar');
        $this->db->from('surat_keluar');
        return $this->db->get()->num_rows();
    }

    public function JumlahPenduduk()
    {

        $this->db->select('id,nama, nik, tempatlahir, tanggallahir, agama, status, scanktp, scankk, alamat, email');
        $this->db->from('user');
        return $this->db->get()->num_rows();
    }

    public function PermohonanMasuk()
    {

        $this->db->select('a.keterangan, a.rating, a.file_surat_selesai, a.id as id, resi, nama, nik, alamat, nohp,email,tanggalinput,b.nama_surat,status,setuju,file_upload,hasil_surat,id_user');
        $this->db->from('inputsurat a');
        $this->db->join('jenis_surat b', 'a.jenissurat = b.id');
        $this->db->where('status', 1);
        return $this->db->get()->num_rows();
    }

    public function PermohonanProses()
    {

        $this->db->select('a.keterangan, a.rating, a.file_surat_selesai, a.id as id, resi, nama, nik, alamat, nohp,email,tanggalinput,b.nama_surat,status,setuju,file_upload,hasil_surat,id_user');
        $this->db->from('inputsurat a');
        $this->db->join('jenis_surat b', 'a.jenissurat = b.id');
        $this->db->where('status', 2);
        return $this->db->get()->num_rows();
    }

    public function PermohonanSelesai()
    {

        $this->db->select('a.keterangan, a.rating, a.file_surat_selesai, a.id as id, resi, nama, nik, alamat, nohp,email,tanggalinput,b.nama_surat,status,setuju,file_upload,hasil_surat,id_user');
        $this->db->from('inputsurat a');
        $this->db->join('jenis_surat b', 'a.jenissurat = b.id');
        $this->db->where('status', 3);
        return $this->db->get()->num_rows();
    }
}

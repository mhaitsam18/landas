<?php
defined('BASEPATH') or exit('No direct script access allowed');

class surat extends CI_Controller
{

    public function ns($aksi = '', $id = '')
    {
        redirect('404_content');
        $ceks = $this->session->userdata('surat_menyurat@Proyek-2017');
        $id_user = $this->session->userdata('id_user@Proyek-2017');
        if (!isset($ceks)) {
            redirect('web/login');
        } else {
            $data['user'] = $this->Mcrud->get_users_by_un($ceks);

            $this->db->where('tbl_bagian.id_user', "$id_user");
            $this->db->order_by('nama_bagian', 'ASC');
            $data['bagian'] = $this->db->get("tbl_bagian")->result();

            if ($data['user']->row()->level == 'admin') {
                redirect('404_content');
            }

            // $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian=tbl_ns.id_bagian');
            $this->db->order_by('tbl_ns.id_ns', 'DESC');
            $data['ns'] = $this->db->get("tbl_ns");

            if ($aksi == 't') {
                $p = "ns_tambah";
                if ($data['user']->row()->level == 's_admin') {
                    redirect('404_content');
                }

                $data['judul_web'] = "Tambah Nomor Surat | Aplikasi Surat Menyurat";
            } elseif ($aksi == 'e') {
                $p = "ns_edit";
                if ($data['user']->row()->level == 's_admin') {
                    redirect('404_content');
                }

                $data['query'] = $this->db->get_where("tbl_ns", array('id_ns' => "$id", 'id_user' => "$id_user"))->row();
                $data['judul_web'] = "Edit Nomor Surat | Aplikasi Surat Menyurat";

                if ($data['query']->id_user == '') {
                    $this->session->set_flashdata(
                        'msg',
                        '
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
    </button>
    <strong>Gagal!</strong> Maaf, Anda tidak berhak mengubah data nomor surat.
</div>'
                    );

                    redirect('users/ns');
                }
            } elseif ($aksi == 'h') {

                if ($data['user']->row()->level == 's_admin') {
                    redirect('404_content');
                }
                $data['query'] = $this->db->get_where("tbl_ns", array('id_ns' => "$id", 'id_user' => "$id_user"))->row();
                $data['judul_web'] = "Hapus Nomor Surat | Aplikasi Surat Menyurat";

                if ($data['query']->id_user == '') {
                    $this->session->set_flashdata(
                        'msg',
                        '
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
    </button>
    <strong>Gagal!</strong> Maaf, Anda tidak berhak menghapus data nomor surat.
</div>'
                    );
                } else {
                    $this->Mcrud->delete_ns_by_id($id);
                    $this->session->set_flashdata(
                        'msg',
                        '
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
    </button>
    <strong>Sukses!</strong> Nomor surat berhasil dihapus.
</div>'
                    );
                }

                redirect('users/ns');
            } else {
                $p = "ns";

                $data['judul_web'] = "Nomor surat | Aplikasi Surat Menyurat";
            }

            $this->load->view('users/header', $data);
            $this->load->view("users/pengaturan/$p", $data);
            $this->load->view('users/footer');

            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('d-m-Y H:i:s');

            if (isset($_POST['btnsimpan'])) {
                $separator = htmlentities(strip_tags($this->input->post('separator')));

                $no_posisi = htmlentities(strip_tags($this->input->post('no_posisi')));
                $no = htmlentities(strip_tags($this->input->post('no')));

                $org_posisi = htmlentities(strip_tags($this->input->post('org_posisi')));
                $org = htmlentities(strip_tags($this->input->post('org')));

                $bag_posisi = htmlentities(strip_tags($this->input->post('bag_posisi')));
                $bag = htmlentities(strip_tags($this->input->post('bag')));

                $subbag_posisi = htmlentities(strip_tags($this->input->post('subbag_posisi')));
                $subbag = htmlentities(strip_tags($this->input->post('subbag')));

                $bln_posisi = htmlentities(strip_tags($this->input->post('bln_posisi')));
                $bln = htmlentities(strip_tags($this->input->post('bln')));

                $thn_posisi = htmlentities(strip_tags($this->input->post('thn_posisi')));
                $thn = htmlentities(strip_tags($this->input->post('thn')));
                $reset_no = htmlentities(strip_tags($this->input->post('reset_no')));

                $prefix = htmlentities(strip_tags($this->input->post('prefix')));
                $prefix_posisi = htmlentities(strip_tags($this->input->post('prefix_posisi')));

                $jenis_ns = htmlentities(strip_tags($this->input->post('jenis_ns')));
                $ket = htmlentities(strip_tags($this->input->post('ket')));

                //1
                if ($no_posisi == 1) {
                    $no1 = $no;
                } elseif ($no_posisi == 2) {
                    $no2 = $no;
                } elseif ($no_posisi == 3) {
                    $no3 = $no;
                } elseif ($no_posisi == 4) {
                    $no4 = $no;
                } elseif ($no_posisi == 5) {
                    $no5 = $no;
                } elseif ($no_posisi == 6) {
                    $no6 = $no;
                }

                //2
                if ($org_posisi == 1) {
                    $no1 = $org;
                } elseif ($org_posisi == 2) {
                    $no2 = $org;
                } elseif ($org_posisi == 3) {
                    $no3 = $org;
                } elseif ($org_posisi == 4) {
                    $no4 = $org;
                } elseif ($org_posisi == 5) {
                    $no5 = $org;
                } elseif ($org_posisi == 6) {
                    $no6 = $org;
                }

                //3
                if ($bag_posisi == 1) {
                    $no1 = $bag;
                } elseif ($bag_posisi == 2) {
                    $no2 = $bag;
                } elseif ($bag_posisi == 3) {
                    $no3 = $bag;
                } elseif ($bag_posisi == 4) {
                    $no4 = $bag;
                } elseif ($bag_posisi == 5) {
                    $no5 = $bag;
                } elseif ($bag_posisi == 6) {
                    $no6 = $bag;
                }

                //4
                if ($subbag_posisi == 1) {
                    $no1 = $subbag;
                } elseif ($subbag_posisi == 2) {
                    $no2 = $subbag;
                } elseif ($subbag_posisi == 3) {
                    $no3 = $subbag;
                } elseif ($subbag_posisi == 4) {
                    $no4 = $subbag;
                } elseif ($subbag_posisi == 5) {
                    $no5 = $subbag;
                } elseif ($subbag_posisi == 6) {
                    $no6 = $subbag;
                }

                //5
                if ($bln_posisi == 1) {
                    $no1 = $bln;
                } elseif ($bln_posisi == 2) {
                    $no2 = $bln;
                } elseif ($bln_posisi == 3) {
                    $no3 = $bln;
                } elseif ($bln_posisi == 4) {
                    $no4 = $bln;
                } elseif ($bln_posisi == 5) {
                    $no5 = $bln;
                } elseif ($bln_posisi == 6) {
                    $no6 = $bln;
                }

                //6
                if ($thn_posisi == 1) {
                    $no1 = $thn;
                } elseif ($thn_posisi == 2) {
                    $no2 = $thn;
                } elseif ($thn_posisi == 3) {
                    $no3 = $thn;
                } elseif ($thn_posisi == 4) {
                    $no4 = $thn;
                } elseif ($thn_posisi == 5) {
                    $no5 = $thn;
                } elseif ($thn_posisi == 6) {
                    $no6 = $thn;
                }

                if ($no1 != '') {
                    if ($no2 != '') {
                        $no1 = "$no1$separator";
                    } else {
                        $no1 = "$no1";
                    }
                }
                if ($no2 != '') {
                    if ($no3 != '') {
                        $no2 = "$no2$separator";
                    } else {
                        $no2 = "$no2";
                    }
                }
                if ($no3 != '') {
                    if ($no4 != '') {
                        $no3 = "$no3$separator";
                    } else {
                        $no3 = "$no3";
                    }
                }
                if ($no4 != '') {
                    if ($no5 != '') {
                        $no4 = "$no4$separator";
                    } else {
                        $no4 = "$no4";
                    }
                }
                if ($no5 != '') {
                    if ($no6 != '') {
                        $no5 = "$no5$separator";
                    } else {
                        $no5 = "$no5";
                    }
                }

                if ($prefix_posisi == "kiri") {
                    $p_kiri = "$prefix$separator";
                    $p_kanan = '';
                } elseif ($prefix_posisi == "kanan") {
                    $p_kiri = '';
                    $p_kanan = "$separator$prefix";
                } else {
                    $p_kiri = '';
                    $p_kanan = '';
                }

                if ($reset_no == '') {
                    $reset_no = 'thn';
                }

                $no_surat = "$p_kiri$no1$no2$no3$no4$no5$no6$p_kanan";

                if ($ket == '') {
                    $ket = '-';
                }
                $data = array(
                    'separator' => $separator,
                    'no_posisi' => $no_posisi,
                    'no' => $no,
                    'org_posisi' => $org_posisi,
                    'org' => $org,
                    'bag_posisi' => $bag_posisi,
                    'bag' => $bag,
                    'subbag_posisi' => $subbag_posisi,
                    'subbag' => $subbag,
                    'bln_posisi' => $bln_posisi,
                    'bln' => $bln,
                    'thn_posisi' => $thn_posisi,
                    'thn' => $thn,
                    'reset_no' => $reset_no,
                    'prefix' => $prefix,
                    'prefix_posisi' => $prefix_posisi,
                    'jenis_ns' => $jenis_ns,
                    'ket' => $ket,
                    'no_surat' => $no_surat,
                    'id_user' => $id_user,
                    'tgl_ns' => $tgl
                );
                $this->Mcrud->save_ns($data);

                $this->session->set_flashdata(
                    'msg',
                    '
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
    </button>
    <strong>Sukses!</strong> Nomor Surat berhasil ditambahkan.
</div>'
                );

                redirect('users/ns/t');
            }

            if (isset($_POST['btnupdate'])) {
                $separator = htmlentities(strip_tags($this->input->post('separator')));

                $no_posisi = htmlentities(strip_tags($this->input->post('no_posisi')));
                $no = htmlentities(strip_tags($this->input->post('no')));

                $org_posisi = htmlentities(strip_tags($this->input->post('org_posisi')));
                $org = htmlentities(strip_tags($this->input->post('org')));

                $bag_posisi = htmlentities(strip_tags($this->input->post('bag_posisi')));
                $bag = htmlentities(strip_tags($this->input->post('bag')));

                $subbag_posisi = htmlentities(strip_tags($this->input->post('subbag_posisi')));
                $subbag = htmlentities(strip_tags($this->input->post('subbag')));

                $bln_posisi = htmlentities(strip_tags($this->input->post('bln_posisi')));
                $bln = htmlentities(strip_tags($this->input->post('bln')));

                $thn_posisi = htmlentities(strip_tags($this->input->post('thn_posisi')));
                $thn = htmlentities(strip_tags($this->input->post('thn')));
                $reset_no = htmlentities(strip_tags($this->input->post('reset_no')));

                $prefix = htmlentities(strip_tags($this->input->post('prefix')));
                $prefix_posisi = htmlentities(strip_tags($this->input->post('prefix_posisi')));

                $jenis_ns = htmlentities(strip_tags($this->input->post('jenis_ns')));
                $ket = htmlentities(strip_tags($this->input->post('ket')));

                $no1 = '';
                $no2 = '';
                $no3 = '';
                $no4 = '';
                $no5 = '';
                $no6 = '';

                //1
                if ($no_posisi == 1) {
                    $no1 = $no;
                } elseif ($no_posisi == 2) {
                    $no2 = $no;
                } elseif ($no_posisi == 3) {
                    $no3 = $no;
                } elseif ($no_posisi == 4) {
                    $no4 = $no;
                } elseif ($no_posisi == 5) {
                    $no5 = $no;
                } elseif ($no_posisi == 6) {
                    $no6 = $no;
                }

                //2
                if ($org_posisi == 1) {
                    $no1 = $org;
                } elseif ($org_posisi == 2) {
                    $no2 = $org;
                } elseif ($org_posisi == 3) {
                    $no3 = $org;
                } elseif ($org_posisi == 4) {
                    $no4 = $org;
                } elseif ($org_posisi == 5) {
                    $no5 = $org;
                } elseif ($org_posisi == 6) {
                    $no6 = $org;
                }

                //3
                if ($bag_posisi == 1) {
                    $no1 = $bag;
                } elseif ($bag_posisi == 2) {
                    $no2 = $bag;
                } elseif ($bag_posisi == 3) {
                    $no3 = $bag;
                } elseif ($bag_posisi == 4) {
                    $no4 = $bag;
                } elseif ($bag_posisi == 5) {
                    $no5 = $bag;
                } elseif ($bag_posisi == 6) {
                    $no6 = $bag;
                }

                //4
                if ($subbag_posisi == 1) {
                    $no1 = $subbag;
                } elseif ($subbag_posisi == 2) {
                    $no2 = $subbag;
                } elseif ($subbag_posisi == 3) {
                    $no3 = $subbag;
                } elseif ($subbag_posisi == 4) {
                    $no4 = $subbag;
                } elseif ($subbag_posisi == 5) {
                    $no5 = $subbag;
                } elseif ($subbag_posisi == 6) {
                    $no6 = $subbag;
                }

                //5
                if ($bln_posisi == 1) {
                    $no1 = $bln;
                } elseif ($bln_posisi == 2) {
                    $no2 = $bln;
                } elseif ($bln_posisi == 3) {
                    $no3 = $bln;
                } elseif ($bln_posisi == 4) {
                    $no4 = $bln;
                } elseif ($bln_posisi == 5) {
                    $no5 = $bln;
                } elseif ($bln_posisi == 6) {
                    $no6 = $bln;
                }

                //6
                if ($thn_posisi == 1) {
                    $no1 = $thn;
                } elseif ($thn_posisi == 2) {
                    $no2 = $thn;
                } elseif ($thn_posisi == 3) {
                    $no3 = $thn;
                } elseif ($thn_posisi == 4) {
                    $no4 = $thn;
                } elseif ($thn_posisi == 5) {
                    $no5 = $thn;
                } elseif ($thn_posisi == 6) {
                    $no6 = $thn;
                }

                if ($no1 != '') {
                    if ($no2 != '') {
                        $no1 = "$no1$separator";
                    } else {
                        $no1 = "$no1";
                    }
                }
                if ($no2 != '') {
                    if ($no3 != '') {
                        $no2 = "$no2$separator";
                    } else {
                        $no2 = "$no2";
                    }
                }
                if ($no3 != '') {
                    if ($no4 != '') {
                        $no3 = "$no3$separator";
                    } else {
                        $no3 = "$no3";
                    }
                }
                if ($no4 != '') {
                    if ($no5 != '') {
                        $no4 = "$no4$separator";
                    } else {
                        $no4 = "$no4";
                    }
                }
                if ($no5 != '') {
                    if ($no6 != '') {
                        $no5 = "$no5$separator";
                    } else {
                        $no5 = "$no5";
                    }
                }


                if ($prefix_posisi == "kiri") {
                    $p_kiri = "$prefix$separator";
                    $p_kanan = '';
                } else {
                    $p_kiri = '';
                    $p_kanan = "$separator$prefix";
                }

                if ($reset_no == '') {
                    $reset_no = 'thn';
                }

                $no_surat = "$p_kiri$no1$no2$no3$no4$no5$no6$p_kanan";

                if ($ket == '') {
                    $ket = '-';
                }
                $data = array(
                    'separator' => $separator,
                    'no_posisi' => $no_posisi,
                    'no' => $no,
                    'org_posisi' => $org_posisi,
                    'org' => $org,
                    'bag_posisi' => $bag_posisi,
                    'bag' => $bag,
                    'subbag_posisi' => $subbag_posisi,
                    'subbag' => $subbag,
                    'bln_posisi' => $bln_posisi,
                    'bln' => $bln,
                    'thn_posisi' => $thn_posisi,
                    'thn' => $thn,
                    'reset_no' => $reset_no,
                    'prefix' => $prefix,
                    'prefix_posisi' => $prefix_posisi,
                    'jenis_ns' => $jenis_ns,
                    'ket' => $ket,
                    'no_surat' => $no_surat,
                    'id_user' => $id_user
                );
                $this->Mcrud->update_ns(array('id_ns' => $id), $data);

                $this->session->set_flashdata(
                    'msg',
                    '
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
    </button>
    <strong>Sukses!</strong> Nomor Surat berhasil diupdate.
</div>'
                );
                redirect('users/ns');
            }
        }
    }


    public function sm($aksi = '', $id = '')
    {
        $ceks = $this->session->userdata('surat_menyurat@Proyek-2017');
        $id_user = $this->session->userdata('id_user@Proyek-2017');
        if (!isset($ceks)) {
            redirect('web/login');
        } else {
            $data['user'] = $this->Mcrud->get_users_by_un($ceks);

            // if ($data['user']->row()->level == 'admin') {
            // redirect('404_content');
            // }

            // $this->db->join('tbl_user', 'tbl_sm.id_user=tbl_user.id_user');
            // if ($data['user']->row()->level == 'user') {
            // $this->db->where('tbl_sm.id_user', "$id_user");
            // }
            $this->db->order_by('tbl_sm.id_sm', 'DESC');
            $data['sm'] = $this->db->get("tbl_sm");

            if ($aksi == 't') {
                $p = "sm_tambah";
                if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
                    redirect('404_content');
                }

                $data['judul_web'] = "Tambah Surat Masuk | Aplikasi Surat Menyurat";
                $data['data_ns'] = $this->Mcrud->data_ns('sm', "$id_user");
            } elseif ($aksi == 'd') {
                $p = "sm_detail";

                $data['query'] = $this->db->get_where("tbl_sm", array('id_sm' => "$id"))->row();
                $data['judul_web'] = "Detail Surat Masuk | Aplikasi Surat Menyurat";

                // if ($data['query']->id_user == '') {
                // $this->session->set_flashdata('msg',
                // '
                // <div class="alert alert-warning alert-dismissible" role="alert">
                // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                // <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                // </button>
                // <strong>Gagal!</strong> Maaf, Anda tidak berhak mengubah data surat masuk.
                // </div>'
                // );
                //
                // redirect('users/sm');
                // }
                if ($data['user']->row()->level == 'user') {
                    $data2 = array(
                        'dibaca' => '1'
                    );
                    $this->Mcrud->update_sm(array('id_sm' => "$id"), $data2);
                }

                if (isset($_POST['btndisposisi'])) {
                    $data2 = array(
                        'disposisi' => '1'
                    );
                    $this->Mcrud->update_sm(array('id_sm' => "$id"), $data2);

                    redirect('users/sm');
                }

                if (isset($_POST['btndisposisi0'])) {
                    $data2 = array(
                        'disposisi' => '0'
                    );
                    $this->Mcrud->update_sm(array('id_sm' => "$id"), $data2);

                    redirect('users/sm');
                }
            } elseif ($aksi == 'e') {
                $p = "sm_edit";
                if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
                    redirect('404_content');
                }

                $data['query'] = $this->db->get_where("tbl_sm", array('id_sm' => "$id"))->row();
                $data['judul_web'] = "Edit Surat Masuk | Aplikasi Surat Menyurat";

                // if ($data['query']->id_user == '' or $data['query']->level != 'admin') {
                // $this->session->set_flashdata('msg',
                // '
                // <div class="alert alert-warning alert-dismissible" role="alert">
                // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                // <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                // </button>
                // <strong>Gagal!</strong> Maaf, Anda tidak berhak mengubah data surat masuk.
                // </div>'
                // );
                //
                // redirect('users/sm');
                // }

            } elseif ($aksi == 'h') {

                if ($data['user']->row()->level == 's_admin') {
                    redirect('404_content');
                }

                $data['query'] = $this->db->get_where("tbl_sm", array('id_sm' => "$id", 'id_user' => "$id_user"))->row();
                $data['judul_web'] = "Hapus Surat Masuk | Aplikasi Surat Menyurat";

                if ($data['query']->level != 'user') {
                    // $this->session->set_flashdata('msg',
                    // '
                    // <div class="alert alert-warning alert-dismissible" role="alert">
                    // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    // <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                    // </button>
                    // <strong>Gagal!</strong> Maaf, Anda tidak berhak menghapus data surat masuk.
                    // </div>'
                    // );

                    $data2 = array(
                        'id_user' => ''
                    );
                    $this->Mcrud->update_sm(array('id_sm' => "$id"), $data2);
                } else {

                    $query_h = $this->db->get_where("tbl_lampiran", array('token_lampiran' => $data['query']->token_lampiran));
                    foreach ($query_h->result() as $baris) {
                        unlink('lampiran/' . $baris->nama_berkas);
                    }

                    $this->Mcrud->delete_lampiran($data['query']->token_lampiran);
                    $this->Mcrud->delete_sm_by_id($id);
                    $this->session->set_flashdata(
                        'msg',
                        '
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
    </button>
    <strong>Sukses!</strong> Surat masuk berhasil dihapus.
</div>'
                    );
                }

                redirect('users/sm');
            } else {
                $p = "sm";

                $data['judul_web'] = "Surat Masuk | Aplikasi Surat Menyurat";
            }

            $this->load->view('users/header', $data);
            $this->load->view("users/pemrosesan/$p", $data);
            $this->load->view('users/footer');


            if (isset($_POST['ns'])) {

                $this->upload->initialize(array(
                    "upload_path" => "./lampiran",
                    "allowed_types" => "*" //jpg|jpeg|png|gif|bmp
                ));

                if ($this->upload->do_upload('userfile')) {
                    $ns = htmlentities(strip_tags($this->input->post('ns')));
                    $no_asal = htmlentities(strip_tags($this->input->post('no_asal')));
                    $tgl_ns = htmlentities(strip_tags($this->input->post('tgl_ns')));
                    $tgl_no_asal = htmlentities(strip_tags($this->input->post('tgl_no_asal')));
                    $pengirim = htmlentities(strip_tags($this->input->post('pengirim')));
                    $penerima = htmlentities(strip_tags($this->input->post('penerima')));
                    $perihal = htmlentities(strip_tags($this->input->post('perihal')));

                    date_default_timezone_set('Asia/Jakarta');
                    $waktu = date('Y-m-d H:m:s');
                    $tgl = date('d-m-Y');

                    $token = md5("$id_user-$ns-$waktu");

                    $cek_status = $this->db->get_where('tbl_sm', "token_lampiran='$token'")->num_rows();
                    if ($cek_status == 0) {
                        $data = array(
                            'no_surat' => $no_asal,
                            'tgl_ns' => $tgl_no_asal,
                            'no_asal' => $no_asal,
                            'tgl_no_asal' => $tgl_no_asal,
                            'pengirim' => $data['user']->row()->nama_lengkap,
                            'penerima' => $penerima,
                            'perihal' => $perihal,
                            'token_lampiran' => $token,
                            'id_user' => $id_user,
                            'dibaca' => 0,
                            'disposisi' => '',
                            'tgl_sm' => $tgl,
                            'id_user' => $penerima
                        );
                        $this->Mcrud->save_sm($data);

                        // $cek_ns = $this->db->get_where('tbl_ns',"no_surat='$ns'")->row();
                        // $jumlah_no = strlen($cek_ns->no);
                        // $noUrut = substr($cek_ns->no, 0, $jumlah_no);
                        // $noUrut++;
                        // if ($jumlah_no < 10) { // $banyak_nol="0" .$jumlah_no."s"; // }else{ // $banyak_nol=$banyak_nol."s"; // } // $no=sprintf("%$banyak_nol", $noUrut); // $no_posisi=$cek_ns->no_posisi;
                        // $org = $cek_ns->org;
                        // $org_posisi = $cek_ns->org_posisi;
                        // $bag = $cek_ns->bag;
                        // $bag_posisi = $cek_ns->bag_posisi;
                        // $subbag = $cek_ns->subbag;
                        // $subbag_posisi = $cek_ns->subbag_posisi;
                        // $bln = $cek_ns->bln;
                        // $bln_posisi = $cek_ns->bln_posisi;
                        // $thn = $cek_ns->thn;
                        // $thn_posisi = $cek_ns->thn_posisi;
                        // $prefix = $cek_ns->prefix;
                        // $prefix_posisi = $cek_ns->prefix_posisi;
                        // $separator = $cek_ns->separator;
                        // $reset_no = $cek_ns->reset_no;
                        //
                        // if ($reset_no == 'thn') {
                        // if ($thn != date('Y')) {
                        // $thn = date('Y');
                        // $no = sprintf("%$banyak_nol", 1);
                        // }
                        // $reset_no = 'thn';
                        // }elseif ($reset_no == 'bln') {
                        // $array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                        // $bulan = $array_bulan[date('n')];
                        //
                        // if ($bln != $bulan) {
                        // $bln = $bulan;
                        // $no = sprintf("%$banyak_nol", 1);
                        // }
                        //
                        // $reset_no = 'bln';
                        // }else{
                        // $reset_no = 'thn';
                        // }
                        //
                        // $no1 = '';
                        // $no2 = '';
                        // $no3 = '';
                        // $no4 = '';
                        // $no5 = '';
                        // $no6 = '';
                        //
                        // //1
                        // if ($no_posisi == 1) {
                        // $no1 = $no;
                        // }elseif ($no_posisi == 2) {
                        // $no2 = $no;
                        // }elseif ($no_posisi == 3) {
                        // $no3 = $no;
                        // }elseif ($no_posisi == 4) {
                        // $no4 = $no;
                        // }elseif ($no_posisi == 5) {
                        // $no5 = $no;
                        // }elseif ($no_posisi == 6) {
                        // $no6 = $no;
                        // }
                        //
                        // //2
                        // if ($org_posisi == 1) {
                        // $no1 = $org;
                        // }elseif ($org_posisi == 2) {
                        // $no2 = $org;
                        // }elseif ($org_posisi == 3) {
                        // $no3 = $org;
                        // }elseif ($org_posisi == 4) {
                        // $no4 = $org;
                        // }elseif ($org_posisi == 5) {
                        // $no5 = $org;
                        // }elseif ($org_posisi == 6) {
                        // $no6 = $org;
                        // }
                        //
                        // //3
                        // if ($bag_posisi == 1) {
                        // $no1 = $bag;
                        // }elseif ($bag_posisi == 2) {
                        // $no2 = $bag;
                        // }elseif ($bag_posisi == 3) {
                        // $no3 = $bag;
                        // }elseif ($bag_posisi == 4) {
                        // $no4 = $bag;
                        // }elseif ($bag_posisi == 5) {
                        // $no5 = $bag;
                        // }elseif ($bag_posisi == 6) {
                        // $no6 = $bag;
                        // }
                        //
                        // //4
                        // if ($subbag_posisi == 1) {
                        // $no1 = $subbag;
                        // }elseif ($subbag_posisi == 2) {
                        // $no2 = $subbag;
                        // }elseif ($subbag_posisi == 3) {
                        // $no3 = $subbag;
                        // }elseif ($subbag_posisi == 4) {
                        // $no4 = $subbag;
                        // }elseif ($subbag_posisi == 5) {
                        // $no5 = $subbag;
                        // }elseif ($subbag_posisi == 6) {
                        // $no6 = $subbag;
                        // }
                        //
                        // //5
                        // if ($bln_posisi == 1) {
                        // $no1 = $bln;
                        // }elseif ($bln_posisi == 2) {
                        // $no2 = $bln;
                        // }elseif ($bln_posisi == 3) {
                        // $no3 = $bln;
                        // }elseif ($bln_posisi == 4) {
                        // $no4 = $bln;
                        // }elseif ($bln_posisi == 5) {
                        // $no5 = $bln;
                        // }elseif ($bln_posisi == 6) {
                        // $no6 = $bln;
                        // }
                        //
                        // //6
                        // if ($thn_posisi == 1) {
                        // $no1 = $thn;
                        // }elseif ($thn_posisi == 2) {
                        // $no2 = $thn;
                        // }elseif ($thn_posisi == 3) {
                        // $no3 = $thn;
                        // }elseif ($thn_posisi == 4) {
                        // $no4 = $thn;
                        // }elseif ($thn_posisi == 5) {
                        // $no5 = $thn;
                        // }elseif ($thn_posisi == 6) {
                        // $no6 = $thn;
                        // }
                        //
                        // if ($no1 != '') {
                        // if ($no2 != '') {
                        // $no1 = "$no1$separator";
                        // }else{
                        // $no1 = "$no1";
                        // }
                        // }
                        // if ($no2 != '') {
                        // if ($no3 != '') {
                        // $no2 = "$no2$separator";
                        // }else{
                        // $no2 = "$no2";
                        // }
                        // }
                        // if ($no3 != '') {
                        // if ($no4 != '') {
                        // $no3 = "$no3$separator";
                        // }else{
                        // $no3 = "$no3";
                        // }
                        // }
                        // if ($no4 != '') {
                        // if ($no5 != '') {
                        // $no4 = "$no4$separator";
                        // }else{
                        // $no4 = "$no4";
                        // }
                        // }
                        // if ($no5 != '') {
                        // if ($no6 != '') {
                        // $no5 = "$no5$separator";
                        // }else{
                        // $no5 = "$no5";
                        // }
                        // }
                        //
                        //
                        // if ($prefix_posisi == "kiri") {
                        // $p_kiri = "$prefix$separator";
                        // $p_kanan = '';
                        // }else{
                        // $p_kiri = '';
                        // $p_kanan = "$separator$prefix";
                        // }
                        //
                        //
                        // $no_surat = "$p_kiri$no1$no2$no3$no4$no5$no6$p_kanan";
                        //
                        // $data2 = array(
                        // 'no' => $no,
                        // 'no_surat' => $no_surat
                        // );
                        // $this->Mcrud->update_ns(array('no_surat' => "$ns"), $data2);

                    }

                    $nama = $this->upload->data('file_name');
                    $ukuran = $this->upload->data('file_size');

                    $this->db->insert('tbl_lampiran', array('nama_berkas' => $nama, 'ukuran' => $ukuran, 'token_lampiran' => "$token"));
                }
                // $this->session->set_flashdata('msg',
                // '
                // <div class="alert alert-success alert-dismissible" role="alert">
                // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                // <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                // </button>
                // <strong>Sukses!</strong> Surat Masuk berhasil ditambahkan.
                // </div>'
                // );
                //
                // redirect('users/sm');
            }

            if (isset($_POST['btnupdate'])) {
                $no_asal = htmlentities(strip_tags($this->input->post('no_asal')));
                // $tgl_ns = htmlentities(strip_tags($this->input->post('tgl_ns')));
                $tgl_no_asal = htmlentities(strip_tags($this->input->post('tgl_no_asal')));
                // $pengirim = htmlentities(strip_tags($this->input->post('pengirim')));
                $penerima = htmlentities(strip_tags($this->input->post('penerima')));
                $perihal = htmlentities(strip_tags($this->input->post('perihal')));

                $data = array(
                    'tgl_ns' => $tgl_no_asal,
                    'no_asal' => $no_asal,
                    'tgl_no_asal' => $tgl_no_asal,
                    'pengirim' => $data['user']->row()->nama_lengkap,
                    'penerima' => $penerima,
                    'perihal' => $perihal,
                    'id_user' => $penerima
                );
                $this->Mcrud->update_sm(array('id_sm' => $id), $data);

                $this->session->set_flashdata(
                    'msg',
                    '
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
        </button>
        <strong>Sukses!</strong> Surat Masuk berhasil diupdate.
    </div>'
                );
                redirect('users/sm');
            }
        }
    }


    public function sk($aksi = '', $id = '')
    {
        $ceks = $this->session->userdata('surat_menyurat@Proyek-2017');
        $id_user = $this->session->userdata('id_user@Proyek-2017');
        if (!isset($ceks)) {
            redirect('web/login');
        } else {
            $data['user'] = $this->Mcrud->get_users_by_un($ceks);

            // if ($data['user']->row()->level == 'admin') {
            // redirect('404_content');
            // }

            $this->db->join('tbl_user', 'tbl_sk.id_user=tbl_user.id_user');
            if ($data['user']->row()->level == 'user') {
                $this->db->where('tbl_sk.id_user', "$id_user");
            }
            $this->db->order_by('tbl_sk.id_sk', 'DESC');
            $data['sk'] = $this->db->get("tbl_sk");

            $this->db->order_by('tbl_bagian.nama_bagian', 'ASC');
            $data['bagian'] = $this->db->get_where("tbl_bagian", "id_user='$id_user'")->result();

            if ($aksi == 't') {
                $p = "sk_tambah";
                if ($data['user']->row()->level == 's_admin') {
                    redirect('404_content');
                }

                $data['judul_web'] = "Tambah Surat Keluar | Aplikasi Surat Menyurat";
                $data['data_ns'] = $this->Mcrud->data_ns('sk', "$id_user");
            } elseif ($aksi == 'd') {
                $p = "sk_detail";

                $this->db->join('tbl_user', 'tbl_sk.id_user=tbl_user.id_user');
                $data['query'] = $this->db->get_where("tbl_sk", array('id_sk' => "$id"))->row();
                $data['judul_web'] = "Detail Surat Keluar | Aplikasi Surat Menyurat";

                // if ($data['query']->id_user == '') {
                // $this->session->set_flashdata('msg',
                // '
                // <div class="alert alert-warning alert-dismissible" role="alert">
                // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                // <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                // </button>
                // <strong>Gagal!</strong> Maaf, Anda tidak berhak mengubah data surat keluar.
                // </div>'
                // );
                //
                // redirect('users/sk');
                // }
                if ($data['user']->row()->level == 'admin') {
                    $data2 = array(
                        'dibaca' => '1'
                    );
                    $this->Mcrud->update_sk(array('id_sk' => "$id"), $data2);
                }

                if (isset($_POST['btndisposisi'])) {
                    $data2 = array(
                        'disposisi' => $_POST['bagian']
                    );
                    $this->Mcrud->update_sk(array('id_sk' => "$id"), $data2);

                    redirect('users/sk');
                }

                if (isset($_POST['btndisposisi0'])) {
                    $data2 = array(
                        'disposisi' => '0'
                    );
                    $this->Mcrud->update_sk(array('id_sk' => "$id"), $data2);

                    redirect('users/sk');
                }

                if (isset($_POST['btnperingatan'])) {
                    $data2 = array(
                        'peringatan' => '1'
                    );
                    $this->Mcrud->update_sk(array('id_sk' => "$id"), $data2);

                    redirect('users/sk');
                }

                if (isset($_POST['btnperingatan0'])) {
                    $data2 = array(
                        'peringatan' => '0'
                    );
                    $this->Mcrud->update_sk(array('id_sk' => "$id"), $data2);

                    redirect('users/sk');
                }
            } elseif ($aksi == 'e') {
                $p = "sk_edit";
                if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'admin') {
                    redirect('404_content');
                }

                // $this->db->join('tbl_user', 'tbl_sk.id_user=tbl_user.id_user');
                $data['query'] = $this->db->get_where("tbl_sk", array('id_sk' => "$id", 'id_user' => "$id_user"))->row();
                $data['judul_web'] = "Edit Surat Keluar | Aplikasi Surat Menyurat";

                if ($data['query']->id_user == '') {
                    $this->session->set_flashdata(
                        'msg',
                        '
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
        </button>
        <strong>Gagal!</strong> Maaf, Anda tidak berhak mengubah data surat keluar.
    </div>'
                    );

                    redirect('users/sk');
                }
            } elseif ($aksi == 'h') {

                if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'admin') {
                    redirect('404_content');
                }

                $data['query'] = $this->db->get_where("tbl_sk", array('id_sk' => "$id", 'id_user' => "$id_user"))->row();
                $data['judul_web'] = "Hapus Surat Keluar | Aplikasi Surat Menyurat";

                if ($data['query']->id_user != '') {
                    // $this->session->set_flashdata('msg',
                    // '
                    // <div class="alert alert-warning alert-dismissible" role="alert">
                    // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    // <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                    // </button>
                    // <strong>Gagal!</strong> Maaf, Anda tidak berhak menghapus data surat keluar.
                    // </div>'
                    // );
                    $data2 = array(
                        'id_user' => ''
                    );
                    $this->Mcrud->update_sk(array('id_sk' => "$id"), $data2);
                } else {

                    $query_h = $this->db->get_where("tbl_lampiran", array('token_lampiran' => $data['query']->token_lampiran));
                    foreach ($query_h->result() as $baris) {
                        unlink('lampiran/' . $baris->nama_berkas);
                    }

                    $this->Mcrud->delete_lampiran($data['query']->token_lampiran);
                    $this->Mcrud->delete_sk_by_id($id);
                    $this->session->set_flashdata(
                        'msg',
                        '
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
        </button>
        <strong>Sukses!</strong> Surat keluar berhasil dihapus.
    </div>'
                    );
                }

                redirect('users/sk');
            } else {
                $p = "sk";

                $data['judul_web'] = "Surat Keluar | Aplikasi Surat Menyurat";
            }

            $this->load->view('users/header', $data);
            $this->load->view("users/pemrosesan/$p", $data);
            $this->load->view('users/footer');

            if (isset($_POST['ns'])) {

                $this->upload->initialize(array(
                    "upload_path" => "./lampiran",
                    "allowed_types" => "*" //jpg|jpeg|png|gif|bmp
                ));

                if ($this->upload->do_upload('userfile')) {
                    $ns = htmlentities(strip_tags($this->input->post('ns')));
                    $tgl_ns = htmlentities(strip_tags($this->input->post('tgl_ns')));
                    $bagian = htmlentities(strip_tags($this->input->post('bagian')));
                    $perihal = htmlentities(strip_tags($this->input->post('perihal')));

                    date_default_timezone_set('Asia/Jakarta');
                    $waktu = date('Y-m-d H:m:s');
                    $tgl = date('d-m-Y');

                    $token = md5("$id_user-$ns-$waktu");

                    $cek_status = $this->db->get_where('tbl_sk', "token_lampiran='$token'")->num_rows();
                    if ($cek_status == 0) {
                        $data = array(
                            'no_surat' => $ns,
                            'tgl_ns' => $tgl_ns,
                            'pengirim' => '',
                            'penerima' => '',
                            'id_bagian' => $bagian,
                            'perihal' => $perihal,
                            'token_lampiran' => $token,
                            'id_user' => $id_user,
                            'dibaca' => 0,
                            'disposisi' => '',
                            'peringatan' => '',
                            'tgl_sk' => $tgl
                        );
                        $this->Mcrud->save_sk($data);

                        // $cek_ns = $this->db->get_where('tbl_ns',"no_surat='$ns'")->row();
                        // $jumlah_no = strlen($cek_ns->no);
                        // $noUrut = substr($cek_ns->no, 2, $jumlah_no);
                        // $noUrut++;
                        // if ($jumlah_no < 10) { // $banyak_nol="0" .$jumlah_no."s"; // }else{ // $banyak_nol=$banyak_nol."s"; // } // $no=sprintf("%$banyak_nol", $noUrut); // // $no_posisi=$cek_ns->no_posisi;
                        // $org = $cek_ns->org;
                        // $org_posisi = $cek_ns->org_posisi;
                        // $bag = $cek_ns->bag;
                        // $bag_posisi = $cek_ns->bag_posisi;
                        // $subbag = $cek_ns->subbag;
                        // $subbag_posisi = $cek_ns->subbag_posisi;
                        // $bln = $cek_ns->bln;
                        // $bln_posisi = $cek_ns->bln_posisi;
                        // $thn = $cek_ns->thn;
                        // $thn_posisi = $cek_ns->thn_posisi;
                        // $prefix = $cek_ns->prefix;
                        // $prefix_posisi = $cek_ns->prefix_posisi;
                        // $separator = $cek_ns->separator;
                        // $reset_no = $cek_ns->reset_no;
                        //
                        // if ($reset_no == 'thn') {
                        // if ($thn != date('Y')) {
                        // $thn = date('Y');
                        // $no = sprintf("%$banyak_nol", 1);
                        // }
                        // $reset_no = 'thn';
                        // }elseif ($reset_no == 'bln') {
                        // $array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                        // $bulan = $array_bulan[date('n')];
                        //
                        // if ($bln != $bulan) {
                        // $bln = $bulan;
                        // $no = sprintf("%$banyak_nol", 1);
                        // }
                        //
                        // $reset_no = 'bln';
                        // }else{
                        // $reset_no = 'thn';
                        // }
                        //
                        // $no1 = '';
                        // $no2 = '';
                        // $no3 = '';
                        // $no4 = '';
                        // $no5 = '';
                        // $no6 = '';
                        //
                        // //1
                        // if ($no_posisi == 1) {
                        // $no1 = $no;
                        // }elseif ($no_posisi == 2) {
                        // $no2 = $no;
                        // }elseif ($no_posisi == 3) {
                        // $no3 = $no;
                        // }elseif ($no_posisi == 4) {
                        // $no4 = $no;
                        // }elseif ($no_posisi == 5) {
                        // $no5 = $no;
                        // }elseif ($no_posisi == 6) {
                        // $no6 = $no;
                        // }
                        //
                        // //2
                        // if ($org_posisi == 1) {
                        // $no1 = $org;
                        // }elseif ($org_posisi == 2) {
                        // $no2 = $org;
                        // }elseif ($org_posisi == 3) {
                        // $no3 = $org;
                        // }elseif ($org_posisi == 4) {
                        // $no4 = $org;
                        // }elseif ($org_posisi == 5) {
                        // $no5 = $org;
                        // }elseif ($org_posisi == 6) {
                        // $no6 = $org;
                        // }
                        //
                        // //3
                        // if ($bag_posisi == 1) {
                        // $no1 = $bag;
                        // }elseif ($bag_posisi == 2) {
                        // $no2 = $bag;
                        // }elseif ($bag_posisi == 3) {
                        // $no3 = $bag;
                        // }elseif ($bag_posisi == 4) {
                        // $no4 = $bag;
                        // }elseif ($bag_posisi == 5) {
                        // $no5 = $bag;
                        // }elseif ($bag_posisi == 6) {
                        // $no6 = $bag;
                        // }
                        //
                        // //4
                        // if ($subbag_posisi == 1) {
                        // $no1 = $subbag;
                        // }elseif ($subbag_posisi == 2) {
                        // $no2 = $subbag;
                        // }elseif ($subbag_posisi == 3) {
                        // $no3 = $subbag;
                        // }elseif ($subbag_posisi == 4) {
                        // $no4 = $subbag;
                        // }elseif ($subbag_posisi == 5) {
                        // $no5 = $subbag;
                        // }elseif ($subbag_posisi == 6) {
                        // $no6 = $subbag;
                        // }
                        //
                        // //5
                        // if ($bln_posisi == 1) {
                        // $no1 = $bln;
                        // }elseif ($bln_posisi == 2) {
                        // $no2 = $bln;
                        // }elseif ($bln_posisi == 3) {
                        // $no3 = $bln;
                        // }elseif ($bln_posisi == 4) {
                        // $no4 = $bln;
                        // }elseif ($bln_posisi == 5) {
                        // $no5 = $bln;
                        // }elseif ($bln_posisi == 6) {
                        // $no6 = $bln;
                        // }
                        //
                        // //6
                        // if ($thn_posisi == 1) {
                        // $no1 = $thn;
                        // }elseif ($thn_posisi == 2) {
                        // $no2 = $thn;
                        // }elseif ($thn_posisi == 3) {
                        // $no3 = $thn;
                        // }elseif ($thn_posisi == 4) {
                        // $no4 = $thn;
                        // }elseif ($thn_posisi == 5) {
                        // $no5 = $thn;
                        // }elseif ($thn_posisi == 6) {
                        // $no6 = $thn;
                        // }
                        //
                        // if ($no1 != '') {
                        // if ($no2 != '') {
                        // $no1 = "$no1$separator";
                        // }else{
                        // $no1 = "$no1";
                        // }
                        // }
                        // if ($no2 != '') {
                        // if ($no3 != '') {
                        // $no2 = "$no2$separator";
                        // }else{
                        // $no2 = "$no2";
                        // }
                        // }
                        // if ($no3 != '') {
                        // if ($no4 != '') {
                        // $no3 = "$no3$separator";
                        // }else{
                        // $no3 = "$no3";
                        // }
                        // }
                        // if ($no4 != '') {
                        // if ($no5 != '') {
                        // $no4 = "$no4$separator";
                        // }else{
                        // $no4 = "$no4";
                        // }
                        // }
                        // if ($no5 != '') {
                        // if ($no6 != '') {
                        // $no5 = "$no5$separator";
                        // }else{
                        // $no5 = "$no5";
                        // }
                        // }
                        //
                        //
                        // if ($prefix_posisi == "kiri") {
                        // $p_kiri = "$prefix$separator";
                        // $p_kanan = '';
                        // }else{
                        // $p_kiri = '';
                        // $p_kanan = "$separator$prefix";
                        // }
                        //
                        //
                        // $no_surat = "$p_kiri$no1$no2$no3$no4$no5$no6$p_kanan";

                        // $data2 = array(
                        // 'no' => $no,
                        // 'no_surat' => $no_surat
                        // );
                        // $this->Mcrud->update_ns(array('no_surat' => "$ns"), $data2);
                    }

                    $nama = $this->upload->data('file_name');
                    $ukuran = $this->upload->data('file_size');

                    $this->db->insert('tbl_lampiran', array('nama_berkas' => $nama, 'ukuran' => $ukuran, 'token_lampiran' => "$token"));
                }
            }

            if (isset($_POST['btnupdate'])) {
                $tgl_ns = htmlentities(strip_tags($this->input->post('tgl_ns')));
                $bagian = htmlentities(strip_tags($this->input->post('bagian')));
                $perihal = htmlentities(strip_tags($this->input->post('perihal')));

                $data = array(
                    'tgl_ns' => $tgl_ns,
                    'id_bagian' => $bagian,
                    'perihal' => $perihal
                );
                $this->Mcrud->update_sk(array('id_sk' => $id), $data);

                $this->session->set_flashdata(
                    'msg',
                    '
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
            </button>
            <strong>Sukses!</strong> Surat Keluar berhasil diupdate.
        </div>'
                );
                redirect('users/sk');
            }
        }
    }

    public function lap_sk()
    {
        $ceks = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!isset($ceks)) {
            redirect('web/login');
        } else {
            $data['user'] = $this->Mcrud->get_users_by_un($ceks);
            $data['judul_web'] = "Laporan Surat Keluar | Aplikasi Surat Menyurat";

            $this->load->view('users/header', $data);
            $this->load->view('users/laporan/lap_sk', $data);
            $this->load->view('users/footer');

            if (isset($_POST['data_lap'])) {
                $tgl1 = date('d-m-Y', strtotime(htmlentities(strip_tags($this->input->post('tgl1')))));
                $tgl2 = date('d-m-Y', strtotime(htmlentities(strip_tags($this->input->post('tgl2')))));

                redirect("users/data_sk/$tgl1/$tgl2");
            }
        }
    }


    public function data_sk($tgl1 = '', $tgl2 = '')
    {

        if ($tgl1 != '' and $tgl2 != '') {
            $data['sql'] = $this->db->query("SELECT * FROM tbl_sk WHERE (tgl_sk BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sk DESC");

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['judul_web'] = "Data Laporan Surat Keluar | Aplikasi Surat Menyurat";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/laporan/data_sk', $data);
            $this->load->view('templates/footer');

            if (isset($_POST['btncetak'])) {
                redirect("surat/cetak_sk/$tgl1/$tgl2");
            }
        } else {
            redirect('404_content');
        }
    }


    public function cetak_sk($tgl1 = '', $tgl2 = '')
    {
        $ceks = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!isset($ceks)) {
            redirect('web/login');
        } else {

            if ($tgl1 != '' and $tgl2 != '') {
                $data['sql'] = $this->db->query("SELECT * FROM tbl_sk WHERE (tgl_sk BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sk DESC");

                $data['user'] = $this->user->get_users_by_un($ceks);
                $data['judul_web'] = "Data Laporan Surat Keluar | Aplikasi Surat Menyurat";

                $this->load->view('users/laporan/cetak_sk', $data);
            } else {
                redirect('404_content');
            }
        }
    }


    public function lap_sm()
    {
        $ceks = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!isset($ceks)) {
            redirect('web/login');
        } else {
            $data['user'] = $this->Mcrud->get_users_by_un($ceks);
            $data['judul_web'] = "Laporan Surat Masuk | Aplikasi Surat Menyurat";

            $this->load->view('users/header', $data);
            $this->load->view('users/laporan/lap_sm', $data);
            $this->load->view('users/footer');

            if (isset($_POST['data_lap'])) {
                $tgl1 = date('d-m-Y', strtotime(htmlentities(strip_tags($this->input->post('tgl1')))));
                $tgl2 = date('d-m-Y', strtotime(htmlentities(strip_tags($this->input->post('tgl2')))));

                redirect("users/data_sm/$tgl1/$tgl2");
            }
        }
    }

    public function data_sm($tgl1 = '', $tgl2 = '')
    {
        $ceks = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!isset($ceks)) {
            redirect('web/login');
        } else {

            if ($tgl1 != '' and $tgl2 != '') {
                $data['sql'] = $this->db->query("SELECT * FROM tbl_sm WHERE (tgl_sm BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sm DESC");

                $data['user'] = $this->Mcrud->get_users_by_un($ceks);
                $data['judul_web'] = "Data Laporan Surat Masuk | Aplikasi Surat Menyurat";
                $this->load->view('users/header', $data);
                $this->load->view('users/laporan/data_sm', $data);
                $this->load->view('users/footer', $data);

                if (isset($_POST['btncetak'])) {
                    redirect("users/cetak_sm/$tgl1/$tgl2");
                }
            } else {
                redirect('404_content');
            }
        }
    }

    public function cetak_sm($tgl1 = '', $tgl2 = '')
    {
        $ceks = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!isset($ceks)) {
            redirect('web/login');
        } else {

            if ($tgl1 != '' and $tgl2 != '') {
                $data['sql'] = $this->db->query("SELECT * FROM tbl_sm WHERE (tgl_sm BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sm DESC");

                $data['user'] = $this->Mcrud->get_users_by_un($ceks);
                $data['judul_web'] = "Data Laporan Surat Masuk | Aplikasi Surat Menyurat";

                $this->load->view('users/laporan/cetak_sm', $data);
            } else {
                redirect('404_content');
            }
        }
    }
}

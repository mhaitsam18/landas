<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>
<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col-md-6">
            <a href="<?= base_url('user/viewpermohonan') ?>" class="btn btn-primary btn-circle">
                <i class="fas fa-chevron-left"></i>
            </a>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Buat Surat
                </div>
                <div class="card-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nomor" name='nomor' placeholder="Nomor Surat" value="<?= set_value('nomor'); ?>">
                            <small class="text-danger"><?= form_error('nomor'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama" name='nama' placeholder="Full Name" value="<?= $permohonan['nama']; ?>">
                            <small class="text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="ttl" name='ttl' placeholder="Tempat Tnggal Lahir" value="<?= $pemohon['tempatlahir']; ?>, <?= tgl_indo($pemohon['tanggallahir']) ?>">
                            <small class="text-danger"><?= form_error('ttl'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="jenisk" name='jenisk' placeholder="Jenisa Kelamin" value="<?= $pemohon['jenis_kelamin']; ?>">
                            <small class="text-danger"><?= form_error('jenisk'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="agama" name='agama' placeholder="Agama" value="<?= $pemohon['agama']; ?>">
                            <small class="text-danger"><?= form_error('agama'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="status" name='status' placeholder="Status" value="<?= $pemohon['status']; ?>">
                            <small class="text-danger"><?= form_error('status'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="pekerjaan" name='pekerjaan' placeholder="Pekerjaan" value="<?= $pemohon['pekerjaan']; ?>">
                            <small class="text-danger"><?= form_error('pekerjaan'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nik" name='nik' placeholder="Nomor Induk Kependudukan" value="<?= $pemohon['nik']; ?>">
                            <small class="text-danger"><?= form_error('nik'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="textarea" class="form-control form-control-user" id="alamat" name='alamat' placeholder="Alamat" value="<?= $pemohon['alamat']; ?>">
                            <small class="text-danger"><?= form_error('alamat'); ?></small>
                        </div>
                        <div class="form-group">
                            <small><label for="tanggal">Tanggal</label></small>
                            <input type="date" class="form-control form-control-user" id="tanggal" name='tanggal' value="<?= set_value('tanggal'); ?>">
                            <small class="text-danger"><?= form_error('tanggal'); ?></small>
                        </div>

                        <input hidden type="text" class="form-control form-control-user" id="id_user" name='id_user' placeholder="User" value="<?= $pemohon['id']; ?>">
                        <input hidden type="text" class="form-control form-control-user" id="id_sk" name='id_sk' placeholder="SK" value="<?= $permohonan['jenissurat']; ?>">
                        <input hidden type="text" class="form-control form-control-user" id="inputsurat_id" name='inputsurat_id' placeholder="Permohonan" value="<?= $permohonan['id']; ?>">

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Buat Surat
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
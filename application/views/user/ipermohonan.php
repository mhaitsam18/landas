<div class="container">

    <?= $this->session->flashdata('flash') ?>

    <div class="row mt-3 mb-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Pilih Jenis Surat
                </div>
                <div class="card-body">



                    <div class="form-group row">
                        <label class="col-form-label ml-3">Pilih Jenis Surat</label>
                        <div class="col-md-12">
                            <select class="form-control" id="jenis_surat" name="jenis_surat">
                                <option selected value="" href="<?= base_url('user/menginput/') ?>">Select..
                                </option>
                                <?php foreach ($jenis_surat as $surat) : ?>
                                    <option value="<?php echo $surat->id; ?>" href="<?= base_url('user/menginput/' . $surat->id) ?>" <?= $this->uri->segment('3') == $surat->id ? 'selected' : '' ?>>
                                        <?php echo $surat->nama_surat; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- <a href="" class="btn btn-primary btn-user btn-block">
                        Pilih
                    </a> -->

                </div>
            </div>
        </div>

        <?php if ($this->uri->segment('3')) : ?>
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        Input Permohonan
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= validation_errors() ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <p>Nama : <?= $user['nama'] ?></p>
                                <input hidden type="text" class="form-control form-control-user" id="nama" name='nama' placeholder="Full Name" value="<?= $user['nama'] ?>">
                                <small class="text-danger"><?= form_error('nama'); ?></small>
                            </div>
                            <div class="form-group">
                                <p>NIK : <?= $user['nik'] ?></p>
                                <input hidden type="text" class="form-control form-control-user" id="nik" name='nik' placeholder="Nomor Induk Kependudukan" value="<?= $user['nik'] ?>">
                                <small class="text-danger"><?= form_error('nik'); ?></small>
                            </div>
                            <div class="form-group">
                                <input type="textarea" class="form-control form-control-user" id="alamat" name='alamat' placeholder="Alamat" value="<?= $user['alamat'] ?>">
                                <small class="text-danger"><?= form_error('alamat'); ?></small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nohp" name='nohp' placeholder="No HP" value="<?= set_value('nohp'); ?>">
                                <small class="text-danger"><?= form_error('nohp'); ?></small>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name='email' placeholder="Email" value="<?= $user['email'] ?>">
                                <small class="text-danger"><?= form_error('email'); ?></small>
                            </div>
                            <div class="form-group">
                                <small><label for="tanggalinput">Tanggal Input</label></small>
                                <input type="date" class="form-control form-control-user" id="tanggalinput" name='tanggalinput' placeholder="Tanggal Inputan" value="<?= set_value('tanggalinput'); ?>">
                                <small class="text-danger"><?= form_error('tanggalinput'); ?></small>
                            </div>

                            <div class="form-group row mt-3 mb-3">
                                <label class="col-md-3 col-form-label">Status</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="status_kependudukan" name="status_kependudukan" value="<?= set_value('status_kependudukan'); ?>">
                                        <option selected="0">Select..</option>
                                        <?php foreach ($status as $stat) : ?>
                                            <option value="<?php echo $stat->status; ?>"> <?php echo $stat->status; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger"><?= form_error('status_kependudukan'); ?></small>
                                </div>
                            </div>
                            <?php switch ($this->uri->segment('3')):
                                case 1: ?>
                                    <div class="input-file">
                                        <label for="">Fotokopi Kartu Tanda Penduduk (KTP)</label>
                                        <input type="hidden" name="nama_file[0]" value="Fotokopi Kartu Tanda Penduduk (KTP)">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file1">Upload File</label>
                                            <input type="file" class="form-control" id="file1" name="file[0]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotokopi Kartu Keluarga (KK)</label>
                                        <input type="hidden" name="nama_file[1]" value="Fotokopi Kartu Keluarga (KK)">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file2">Upload File</label>
                                            <input type="file" class="form-control" id="file2" name="file[1]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Surat Pengantar dari RT dan RW setempat</label>
                                        <input type="hidden" name="nama_file[2]" value="Surat Pengantar dari RT dan RW setempat">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file3">Upload File</label>
                                            <input type="file" class="form-control" id="file3" name="file[2]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Surat Permohonan bermaterai Rp6.000</label>
                                        <input type="hidden" name="nama_file[3]" value="Surat Permohonan bermaterai Rp6.000">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file4">Upload File</label>
                                            <input type="file" class="form-control" id="file4" name="file[3]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="alert alert-danger" role="alert">
                                        Pastikan seluruh file pendukung dalam format <b>.pdf</b>
                                    </div>
                                <?php break;
                                case 2: ?>
                                    <div class="input-file">
                                        <label for="">Surat pengantar dari RT/RW setempat</label>
                                        <input type="hidden" name="nama_file[0]" value="Surat pengantar dari RT/RW setempat">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file1">Upload File</label>
                                            <input type="file" class="form-control" id="file1" name="file[0]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotokopi KTP elektronik pemohon</label>
                                        <input type="hidden" name="nama_file[1]" value="Fotokopi KTP elektronik pemohon">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file2">Upload File</label>
                                            <input type="file" class="form-control" id="file2" name="file[1]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotokopi Kartu Keluarga pemohon</label>
                                        <input type="hidden" name="nama_file[2]" value="Fotokopi Kartu Keluarga pemohon">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file3">Upload File</label>
                                            <input type="file" class="form-control" id="file3" name="file[2]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotokopi KTP elektronik dua orang saksi</label>
                                        <input type="hidden" name="nama_file[3]" value="Fotokopi KTP elektronik dua orang saksi">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file4">Upload File</label>
                                            <input type="file" class="form-control" id="file4" name="file[3]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Surat Pernyataan Belum Menikah</label>
                                        <input type="hidden" name="nama_file[4]" value="Surat Pernyataan Belum Menikah">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file5">Upload File</label>
                                            <input type="file" class="form-control" id="file5" name="file[4]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="alert alert-danger" role="alert">
                                        Pastikan seluruh file pendukung dalam format <b>.pdf</b>
                                    </div>
                                <?php break;
                                case 3: ?>
                                    <div class="input-file">
                                        <label for="">Surat pengantar dan keterangan RT</label>
                                        <input type="hidden" name="nama_file[0]" value="Surat pengantar dan keterangan RT">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file1">Upload File</label>
                                            <input type="file" class="form-control" id="file1" name="file[0]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Surat pernyataan belum terekam pada DTKS (Data Terpadu Kesejahteraan Sosial)</label>
                                        <input type="hidden" name="nama_file[1]" value="Surat pernyataan belum terekam pada DTKS (Data Terpadu Kesejahteraan Sosial)">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file2">Upload File</label>
                                            <input type="file" class="form-control" id="file2" name="file[1]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Rincian pembiayaan biaya pendidikan atau biaya rumah sakit</label>
                                        <input type="hidden" name="nama_file[2]" value="Rincian pembiayaan biaya pendidikan atau biaya rumah sakit">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file3">Upload File</label>
                                            <input type="file" class="form-control" id="file3" name="file[2]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotokopi Kartu Keluarga</label>
                                        <input type="hidden" name="nama_file[3]" value="Fotokopi Kartu Keluarga">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file4">Upload File</label>
                                            <input type="file" class="form-control" id="file4" name="file[3]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotokopi e-KTP</label>
                                        <input type="hidden" name="nama_file[4]" value="Fotokopi e-KTP">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file5">Upload File</label>
                                            <input type="file" class="form-control" id="file5" name="file[4]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Surat Pernyataan Tidak Mampu</label>
                                        <input type="hidden" name="nama_file[5]" value="Surat Pernyataan Tidak Mampu">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file6">Upload File</label>
                                            <input type="file" class="form-control" id="file6" name="file[5]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Tanda lunas Pajak Bumi dan Bangunan (PBB)</label>
                                        <input type="hidden" name="nama_file[6]" value="Tanda lunas Pajak Bumi dan Bangunan (PBB)">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file7">Upload File</label>
                                            <input type="file" class="form-control" id="file7" name="file[6]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Pas foto rumah</label>
                                        <input type="hidden" name="nama_file[7]" value="Pas foto rumah">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file8">Upload File</label>
                                            <input type="file" class="form-control" id="file8" name="file[7]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="alert alert-danger" role="alert">
                                        Pastikan seluruh file pendukung dalam format <b>.pdf</b>
                                    </div>
                                <?php break;
                                case 4: ?>
                                    <div class="input-file">
                                        <label for="">Surat Pengantar dari RT/RW</label>
                                        <input type="hidden" name="nama_file[0]" value="Surat Pengantar dari RT/RW">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file1">Upload File</label>
                                            <input type="file" class="form-control" id="file1" name="file[0]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Surat keterangan dari kelurahan dan pengantar N1 s/d N4</label>
                                        <input type="hidden" name="nama_file[1]" value="Surat keterangan dari kelurahan dan pengantar N1 s/d N4">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file2">Upload File</label>
                                            <input type="file" class="form-control" id="file2" name="file[1]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotocopy Akta kelahiran/Ijazah Terakhir calon mempelai</label>
                                        <input type="hidden" name="nama_file[2]" value="Fotocopy Akta kelahiran/Ijazah Terakhir calon mempelai">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file3">Upload File</label>
                                            <input type="file" class="form-control" id="file3" name="file[2]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotokopi e-KTP calon Mempelai</label>
                                        <input type="hidden" name="nama_file[3]" value="Fotokopi e-KTP calon Mempelai">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file4">Upload File</label>
                                            <input type="file" class="form-control" id="file4" name="file[3]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotokopi Kartu Keluarga calon Mempelai</label>
                                        <input type="hidden" name="nama_file[4]" value="Fotokopi Kartu Keluarga calon Mempelai">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file5">Upload File</label>
                                            <input type="file" class="form-control" id="file5" name="file[4]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotokopi e-KTP Orang Tua Memplai</label>
                                        <input type="hidden" name="nama_file[5]" value="Fotokopi e-KTP Orang Tua Memplai">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file6">Upload File</label>
                                            <input type="file" class="form-control" id="file6" name="file[5]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotokopi Kartu Keluarga Orang Tua Memplai</label>
                                        <input type="hidden" name="nama_file[6]" value="Fotokopi Kartu Keluarga Orang Tua Memplai">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file7">Upload File</label>
                                            <input type="file" class="form-control" id="file7" name="file[6]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotocopy Akta Cerai / Akta Kematian sesuai dengan statusnya</label>
                                        <input type="hidden" name="nama_file[7]" value="Fotocopy Akta Cerai / Akta Kematian sesuai dengan statusnya">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file8">Upload File</label>
                                            <input type="file" class="form-control" id="file8" name="file[7]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotocopy Surat Nikah orang tua calon mempelai</label>
                                        <input type="hidden" name="nama_file[8]" value="Fotocopy Surat Nikah orang tua calon mempelai">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file9">Upload File</label>
                                            <input type="file" class="form-control" id="file9" name="file[8]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Surat pernyataan status perkawinan bermaterai 6000</label>
                                        <input type="hidden" name="nama_file[9]" value="Surat pernyataan status perkawinan bermaterai 6000">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file10">Upload File</label>
                                            <input type="file" class="form-control" id="file10" name="file[9]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Surat rekomendasi nikah calon mempelai Pria</label>
                                        <input type="hidden" name="nama_file[10]" value="Surat rekomendasi nikah calon mempelai Pria">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file11">Upload File</label>
                                            <input type="file" class="form-control" id="file11" name="file[10]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Foto 2 x 3 berwarna calon mempelai</label>
                                        <input type="hidden" name="nama_file[11]" value="Foto 2 x 3 berwarna calon mempelai">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file12">Upload File</label>
                                            <input type="file" class="form-control" id="file12" name="file[11]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="alert alert-danger" role="alert">
                                        Pastikan seluruh file pendukung dalam format <b>.pdf</b>
                                    </div>
                                <?php break;
                                case 5: ?>
                                    <div class="input-file">
                                        <label for="">Fotokopi KTP</label>
                                        <input type="hidden" name="nama_file[0]" value="Fotokopi KTP">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file1">Upload File</label>
                                            <input type="file" class="form-control" id="file1" name="file[0]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Fotokopi Kartu Keluarga</label>
                                        <input type="hidden" name="nama_file[1]" value="Fotokopi Kartu Keluarga">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file2">Upload File</label>
                                            <input type="file" class="form-control" id="file2" name="file[1]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Surat Pengantar dari RT dan RW</label>
                                        <input type="hidden" name="nama_file[2]" value="Surat Pengantar dari RT dan RW">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file3">Upload File</label>
                                            <input type="file" class="form-control" id="file3" name="file[2]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Surat permohonan dokumen dan data</label>
                                        <input type="hidden" name="nama_file[3]" value="Surat permohonan dokumen dan data">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file4">Upload File</label>
                                            <input type="file" class="form-control" id="file4" name="file[3]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Pas foto 3x4 </label>
                                        <input type="hidden" name="nama_file[4]" value="Pas foto 3x4 ">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file5">Upload File</label>
                                            <input type="file" class="form-control" id="file5" name="file[4]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Surat kuasa (jika pengurus diwakilkan)</label>
                                        <input type="hidden" name="nama_file[5]" value="Surat kuasa (jika pengurus diwakilkan)">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file6">Upload File</label>
                                            <input type="file" class="form-control" id="file6" name="file[5]">
                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                <?php break;
                                case 6: ?>
                                    <div class="input-file">
                                        <label for="">fotokopi KTP</label>
                                        <input type="hidden" name="nama_file[0]" value="fotokopi KTP">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file1">Upload File</label>
                                            <input type="file" class="form-control" id="file1" name="file[0]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                    <div class="input-file">
                                        <label for="">Kartu Keluarga</label>
                                        <input type="hidden" name="nama_file[1]" value="Kartu Keluarga">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file2">Upload File</label>
                                            <input type="file" class="form-control" id="file2" name="file[1]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                <?php break;
                                case 7: ?>
                                    <div class="input-file">
                                        <label for="">fotokopi KTP</label>
                                        <input type="hidden" name="nama_file[0]" value="fotokopi KTP">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file1">Upload File</label>
                                            <input type="file" class="form-control" id="file1" name="file[0]">

                                            <br><small class="text-danger"><?= form_error('file'); ?></small>
                                        </div>
                                    </div>
                                <?php
                                default: ?>
                                    # code...
                                    <?php break; ?>
                            <?php endswitch; ?>
                            <!-- <div class="input-file">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="all_files">Upload File</label>
                                    <input type="file" class="form-control" id="all_files" name="all_files">
                                    <br><small class="text-danger"><?= form_error('all_files'); ?></small>
                                </div>
                                <div class="alert alert-danger" role="alert">
                                    Pastikan seluruh file pendukung telah di <i>Compress</i> dalam format <b>.rar</b>
                                </div>

                            </div> -->
                            <!-- <div class="input-file">


                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="all_files">Upload File</label>
                                    <input type="file" class="form-control" id="all_files" name="all_files">
                                    <br><small class="text-danger"><?= form_error('all_files'); ?></small>
                                </div>
                                <div class="alert alert-danger" role="alert">
                                    Pastikan seluruh file pendukung telah di <i>Compress</i> dalam format <b>.rar</b>
                                </div>

                            </div> -->

                            <input type="hidden" value="<?= $this->uri->segment('3') ?>" name="jenissurat">

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    $('#jenis_surat').change(function() {
        window.location = $(':selected', this).attr('href')
    });
</script>
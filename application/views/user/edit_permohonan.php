<div class="container">

    <?=$this->session->flashdata('flash')?>

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
                            Jenis Surat : <?php echo $permohonan['nama_surat'];?>
                        </div>
                    </div>

                    <!-- <a href="" class="btn btn-primary btn-user btn-block">
                        Pilih
                    </a> -->

                </div>
            </div>
        </div>

        <?php if ($this->uri->segment('3')): ?>
        <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="card-header">
                    Edit Permohonan
                </div>
                <div class="card-body">
                    <?php if (validation_errors()): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?=validation_errors()?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input hidden type="text" class="form-control form-control-user" id="resi" name='resi'
                                value="<?= $permohonan['resi'] ?>">
                        <div class="form-group">
                            <p>Nama : <?= $permohonan['nama']?></p>
                            <input hidden type="text" class="form-control form-control-user" id="nama" name='nama'
                                placeholder="Full Name" value="<?= $permohonan['nama'] ?>">
                            <small class="text-danger"><?=form_error('nama');?></small>
                        </div>
                        <div class="form-group">
                            <p>NIK : <?= $permohonan['nik']?></p>
                            <input hidden type="text" class="form-control form-control-user" id="nik" name='nik'
                                placeholder="Nomor Induk Kependudukan" value="<?=$permohonan['nik']?>">
                            <small class="text-danger"><?=form_error('nik');?></small>
                        </div>
                        <div class="form-group">
                            <input type="textarea" class="form-control form-control-user" id="alamat" name='alamat'
                                placeholder="Alamat" value="<?=$permohonan['alamat']?>">
                            <small class="text-danger"><?=form_error('alamat');?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nohp" name='nohp'
                                placeholder="No HP" value="<?=$permohonan['nohp']?>">
                            <small class="text-danger"><?=form_error('nohp');?></small>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="email" name='email'
                                placeholder="Email" value="<?=$permohonan['email']?>">
                            <small class="text-danger"><?=form_error('email');?></small>
                        </div>
                        <div class="form-group">
                            <small><label for="tanggalinput">Tanggal Input</label></small>
                            <input type="date" class="form-control form-control-user" id="tanggalinput"
                                name='tanggalinput' placeholder="Tanggal Inputan"
                                value="<?=$permohonan['tanggalinput']?>">
                            <small class="text-danger"><?=form_error('tanggalinput');?></small>
                        </div>

                        <div class="form-group row mt-3 mb-3">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="col-md-9">
                                <select class="form-control" id="status_kependudukan" name="status_kependudukan"
                                    value="<?=set_value('status_kependudukan');?>">
                                    <option selected="0">Select..</option>
                                    <?php foreach ($status as $stat): ?>
                                    <option 
                                        value="<?php echo $stat->status; ?>"
                                        <?=$permohonan['status_kependudukan'] == $stat->status ? 'selected' : ''?>>
                                        <?php echo $stat->status; ?></option>
                                    <?php endforeach;?>
                                </select>
                                <small class="text-danger"><?=form_error('status_kependudukan');?></small>
                            </div>
                        </div>

                        <div class="input-file">


                            <div class="input-group mb-3">
                                <label class="input-group-text" for="all_files">Upload File</label>
                                <input type="file" class="form-control" id="all_files" name="all_files">
                                <br><small class="text-danger"><?=form_error('all_files');?></small>
                            </div>
                            <div class="alert alert-danger" role="alert">
                                Pastikan seluruh file pendukung telah di <i>Compress</i> dalam format <b>.rar</b>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Submit
                        </button>

                    </form>
                </div>
            </div>
        </div>
        <?php endif?>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

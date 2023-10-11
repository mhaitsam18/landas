<div class="container">

    <div class="row mt-3 mb-3">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Tambah Akun
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= validation_errors() ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama" name='nama' placeholder="Full Name" value="<?= set_value('nama'); ?>">
                            <small class="text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nik" name='nik' placeholder="Nomor Induk Kependudukan" value="<?= set_value('nik'); ?>">
                            <small class="text-danger"><?= form_error('nik'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="email" name='email' placeholder="Email" value="<?= set_value('email'); ?>">
                            <small class="text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="katasandi1" name='katasandi1' placeholder="Password">
                                <small class="text-danger"><?= form_error('katasandi1'); ?></small>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="katasandi2" name='katasandi2' placeholder="Repeat Password">
                                <small class="text-danger"><?= form_error('katasandi2'); ?></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="tempatlahir" name='tempatlahir' placeholder="Tempat Lahir" value="<?= set_value('tempatlahir'); ?>">
                            <small class="text-danger"><?= form_error('tempatlahir'); ?></small>
                        </div>
                        <div class="form-group">
                            <small><label for="tanggallahir">Tanggal Lahir</label></small>
                            <input type="date" class="form-control form-control-user" id="tanggallahir" name='tanggallahir' value="<?= set_value('tanggallahir'); ?>">
                            <small class="text-danger"><?= form_error('tanggallahir'); ?></small>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-md-3 col-form-label">Agama</label>
                            <div class="col-md-9">
                                <select class="form-control" id="agama" name="agama" value="<?= set_value('agama'); ?>">
                                    <option selected="0">Select..</option>
                                    <?php foreach ($agama as $agm) : ?>
                                        <option value="<?php echo $agm->id; ?>"> <?php echo $agm->agama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger"><?= form_error('agama'); ?></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="textarea" class="form-control form-control-user" id="alamat" name='alamat' placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                            <small class="text-danger"><?= form_error('alamat'); ?></small>
                        </div>
                        <div class="form-group row mt-3 mb-3">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="col-md-9">
                                <select class="form-control" id="status" name="status" value="<?= set_value('status'); ?>">
                                    <option selected="0">Select..</option>
                                    <?php foreach ($status as $stat) : ?>
                                        <option value="<?php echo $stat->id; ?>"> <?php echo $stat->status; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger"><?= form_error('status'); ?></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="scanktp">Scan KTP</label>
                            <input type="file" class="form-control" id="scanktp" name="scanktp" value="<?= set_value('scanktp'); ?>">
                            <br><small class="text-danger"><?= form_error('scanktp'); ?></small>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="scankk">Scan KK</label>
                            <input type="file" class="form-control" id="scankk" name="scankk" value="<?= set_value('scankk'); ?>">
                            <br><small class="text-danger"><?= form_error('scankk'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Buat Akun
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
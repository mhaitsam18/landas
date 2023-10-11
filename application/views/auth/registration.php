<div class="container">



    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/regist'); ?>">
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
                                <input type="text" class="form-control form-control-user" id="pekerjaan" name='pekerjaan' placeholder="Pekerjaan" value="<?= set_value('pekerjaan'); ?>">
                                <small class="text-danger"><?= form_error('pekerjaan'); ?></small>
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
                            <div class="form-group row mt-3">
                                <label class="col-md-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= set_value('jenis_kelamin'); ?>">
                                        <option selected="0">Select..</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <small class="text-danger"><?= form_error('jenis_kelamin'); ?></small>
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
                                Register Account
                            </button>


                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url(); ?>auth/loginm">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
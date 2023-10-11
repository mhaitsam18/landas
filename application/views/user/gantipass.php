<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col-md-6">
            <a href="<?= base_url('user/dashboardbu') ?>" class="btn btn-primary btn-circle">
                <i class="fas fa-chevron-left"></i>
            </a>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Change Password
                </div>
                <div class="card-body">
                    <?= ($this->session->flashdata('flash')); ?>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="POST">

                        <div class="form-group">
                            <label for="ckatasandi">Current Password</label>
                            <input type="password" class="form-control" id="ckatasandi" name="ckatasandi" value="">
                        </div>
                        <div class="form-group">
                            <label for="nkatasandi1">New Password</label>
                            <input type="password" class="form-control" id="nkatasandi1" name="nkatasandi1" value="">
                        </div>

                        <div class="form-group mb-3">
                            <label for="nkatasandi2">Confirm Password</label>
                            <input type="password" class="form-control" id="nkatasandi2" name="nkatasandi2" value="">
                        </div>

                        <button type="submit" class="btn btn-primary float-end">Ubah Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
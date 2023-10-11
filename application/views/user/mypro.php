<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Content Row -->
    <div class="row mt-3 mb-3">
        <div class="col-md-6">
            <a href="<?= base_url('user/dashboardbu') ?>" class="btn btn-primary btn-circle">
                <i class="fas fa-chevron-left"></i>
            </a>
        </div>
    </div>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                    <a href="<?= base_url('auth/editpro3') ?>" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                </div>
                <!-- Card Body -->
                <div class="card">
                    <?= ($this->session->flashdata('flash')); ?>
                    <div class="card-body">
                        <h5 class="card-title"><strong><?= $user['nama']; ?></strong></h5>
                        <small class="card-subtitle mb-2 text-muted">Email :</>
                        </small>
                        <p class="card-text"><?= $user['email']; ?></p>
                        <small class="card-subtitle mb-2 text-muted">Photo Profile :</>
                        </small>
                        <p class="card-text"><img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" height="150"></p>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- End of Main Content -->
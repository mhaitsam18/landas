<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                </div>

                                <?= ($this->session->flashdata('flash')); ?>

                                <form class="user" method="post" action="<?= base_url('auth/loginr'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                        <small class="text-danger"><?= form_error('email'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="katasandi" name="katasandi" placeholder="Password">
                                        <small class="text-danger"><?= form_error('katasandi'); ?></small>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
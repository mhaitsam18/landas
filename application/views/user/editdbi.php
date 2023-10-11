<div class="container">

    <div class="row mt-3 mb-3">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Edit Announcements
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <small><label for="isidbi">Isi Announcements</label></small>
                            <input type="text" class="form-control form-control-user" id="isidbi" name='isidbi' value="<?= $dbi['isidbi']; ?>">
                            <small class="text-danger"><?= form_error('isidbi'); ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary float-end">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
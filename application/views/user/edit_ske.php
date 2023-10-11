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
                            <small><label for="syarat_ske">Syarat Surat Keterangan</label></small>
                            <input type="text" class="form-control form-control-user" id="syarat_ske" name='syarat_ske' value="<?= $dbi['syarat_ske']; ?>">
                            <small class="text-danger"><?= form_error('syarat_ske'); ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary float-end">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
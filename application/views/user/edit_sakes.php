<div class="container">

    <div class="row mt-3 mb-3">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Edit Rekap Penduduk berdasarkan Pekerjaan
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <small><label for="sarana_k">Sarana</label></small>
                            <input type="text" class="form-control form-control-user" id="sarana_k" name='sarana_k' value="<?= $dbi['sarana_k']; ?>">
                            <small class="text-danger"><?= form_error('sarana_k'); ?></small>
                        </div>
                        <div class="form-group">
                            <small><label for="jumlah_sk">Jumlah</label></small>
                            <input type="text" class="form-control form-control-user" id="jumlah_sk" name='jumlah_sk' value="<?= $dbi['jumlah_sk']; ?>">
                            <small class="text-danger"><?= form_error('jumlah_sk'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
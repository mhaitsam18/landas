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
                            <small><label for="sarana_p">Sarana</label></small>
                            <input type="text" class="form-control form-control-user" id="sarana_p" name='sarana_p' value="<?= $dbi['sarana_p']; ?>">
                            <small class="text-danger"><?= form_error('sarana_p'); ?></small>
                        </div>
                        <div class="form-group">
                            <small><label for="jumlah_sp">Jumlah</label></small>
                            <input type="text" class="form-control form-control-user" id="jumlah_sp" name='jumlah_sp' value="<?= $dbi['jumlah_sp']; ?>">
                            <small class="text-danger"><?= form_error('jumlah_sp'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
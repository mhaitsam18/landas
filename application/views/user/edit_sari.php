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
                            <small><label for="sarana_ri">Sarama</label></small>
                            <input type="text" class="form-control form-control-user" id="sarana_ri" name='sarana_ri' value="<?= $dbi['sarana_ri']; ?>">
                            <small class="text-danger"><?= form_error('sarana_ri'); ?></small>
                        </div>
                        <div class="form-group">
                            <small><label for="jumlah_ri">Jumlah</label></small>
                            <input type="text" class="form-control form-control-user" id="jumlah_ri" name='jumlah_ri' value="<?= $dbi['jumlah_ri']; ?>">
                            <small class="text-danger"><?= form_error('jumlah_ri'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
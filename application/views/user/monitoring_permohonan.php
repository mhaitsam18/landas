    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Begin Page Content -->

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Monitoring</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Accounts</h6>
            </div>
            <div class="card-body">
                <?= ($this->session->flashdata('flash')); ?>
                <div class="row mb-4">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Resi</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Email</th>
                                <th>Tanggal Input</th>
                                <th>Jenis Surat</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>File Persyaratan</th>
                                <th>Surat Untuk Ditandatangani</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php if ($user) : ?>


                            <?php $no = 1; ?>
                            <?php foreach ($hasil as $u) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $u['resi']; ?></td>
                                    <td><?php echo $u['nama']; ?></td>
                                    <td><?php echo $u['nik']; ?></td>
                                    <td><?php echo $u['alamat']; ?></td>
                                    <td><?php echo $u['nohp']; ?></td>
                                    <td><?php echo $u['email']; ?></td>
                                    <td><?php echo $u['tanggalinput']; ?></td>
                                    <td><?php echo $u['nama_surat']; ?></td>

                                    <td>

                                        <?php if ($u['status'] == "1") : ?>

                                            <span class="badge badge-info">Menunggu pengecekan <br> dari bagian umum</span>

                                        <?php elseif ($u['status'] == "2") : ?>
                                            <span class="badge badge-warning">Pengecekan Selesai, <br>Menunggu Penyetujuan Dari Lurah</span>

                                        <?php elseif ($u['status'] == "3") : ?>
                                            <?php if ($u['setuju'] == 1) { ?>
                                                <span class="badge badge-success">Proses Selesai, <br>Surat dapat di download</span>
                                            <?php } else { ?>
                                                <span class="badge badge-danger">Penandatanganan ditolak, <br>Silahkan lakukan permohonan ulang</span>
                                            <?php } ?>

                                        <?php endif ?>
                                    </td>

                                    <td>
                                        <?php if ($u['status'] == 3 && $u['setuju'] == 0) { ?>
                                            <span style="color:red">Alasan penolakan : <?= $u['keterangan'] ?></span>
                                        <?php } ?>
                                    </td>

                                    <td>

                                        <a href="<?= base_url('assets/file_upload_surat/' . $u['file_upload']) ?>" target="blank_" class="btn btn-primary mt-2">Download All File</a>

                                        <?php if ($u['status'] == 4) : ?>

                                            <a href="<?= base_url('user/downloadsurat/' . $u['id']) ?>" target="blank_" class="btn btn-info mt-2">Download Surat</a>

                                        <?php endif ?>

                                    </td>

                                    <td>
                                        <a href="<?= base_url('user/downloadsurat/' . $u['id']) ?>" target="blank_" class="btn btn-info mt-2">Download Surat</a>
                                    </td>

                                    <td>
                                        <?php if ($u['status'] == 2) { ?>
                                            <a href="<?= base_url(); ?>user/proses_tolak/<?= $u['id']; ?>" class="btn btn-danger btn-sm">
                                                Tolak
                                            </a> <br>
                                            <a href="<?= base_url(); ?>user/upload_surat_selesai/<?= $u['id']; ?>" class="btn btn-success btn-sm mt-2">
                                                Terima
                                            </a>

                                        <?php } ?>
                                        <?php if (!$u['tanda_tangan']) : ?>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm mt-2 btn-ttd" data-toggle="modal" data-target="#ttdModal" data-id="<?= $u['id'] ?>">
                                                Tanda Tangan
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Modal -->
    <div class="modal fade" id="ttdModal" tabindex="-1" aria-labelledby="ttdModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ttdModalLabel">Tanda Tangan Digital</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('user/proses_ttd') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="signature-pad" id="signature-pad">
                            <div style="border:solid 1px teal; width:360px;height:110px;padding:3px;position:relative;">
                                <div class="note" id="note" onmouseover="my_function();">The signature should be inside box</div>
                                <canvas id="the_canvas" width="350px" height="100px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="signature" name="signature">
                        <button type="button" id="clear_btn" class="btn btn-danger clear" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" id="save_btn" class="btn btn-primary save" data-action="save-png"><span class="glyphicon glyphicon-ok"></span> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(".btn-ttd").on('click', function() {
            const id = $(this).data('id');
            $("#id").val(id);
        });
        // var wrapper = document.getElementById("signature-pad");
        var wrapper = document.getElementById("signature-pad");
        var clearButton = wrapper.querySelector("[data-action=clear]");
        var savePNGButton = wrapper.querySelector("[data-action=save-png]");
        var canvas = wrapper.querySelector("canvas");
        var el_note = document.getElementById("note");
        var signaturePad;
        signaturePad = new SignaturePad(canvas);
        // clearButton.addEventListener("click", function(event) {
        //     document.getElementById("note").innerHTML = "The signature should be inside box";
        //     signaturePad.clear();
        // });
        $('.clear').on("click", function() {
            document.getElementById("note").innerHTML = "The signature should be inside box";
            signaturePad.clear();
        });
        $(".save").on("click", function() {
            if (signaturePad.isEmpty()) {
                alert("Please provide signature first.");
                event.preventDefault();
            } else {
                var canvas = document.getElementById("the_canvas");
                var dataUrl = canvas.toDataURL();
                document.getElementById("signature").value = dataUrl;
            }
        });

        function my_function() {
            document.getElementById("note").innerHTML = "";
        }
    </script>
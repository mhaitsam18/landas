    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div>
            <br><br><br>

        </div>
        <center>
            <table border="0" width="650">
                <tr>
                    <td><img src="https://upload.wikimedia.org/wikipedia/commons/2/2b/Dairi_Regency_Emblem.png" alt="" width="90" height="90"></td>
                    <td>
                        <center>
                            <font size="4">KECAMATAN SIDIKALANG</font><br>
                            <font size="5"><b>KELURAHAN KUTA GAMBIR</b></font><br>
                            <font size="2"><b>Jl. Batu Kapur Bawah Sidikalang</b></font>
                        </center>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <font size="2"><b>Kode Pos 22251</b></font><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <hr><br>
                    </td>
                </tr>
            </table>


            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">
                    <center><b>Data Sarana Pendidikan</b></center>
                </h1><br>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sarana</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($query as $u) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $u['sarana_p']; ?></td>
                            <td><?php echo $u['jumlah_sp']; ?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <script>
        window.print();
    </script>
    </body>

    </html>
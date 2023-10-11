 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

</div>


<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl col-lg">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Announcements</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php foreach ($query as $u) : ?>
                        <li class="list-group-item">
                            
                            <?= $u['isidbi'] ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </div>


</div>

<!-- Content Row -->
<div class="row">

    <div class="col-lg mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Surat</h6>
            </div>
            <div class="card-body">

            <?= ($this->session->flashdata('flash')); ?>
                <p>Berikut adalah persyaratan dalam penginputan permohonan surat oleh masyarakat.</p>
                <p><button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Syarat
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        1. Fotocopy Kartu Keluarga <br>
                        2. Fotocopy KTP <br>
                        3. Fotocopy Akta Kelahiran
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
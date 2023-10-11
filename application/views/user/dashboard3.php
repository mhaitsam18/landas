 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

     </div>


     <!-- Content Row -->
    <?php if($tipe == 'Lurah'){?>
     <div class="row">
        <div class="col-md-6">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Jumlah Permohonan Surat</h6>

                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <h1>
                        <?php echo $surat_masuk; ?>
                        <span style="font-size:20px !important">Surat</span>
                     </h1>

                     <table>
                     <?php foreach($jenis_surat as $js){?>
                        <tr>
                            <td style="padding:5px"><b><?= $js['nama_surat']?></b></td>
                            <td style="padding:5px">:</td>
                            <td style="padding:5px"><?= $js['count_masuk']?> surat</td>
                        </tr>
                    <?php }?>
                     </table>

                 </div>
             </div>
         </div>
         <div class="col-md-6">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Total Surat Keluar</h6>

                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <h1>
                        <?php echo $surat_keluar; ?>
                        <span style="font-size:20px !important">Surat</span>
                     </h1>

                     <table>
                     <?php foreach($jenis_surat as $js){?>
                        <tr>
                            <td style="padding:5px"><b><?= $js['nama_surat']?></b></td>
                            <td style="padding:5px">:</td>
                            <td style="padding:5px"><?= $js['count_keluar']?> surat</td>
                        </tr>
                    <?php }?>
                     </table>

                 </div>
             </div>
         </div>
     </div>
     
        <?php }?>

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
                         <?php foreach ($query as $u): ?>
                         <li class="list-group-item">

                             <?=$u['isidbi']?>
                         </li>
                         <?php endforeach;?>
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

                     <p>Berikut adalah persyaratan dalam penginputan permohonan surat oleh masyarakat.</p>
                     <p>
                         <a href="<?=base_url('user\syarats');?>">
                             <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseExample" aria-expanded="false"
                                 aria-controls="collapseExample">
                                 Syarat
                             </button>
                         </a>

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
 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Permohonan Surat</h1>

     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl col-lg">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Surat Permohonan</h6>

                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <div class="card-body">
                         <?=($this->session->flashdata('flash'));?>
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
                                         <th>Tanggal Input</th>
                                         <th>Jenis Surat</th>
                                         <th>File</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>


                                 <?php $no = 1;?>
                                 <?php foreach ($hasil as $u) {?>
                                 <tr>
                                     <td><?php echo $no++ ?></td>
                                     <td><?php echo $u['resi']; ?></td>
                                     <td><?php echo $u['nama']; ?></td>
                                     <td><?php echo $u['nik']; ?></td>
                                     <td><?php echo $u['alamat']; ?></td>
                                     <td><?php echo $u['nohp']; ?></td>
                                     <td><?php echo $u['tanggalinput']; ?></td>
                                     <td><?php echo $u['nama_surat']; ?></td>

                                     <td>

                                         <a href="<?=base_url('assets/file_upload_surat/' . $u['file_upload'])?>"
                                             target="blank_" class="btn btn-primary mt-2">Download All File</a>

                                     </td>

                                     <td>

                                         <!-- <button type="button" class="btn btn-primary mt-2" data-toggle="modal"
                                             data-target="#exampleModal" id="kirim-surat"
                                             data-idpengajuan="<?=$u['id']?>">
                                             Kirim Surat
                                         </button> -->
                                        
                                         <form action="<?=base_url('user/setujui/' . $u['id'])?>" method="POST">
                                            <button type="submit" class="btn btn-success mt-2">Terima</button>
                                         </form>
                                         <form action="<?=base_url('user/tolak/' . $u['id'])?>" method="POST">
                                            <button type="submit" class="btn btn-danger mt-2">Tolak</button>
                                         </form>


                                     </td>
                                 </tr>
                                 <?php }?>

                                 </tbody>
                             </table>
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

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Kirim Surat</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">

                 <form action="<?=base_url('user/kirim_surat')?>" method="POST" enctype="multipart/form-data">

                     <input type="hidden" name="idpengajuan" id="idpengajuan">

                     <div class="input-group mb-3">

                         <div class="custom-file">
                             <input type="file" class="custom-file-input" id="inputGroupFile01"
                                 aria-describedby="inputGroupFileAddon01" name="kirim_surat">
                             <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                         </div>
                     </div>

                     <button type="submit" class="btn btn-primary">Kirim Surat</button>

                 </form>

             </div>

         </div>
     </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
     crossorigin="anonymous"></script>

 <script>
$(document).on("click", "#kirim-surat", function() {
    var idpengajuan = $(this).data('idpengajuan');
    $(".modal-body #idpengajuan").val(idpengajuan);
    // As pointed out in comments,
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});
 </script>
<center>
    <b>BUKTI PENGAJUAN PERMOHONAN<br><span style="text-transform: uppercase"><?php echo $surat['nama_surat']?></span></center></b>
<br>
<br>
<center style="border:1px solid #000; padding:10px; font-size:30px; "><?php echo $surat['resi']?></center>
<br>
<br>
<table class="tabel-pemohon" border="0">
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $surat['nama'];?></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo $surat['nik'];?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $surat['alamat'];?></td>
    </tr>
</table>


<style>
    .tabel{
        width: 100%;
    }
    
    .tabel tr td{
        border: 1px solid #000;
    }

    .tabel-pemohon tr td{
        padding:10px !important
    }
</style>
<!DOCTYPE html>

<head>
    <title>Surat Keterangan Berusaha</title>
    <style>
        table tr td {
            font-size: 13px;
        }
    </style>
</head>

<body>
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

        <table border="0" width="650">
            <tr>
                <td colspan="4">
                    <center><u><b>SURAT KETERANGAN BERUSAHA</b></u><br>
                        NOMOR : <?= $surat['nomor']; ?></center>
                </td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Yang bertanda tangan dibawah ini </td>
                <td width="3">:</td>
                <td width="315"></td>
            </tr>
            <tr>
                <td></td>
                <td>NAMA</td>
                <td>:</td>
                <td>APRIL UJUNG</td>
            </tr>
            <tr>
                <td></td>
                <td>JABATAN</td>
                <td>:</td>
                <td>LURAH</td>
            </tr>
            <tr>
                <td colspan="4"> </td>
            </tr>
            <tr>
                <td></td>
                <td>Dengan ini menerangkan bahwa</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Nama</td>
                <td>:</td>
                <td><?= $surat['nama']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Tempat/Tgl. Lahir</td>
                <td>:</td>
                <td><?= $surat['ttl']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $surat['jenisk']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Agama</td>
                <td>:</td>
                <td><?= $surat['agama']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Status</td>
                <td>:</td>
                <td><?= $surat['status']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?= $surat['pekerjaan']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Pemegang KTP No./NIK</td>
                <td>:</td>
                <td><?= $surat['nik']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $surat['alamat']; ?></td>
            </tr>
            <tr>
                <td colspan="4"></td>
            </tr>
            <tr>
                <td>2.</td>
                <td colspan="3">Menurut pengakuan yang bersangkutan, dianya benar benar menjalankan:</td>
            </tr>
            <tr>
                <td></td>
                <td>Usaha pokok</td>
                <td>:</td>
                <td>
                    <!-- <?= $surat['nama_up']; ?> -->
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Usaha tambahan</td>
                <td>:</td>
                <td>
                    <!-- <?= $surat['nama_ut']; ?> -->
                </td>
            </tr>
            <tr>
                <td colspan="4"> </td>
            </tr>
            <tr>
                <td></td>
                <td>Tempat dijalankan usaha</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Usaha pokok</td>
                <td>:</td>
                <td>
                    <!-- <?= $surat['tp_up']; ?> -->
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Usaha tambahan</td>
                <td>:</td>
                <td>
                    <!-- <?= $surat['tp_ut']; ?> -->
                </td>
            </tr>
            <tr>
                <td>3.</td>
                <td colspan="3">Demikian Surat Keterangan ini diperbuat dan diberikan kepada
                    yang bersangkutan untuk dapat dipergunakan seperlunya.
                </td>
            </tr>

        </table>
        <table border="0" width="650">
            <tr>
                <td></td>
                <td></td>
                <td width="160"><br>Dikeluarkan di : Kuta Gambir <br>
                    Pada Tanggal : <?= $surat['tanggal']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <br><b>LURAH</b>
                    <br>
                    <?php if ($surat['tanda_tangan']) : ?>
                        <img src="<?= base_url('assets/img/tanda-tangan/' . $surat['tanda_tangan']) ?>" style="width: 200px;" alt="">
                    <?php else : ?>
                        <br><br>
                    <?php endif; ?>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><br><b> APRIL UJUNG <br>
                        <hr width="160">
                        NIP. 196504251986021001
                    </b> </td>
            </tr>
        </table>

    </center>
    <script>
        window.print();
    </script>
</body>
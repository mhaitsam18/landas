<!DOCTYPE html>

<head>
    <title>Surat Keterangan</title>
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
                    <center><u><b>SURAT KETERANGAN</b></u><br>
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
                <td colspan="3">Nama tersebut diatas adalah benar surat Kelurahan Kuta Gambir,
                    Kecamatan Sidikalang Kabupaten Dairi, dan sepanjang pengetahuan kami selama
                    bertempat tinggal pada alamat tersebut dianya <b>BERKELAKUAN BAIK</b>.</td>
            </tr>
            <tr>
                <td>3.</td>
                <td colspan="3">Bermaksud untuk mengurus Surat Keterangan Berkelakuan Baik(SKBB)/
                    Surat Keterangan Catatan Kepolisian(SKCK) dari Kantor Polres Dairi, berhubung
                    maksud yang bersangkutan, diminta agar pihak terkait dapat memberikan bantuan dan
                    fasilitas seperlunya.
                </td>
            </tr>
            <tr>
                <td>4.</td>
                <td colspan="3">Surat Keterangan ini berlaku selama 3 (Tiga) Bulan terhitung sejak
                    Tanggal Surat ini dikeluarkan.
                </td>
            </tr>
            <tr>
                <td>5.</td>
                <td colspan="3">Demikian Surat Keterangan ini diperbuat dengan sebenarnya atas perhatian
                    yang bersangkutan untuk dapat dipergunakan seperlunya.
                </td>
            </tr>
            <tr>
                <td colspan="4"></td>
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
                <td><br><b>LURAH</b> <br><br><br><br></td>
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
</body>
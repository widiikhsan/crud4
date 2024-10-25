<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist//css/bootstrap.min.css">
</head>
<title>
    Widi Ikhsan</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
           <span class="navbar-brand mb-0 h1"WIDI IKHSAN</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DAFTAR PESERTA LATIHAN</center></h4>
<?php

    include "Koneksi.php";

    //Cek apakah ada kiriman from dari method post
    if (isset($_GET['id_peserta'])){
    $id_peserta=htmlspecialchars($_GET["id_peserta"]);
    $hasil=mysql_query("$kon,$sql");

    //Kondosi apakah berhasil atau tidak
         if($hasil) {
            header("Location:index.php");
         }
         else {
            echo "<div class='alert-danger'> Data Gagal dihapus.</div>";

         }
            
     }
?>


    <tr class="table-danger">
        <br>
    <thead>
    <tr>
    <thead class="my-3 table table-bordered">
        <tr class="table-primary">
            <th>No</th>
            <th>Nama</th>
            <th>sekolah</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th colspan="2">Aksi</th>
        </tr>
        </thead>

        <?php
        include "Koneksi.php";
        $sql="select * from peserta order by id_peserta desc";

        $hasil-mysql_fetch_array($kon,$sql);
        $no-0;
        while ($data = mysql_fetct_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["sekolah"]; ?></td>
                <td><?php echo $data["jurusan"]; ?></td>
                <td><?php echo $data["no_hp"]; ?></td>
                <td><?php echo $data["alamat"]; ?></td>
                <td>
                    <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']);  ?>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_peserta=<?php echo"
            </td>
            </tdbody>
            <?php
        }
        ?>
        </tabel>
        <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
        </div>
        </body>
        </html>



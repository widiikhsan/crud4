<!DOCTYPE html>
<html>
<head>
    <title>from Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist//css/bootstrap.min.css" integrity="sha384-zCbKRUGaJ">
</head>
<body>
<div class="countainer">
    <?php

    //Include file koneksi, untuk koneksikan kedatabase
    Include "koneksi.php";
    
    //fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlsepecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $sekolah=input($_POST["sekolah"]);
        $jurusan=input($_POST["jurusan"]);
        $no_hp=input($_POST["no_hp"]);
        $alamat=input($_POST["alamat"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into peserta (nama,sekolah,jurusan,no_hp,alamat) values
        ('$nama','$sekolah','$jurusan'',$no_hp,'$alamat')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysql_query($kon,$sql);

        //kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }
    }
        ?>
        <<h2>Input Data</h2>
     
        
        < action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="from-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="from-control" placeholder="Masukan Nama" required />

            </div>
            <div class="from-group">
                <label>Sekolah:</label>
                <input type="text" name="sekolah" class="from-control" placeholder="Masukan Nama Sekolah"required />
                
            </div>
            <div class="from-group">
                <label>Jurusan:</label>
                <input type="text" name="jurusan" class="from-control" placeholder="Masukan Jurusan"required />
            </div>
                   </p>
            <div class="from-group">
                <label>No HP:</label>
                <input type="text" name="no_hp" class="from-control" placeholder="Masukan No HP"required />
            </div>
            <div class="from-group">
                <label>alamat:</label>
                <textarea name="alamat" class="from-control" placeholder="Masukan Alamat"required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">submit</button>
    </from>
</div>
</body>
</html>
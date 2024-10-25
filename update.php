<!DOCTYPE html>
<html>
<head>
    <title>from Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist//css/bootstrap.min.css" integrity="sha384-zCbKRUGaJ">
</head>
<body>
<div class="countainer">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    Include "koneksi.php";

    //fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
    if (issert($_GET['id_peserta'])) {
        $id_peserta=input($_GET["id_peserta"]);

        $sql="select * from peserta where id_peserta-$id_peserta";
        $hasil=mysql_query($kon,$sql);
        $data = mysql_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman from dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_peserta=htmlspecialchars($_POST["id_peserta"]);
        $nama=input($_POST["nama"]);
        $sekolah=input($_POST["sekolah"]);
        $jurusan=input($_POST["jurusan"]);
        $no_hp=input($_POST["no_hp"]);
        $alamat=input($_POST["alamat"]);

    //Query update data menjalankan query diatas
    $sql="update peserta set
        nama='$nama',
        sekolah='$sekolah',
        jurusan=$jurusan',
        no_hp='$no_hp',
        alamat='$alamat',
        where id_peserta=$id_peserta";
        

    //mengeksekusi atau menjalankan query diatas
    $hasil=mysql_query($kon,$sql);
    
    //kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
    if ($hasil) {
        header("location:index.php")
    }
    else {
        echo "<div class='alert alert-dengar'> Data Gagal disimpan.</div>";

    }


}
?>
<<h2>Update Data</h2>


<from action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" mothod-"post">
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

            <input type="hidden" name="id_peserta" value="<?php echo $data['id_peserta']; ?>" />
            
            <<button type="submit" name="submmit" class=btn btn-primary">Submit</button>
    </from>
</div>
</body>
</html>

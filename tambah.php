<?php 
    include "koneksi.php";

    if (isset($_POST["btnsimpan"])) {
        $nokartu = $_POST["nokartu"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];

        $simpan = mysqli_query($conn,"INSERT INTO karyawan(nokartu, nama, alamat) values ('$nokartu','$nama','$alamat')");

        if($simpan){
            echo "<script>
                        alert('Data Sudah Tersimpan');   
                        location.replace('datakaryawan.php'); 
                </script>";
        } else {
            echo "<script>
                        alert('Data Tidak Tersimpan');   
                        location.replace('datakaryawan.php'); 
                </script>";
        }
    }
    //mengkosongkan tmprfid
    mysqli_query($conn, "delete from tmprfid");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include "header.php";
    ?>
    <title>Menu Utama</title>
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#norfid").load('nokartu.php')
            }, 0); // pembacaan file nokartu.php, tiap 1 detik = 1000
        })
    </script>
</head>
<body>
    <?php include "menu.php"; ?>
        <h3>Tambah Data Karyawan</h3>

        <form method="POST">
        
            <div id="norfid">

            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Nama Karyawan" class="form-control" style="width : 400px;">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Alamat Kayawan" class="form-control" style="width : 400px;">
            </div>

            <button class="btn btn-primary" name="btnsimpan" id="btnsimpan">SIMPAN</button>
        </form>
    
    <?php include "footer.php"; ?>
</body>
</html>


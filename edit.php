<?php 
    include "koneksi.php";

    $id = $_GET['id'];

    $cari = mysqli_query($conn,"select * from karyawan where id ='$id'");
    $hasil = mysqli_fetch_array($cari);

    if (isset($_POST["btnsimpan"])) {
        $nokartu = $_POST["nokartu"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];

        $simpan = mysqli_query($conn,"INSERT INTO karyawan(nokartu, nama, alamat) values ('$nokartu','$nama','$alamat')");

        if($simpan){
            echo "<script>
                        alert('Data Sudah Tersimpan');   
                        location.replace('datakaryawan.php); 
                </script>";
        } else {
            echo "<script>
                        alert('Data Tidak Tersimpan');   
                        location.replace('datakaryawan.php); 
                </script>";
        }
    }
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
</head>
<body>
    <?php include "menu.php"; ?>
        <h3>Tambah Data Karyawan</h3>

        <form method="POST">
            <div class="form-group">
                <label>No.Kartu</label>
                <input type="text" name="nokartu" placeholder="Nomor Kartu RFID" class="form-control" style="width : 200px;" value="<?php echo $hasil['nokartu']; ?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Nama Karyawan" class="form-control" style="width : 400px;" value="<?php echo $hasil['nama'];?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Alamat Kayawan" class="form-control" style="width : 400px;" value="<?php echo $hasil['alamat'];?>">
            </div>

            <button class="btn btn-primary" name="btnsimpan" id="btnsimpan">SIMPAN</button>
        </form>
    
    <?php include "footer.php"; ?>
</body>
</html>


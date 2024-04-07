<?php
    include "koneksi.php";

    //baca nomor kartu
    $nokartu =$_GET['nokartu'];
    //mengkosongkan tabel tmprfid
    mysqli_query($conn,"Delete from tmprfid");

    //simpan nomor kartu
    $simpan = mysqli_query($conn, "insert into tmprfid values ('$nokartu')");
    if($simpan){
        echo "Data Masuk";
    } else {
        echo "Gagal";
    }
?>
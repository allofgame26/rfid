<?php
    include "koneksi.php";

    $mode = mysqli_query($conn,"select * from status");
    $data_mode= mysqli_fetch_array($mode);
    $mode_absen = $data_mode['status'];

    //ststus terakhir kemudian ditambah 1
    $mode_absen = $mode_absen +1;
    if($mode_absen > 4){
        $mode_absen = 1;
    }

    // simpan mode absen / update
    $simpan = mysqli_query($conn, "update status set status='$mode_absen'");
    if($simpan){
        echo "Berhasil";
    } else {
        echo "Tidak berhasil";
    }
?>
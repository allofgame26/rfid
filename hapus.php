<?php
    include "koneksi.php";

    $id = $_GET['id'];

    $hapus = mysqli_query($conn,"delete from karyawan where id ='$id'");

    if($hapus){
        echo "<script>
                    alert('Data Sudah Terhapus');   
                    location.replace('datakaryawan.php'); 
            </script>";
    } else {
        echo "<script>
                    alert('Data Tidak Terhapus');   
                    location.replace('datakaryawan.php'); 
            </script>";
    }
    
?>
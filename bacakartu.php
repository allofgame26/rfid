<?php 
error_reporting(E_ERROR | E_PARSE);
    include "koneksi.php";

    $sql = mysqli_query($conn, "select * from status");
    $data = mysqli_fetch_array($sql);
    $mode_absen = $data['status'];

    $mode = "";
     if($mode_absen==1){
        $mode = "Masuk";
     } elseif($mode_absen==2){
        $mode = "Kembali";
     } elseif($mode_absen==3){
        $mode = "Istirahat";
     } elseif($mode_absen==4){
        $mode = "Pulang";
     }

     $baca_kartu = mysqli_query($conn, "select * from tmprfid");
     $data_kartu = mysqli_fetch_array($baca_kartu);
     $nokartu = $data_kartu['nokartu'];

?>
<div class="container- container-fluid" style="text-align: center;">
<?php if($nokartu==""){ ?>

    <h3> Absen : <?php echo $mode; ?></h3>
    <h3>Silahkan tempelkan Kartu Karyawan Anda</h3>
    <img src="images/rfid.png" style="width :  200px;"> <br>
    <img src="images/animasi2.gif">

<?php } else {
    //cari karyawan
    $cari_karyawan = mysqli_query($conn, "select * from karyawan where nokartu = '$nokartu'");
    $jumlahdata = mysqli_num_rows($cari_karyawan);

    if($jumlahdata == 0){
        echo "<h1> Kartu Tidak Dikenali, Laporkan kepada Administrasi</h1>";    
    } else {
        //ambil nama karyawan
        $nama_karyawan = mysqli_fetch_array($cari_karyawan);
        $nama = $nama_karyawan['nama'];

        //membaca tanggal dan hari
        date_default_timezone_set('ASIA/Jakarta');
        $tanggal = date('Y-m-d');
        $jam = date('H:i:s');

        //pengecekan data absensi sesuai tanggal
        $cari_absen = mysqli_query($conn, "select * from absensi where nokartu = '$nokartu' and tanggal='$tanggal'");
        $jumlah_absen = mysqli_num_rows($cari_absen);
        if($jumlah_absen == 0){
            echo "<h1>Selamat Datang <br> $nama </h1>";
            mysqli_query($conn, "insert into absensi (nokartu,tanggal,masuk) values ('$nokartu', '$tanggal','$jam')");
        } else {
            //update data absen jika double
            if($mode_absen == 2){
                echo "<h1>Selamat Kembali</h1>";
                mysqli_query($conn, "update absensi set kembali='$jam' where nokartu ='$nokartu' and tanggal='$tanggal'");
            } elseif ($mode_absen == 3){
                echo "<h1>Selamat Istirahat</h1>";
                mysqli_query($conn, "update absensi set istirahat='$jam' where nokartu ='$nokartu' and tanggal='$tanggal'");
            } elseif ($mode_absen == 4){
                echo "<h1>Selamat Jalan dan Hati - Hati dijalan</h1>";
                mysqli_query($conn, "update absensi set pulang='$jam' where nokartu ='$nokartu' and tanggal='$tanggal'");
            }
        }
    }
    // kosongkan tabel tmprfid
    mysqli_query($conn, "delete from tmprfid");
}  ?>
</div>
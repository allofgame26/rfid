<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include ("header.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "menu.php" ?>

    <div class = "cotainer-fluid">
        <h3>Rekap Absensi</h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: blue; color:azure;">
                    <th style="width: 10px; text-align: center;">No.</th>
                    <th style="text-align:center;"> Nama </th>
                    <th style="text-align:center;"> Tanggal </th>
                    <th style="text-align:center;"> Jam Masuk </th>
                    <th style="text-align:center;"> Jam Kembali </th>
                    <th style="text-align:center;"> Jam Istirahat </th>
                    <th style="text-align:center;"> Jam Keluar </th>
                </tr>
            </thead>
            <tbody>
            <?php 
                    include "koneksi.php";

                    date_default_timezone_set("Asia/Jakarta");
                    $tanggal = date('Y-m-d');

                    $sql = mysqli_query($conn, "Select b.nama, a.tanggal,a.masuk,a.kembali,a.istirahat,a.pulang from absensi a, karyawan b where a.nokartu=b.nokartu AND a.tanggal = '$tanggal'");
                    $no = 0;
                    while ($row = mysqli_fetch_array($sql)) {
            ?>
                <tr>
                    <td><?php echo $no+1;?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['tanggal'];?></td>
                    <td><?php echo $row['masuk'];?></td>
                    <td><?php echo $row['kembali'];?></td>
                    <td><?php echo $row['istirahat'];?></td>
                    <td><?php echo $row['pulang'];?></td>
                </tr>
                <?php
                    $no++;}
                ?>
            </tbody>
        </table>
    </div>
    <?php include "footer.php" ?> 
</body>
</html>
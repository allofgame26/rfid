<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Document</title>
</head>
<body>
    <?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>
            Data Karyawan
        </h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: blue; color : white">
                    <th style="width: 10px; text-align: center;">No.</th>
                    <th style="width: 200px; text-align: center;">No.Kartu</th>
                    <th style="width: 400px; text-align: center;">Nama</th>
                    <th style="text-align: center;">Alamat</th>
                    <th style="width: 10px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include "koneksi.php";

                    $sql = mysqli_query($conn, "Select * from karyawan");
                    $no = 0;
                    while ($row = mysqli_fetch_array($sql)) {
                ?>
                <tr>
                    <td> <?php echo $no+1;?></td>
                    <td> <?php echo $row['nokartu'];?></td>
                    <td> <?php echo $row['nama'];?></td>
                    <td> <?php echo $row['alamat'];?></td>
                    <td> 
                        <a href="edit.php?id=<?php echo $row['id'];?>">EDIT</a>
                        <a href="hapus.php?id=<?php echo $row['id'];?>">HAPUS</a>
                    </td>
                </tr>
                <?php
                    $no++;}
                ?>
            </tbody>
        </table>
        <a href="tambah.php"><button class="btn btn-primary">Tambah Data</button>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>
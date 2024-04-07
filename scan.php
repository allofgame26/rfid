<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "header.php";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan Kartu</title>
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#cekkartu").load('bacakartu.php');
            },2000);
        })
    </script>
</head>
<body>
    <?php include "menu.php" ?>

    <!-- ISI -->
    <div class="container-fluid" style="padding-top: 10%;">
        <div id="cekkartu">

        </div>
    </div>
    <br>
    

    <?php include "footer.php" ?>
</body>
</html>
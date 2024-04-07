<?php
error_reporting(E_ERROR | E_PARSE);
    include "koneksi.php";

    $sql = mysqli_query($conn,"Select * from tmprfid");
    $data = mysqli_fetch_array($sql);

    $nokartu = $data['nokartu'];
?>
<div class="form-group">
    <label>No.Kartu</label>
    <input type="text" name="nokartu" placeholder="Tempelkan No Kartu" class="form-control" style="width : 200px;"value="<?php echo $nokartu; ?>">
</div>
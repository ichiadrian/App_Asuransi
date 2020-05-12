<?php
    $bulan = isset($_POST['bulan']) ? $_POST['bulan'] : date('n');
    $tahunparam = isset($_POST['tahun']) ? $_POST['tahun'] : date('Y');
?>

<div class="col-3 px-3">

    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status">
            <option value="1" <?php if ($param['status'] == 1) echo "selected"; ?>>Pending</option>
            <option value="2" <?php if ($param['status'] == 2) echo "selected"; ?>>Approved</option>
            <option value="3" <?php if ($param['status'] == 3) echo "selected"; ?>>Rejected</option>
        </select>
    </div>
</div>

<div class="col-3 px-3">
    <div class="form-group">
        <label for="bulan">Bulan</label>
        <select name="bulan" id="bulan" class="form-control">
            <option value="1" <?php if ($bulan == 1) echo "selected"; ?>>Januari</option>
            <option value="2" <?php if ($bulan == 2) echo "selected"; ?>>Febuari</option>
            <option value="3" <?php if ($bulan == 3) echo "selected"; ?>>Maret</option>
            <option value="4" <?php if ($bulan == 4) echo "selected"; ?>>April</option>
            <option value="5" <?php if ($bulan == 5) echo "selected"; ?>>Mei</option>
            <option value="6" <?php if ($bulan == 6) echo "selected"; ?>>Juni</option>
            <option value="7" <?php if ($bulan == 7) echo "selected"; ?>>Juli</option>
            <option value="8" <?php if ($bulan == 8) echo "selected"; ?>>Agustus</option>
            <option value="9" <?php if ($bulan == 9) echo "selected"; ?>>September</option>
            <option value="10" <?php if ($bulan == 10) echo "selected"; ?>>Oktober</option>
            <option value="11" <?php if ($bulan == 11) echo "selected"; ?>>November</option>
            <option value="12" <?php if ($bulan == 12) echo "selected"; ?>>Desember</option>
        </select>
    </div>
</div>

<div class="col-3 px-3 float-right">
    <div class="form-group">
        <label for="tahun">Tahun</label>
        <select name="tahun" id="tahun" class="form-control">
            <?php
            for ($tahun = date('Y'); $tahun > 2018; $tahun--) {
                $selected = $tahunparam == $tahun ? "selected" : "";
                echo "<option value='$tahun' $selected>$tahun</option>";
            }
            ?>
        </select>
    </div>
</div>

<div class="col-3 px-3 float-right">
    <br>
    <button type="submit" class="col btn btn-primary mt-2">Filter Data</button>
</div>
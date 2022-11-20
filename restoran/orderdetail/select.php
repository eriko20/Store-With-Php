<h3> Detail Pembelian </h3>

<div class="form-group">
<form action="" method="post">
    <div class="form-group w-50">
        <label for="">tanggal Awal</label>
        <input type="date" name="tawal" required class="form-control">
    </div>
    <br> 
    <div class="form-group w-50">
        <label for="">tanggal Akhir</label>
        <input type="date" name="takhir" required class="form-control">
    </div>
    <br>
    <div>
        <input type="submit" name="simpan" value="cari" class="btn btn-primary"> 
    </div>
    </form>
</div>
<?php




$jumlahdata = $db->rowCOUNT("SELECT idorderdetail FROM vorderdetail");
$banyak = 3;

$halaman = ceil($jumlahdata / $banyak);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}

$sql = "SELECT * FROM vorderdetail  ORDER BY idorderdetail DESC LIMIT $mulai,$banyak";
$row = $db->getALL($sql);

if (isset($_POST['simpan'])) {
    $tawal= $_POST['tawal'];
    $takhir= $_POST['takhir'];
    $sql = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$tawal' AND '$takhir'";
}

$no = 1 + $mulai;

$total = 0;

?>


<br>

<table class="table table-bordered w-70 mt-4">
    <thead>
        <tr>
            <th>no</th>
            <th>pelanggan</th>
            <th>tanggal</th>
            <th>menu</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>total</th>
            <th>alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($row)) { ?>
            <?php foreach ($row as $r) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $r['pelanggan'] ?></td>
                    <td><?php echo $r['tglorder'] ?></td>
                    <td><?php echo $r['menu'] ?></td>
                    <td><?php echo $r['harga'] ?></td>
                    <td><?php echo $r['jumlah'] ?></td>
                    <td><?php echo $r['jumlah'] * $r['harga'] ?></td>
                    <td><?php echo $r['alamat'] ?></td>
                    <?php 
                    
                    $total = $total + ($r['jumlah'] * $r['harga']);
                    
                    ?>
                </tr>   
            <?php endforeach ?>
        <?php } ?>
        <tr>

        <td colspan="6"><h3>Grand total</h3></td>
        
        <td><h4><?php echo $total ?></h4></td>


        </tr>
    </tbody>
</table>

<?php

for ($i = 0; $i <= $halaman; $i++) {
    echo '<a href="?f=orderdetail&m=select&p=' . $i . '">' . $i . '</a>';
    echo '&nbsp';
}

?>
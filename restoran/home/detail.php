<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$email = $_SESSION['pelanggan'];
$jumlahdata = $db->rowCOUNT("SELECT idorderdetail FROM vorderdetail WHERE idorder = '$id'");
$banyak = 4;

$halaman = ceil($jumlahdata / $banyak);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}

$sql = "SELECT * FROM vorderdetail WHERE idorder = '$id' ORDER BY idorderdetail ASC LIMIT $mulai,$banyak";
$row = $db->getALL($sql);


$no = 1 + $mulai;

?>

<h3> Detail Pembelian </h3>
<br>

<table class="table table-bordered w-70 mt-4">
    <thead>
        <tr>
            <th>no</th>
            <th>tanggal</th>
            <th>menu</th>
            <th>harga</th>
            <th>jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($row)) { ?>
            <?php foreach ($row as $r) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $r['tglorder'] ?></td>
                    <td><?php echo $r['menu'] ?></td>
                    <td><?php echo $r['harga'] ?></td>
                    <td><?php echo $r['jumlah'] ?></td>
                </tr>
            <?php endforeach ?>
        <?php } ?>
    </tbody>
</table>

<?php

for ($i = 0; $i <= $halaman; $i++) {
    echo '<a href="?f=home&m=detail&id='.$r['idorder'].'&p=' . $i . '">' . $i . '</a>';
    echo '&nbsp';
}

?>
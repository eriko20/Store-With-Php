<?php

$jumlahdata = $db->rowCOUNT("SELECT idpelanggan FROM tbpelanggan");
$banyak = 3;

$halaman = ceil($jumlahdata / $banyak);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}

$sql = "SELECT * FROM tbpelanggan ORDER BY pelanggan ASC LIMIT $mulai,$banyak";
$row = $db->getALL($sql);


$no = 1 + $mulai;

?>
    
<h3> Pelanggan </h3>

<table class="table table-bordered w-70 mt-4">
    <thead>
        <tr>
            <th>no</th>
            <th>pelanggan</th>
            <th>alamat</th>
            <th>telp</th>
            <th>email</th>
            <th>delete</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $r) : ?>
            <tr>
                <?php

                if ($r['aktif'] == 1) {
                    $status = 'aktif';
                } else {
                    $status = 'tidak aktif';
                }

                ?>
                <td><?php echo $no++ ?></td>
                <td><?php echo $r['pelanggan'] ?></td>
                <td><?php echo $r['alamat'] ?></td>
                <td><?php echo $r['telp'] ?></td>
                <td><?php echo $r['email'] ?></td>
                <td><a href="?f=pelanggan&m=delete&id=<?php echo $r['idpelanggan'] ?>">delete</a></td>
                <td><a href="?f=pelanggan&m=update&id=<?php echo $r['idpelanggan'] ?>"><?php echo $status ?></a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php

for ($i = 0; $i <= $halaman; $i++) {
    echo '<a href="?f=pelanggan&m=select&p=' . $i . '">' . $i . '</a>';
    echo '&nbsp';
}

?>
<?php

$jumlahdata = $db->rowCOUNT("SELECT iduser FROM tbluser");
$banyak = 3;

$halaman = ceil($jumlahdata / $banyak);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}

$sql = "SELECT * FROM tbluser ORDER BY user ASC LIMIT $mulai,$banyak";
$row = $db->getALL($sql);


$no = 1 + $mulai;

?>
<div class="float-start me-5">
    <a class="btn btn-primary" href="?f=user&m=insert" role="button">TAMBAH DATA</a>
</div>
<h3> User </h3>

<table class="table table-bordered w-70 mt-5">
    <thead>
        <tr>
            <th>no</th>
            <th>User</th>
            <th>email</th>
            <th>level</th>
            <th>delete</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $r) : ?>
            <?php  
                
                if ($r['aktif']==1) {
                    $status = "aktif";
                }else {
                    $status = "banned";
                }

            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $r['user'] ?></td>
                <td><?php echo $r['email'] ?></td>
                <td><?php echo $r['level'] ?></td>
                <td><a href="?f=user&m=delete&id=<?php echo $r['iduser'] ?>">delete</a></td>
                <td><a href="?f=user&m=update&id=<?php echo $r['iduser'] ?>"><?php echo $status; ?></a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php

for ($i = 0; $i <= $halaman; $i++) {
    echo '<a href="?f=user&m=select&p=' . $i . '">' . $i . '</a>';
    echo '&nbsp';
}

?>
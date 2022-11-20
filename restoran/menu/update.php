<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";

    $item = $db->getITEM($sql);

    $idkategori = $item['idkategori'];
    $gambar = $item['gambar'];
    echo $idkategori . ' - ' . $gambar;
}

$row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori asc");


?>

<h3>insert menu</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">

            <label for="">kategori</label><br> <br>
            <select name="idkategori" id="">
                <?php foreach ($row as $r) : ?>
                    <option <?php if ($idkategori == $r['idkategori']) echo "selected" ?> value="<?php echo $r['idkategori'] ?>"> <?php echo $r['kategori'] ?></option>
                <?php endforeach ?>
            </select>

        </div>
        <br>
        <div class="form-group w-50">

            <label for="">menu</label>
            <input type="text" name="menu" required value="<?php echo $item['menu'] ?>" class="form-control">

        </div>
        <br>
        <div class="form-group w-50">

            <label for="">harga</label>
            <input type="number" name="harga" number required value="<?php echo $item['harga'] ?>" class="form-control">

        </div>
        <br>
        <div class="form-group w-50">

            <label for="">Gambar</label><br><br>
            \<input type="file" name="gambar">

        </div>
        <br>
        <div>

            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">

        </div>
    </form>
</div>

<?php

if (isset($_POST['simpan'])) {
    $idkategori = $_POST['idkategori'];
    $menu = $_POST['menu'];
    $harga = $_POST['harga'];
    $gambar = $item['gambar'];
    // $gambar = $_FILES['gambar']['name'];
    $temp = $_FILES['gambar']['tmp_name'];
    echo "<br>";

    if (empty($temp)) {
        $gambar = $_FILES['gambar']['name'];
        move_uploaded_file($temp, '../upload/' . $gambar);
    }

    $sql = "UPDATE tblmenu SET idkategori=$idkategori,menu='$menu',gambar='$gambar',harga=$harga WHERE idmenu=$id";

    $db->runSQL($sql);
    header("location:?f=menu&m=select");
}


?>
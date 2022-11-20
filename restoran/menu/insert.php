<?php


$row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori asc");


?>
<h3>insert menu</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">

            <label for="">kategori</label><br> <br>
            <select name="idkategori" id="">
                <?php foreach ($row as $r) : ?>
                    <option value="<?php echo $r['idkategori'] ?>"> <?php echo $r['kategori'] ?></option>
                <?php endforeach ?>
            </select>

        </div>
        <br>
        <div class="form-group w-50">

            <label for="">menu</label>
            <input type="text" name="menu" required placeholder="isi menu" class="form-control">

        </div>
        <br>
        <div class="form-group w-50">

            <label for="">harga</label>
            <input type="number" name="harga" number required placeholder="isi harga" class="form-control">

        </div>
        <br>
        <div class="form-group w-50">

            <label for="">Gambar</label><br><br>
            \<input type="file" name="gambar" >

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
    $gambar = $_FILES['gambar'] ['name']; 
    $temp = $_FILES['gambar']['tmp_name'];
    echo "<br>";
    if (empty($gambar)) {
        echo "<h3> gambar kosong </h3>";
    }else{
        $sql="INSERT INTO tblmenu VALUES ('',$idkategori,'$menu','$gambar',$harga)";
        move_uploaded_file($temp,'../upload/'.$gambar);
        $db->runSQL($sql);
        header("location:?f=menu&m=select");
    }
}


?>
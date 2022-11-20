<h3>insert User</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">user</label>
            <input type="text" name="user" required placeholder="isi user" class="form-control">
        </div>
        <br>
        <div class="form-group w-50">
            <label for="">email</label>
            <input type="email" name="email" required placeholder="email" class="form-control">
        </div>
        <br>
        <div class="form-group w-50">
            <label for="">password</label>
            <input type="password" name="password" required placeholder="password" class="form-control">
        </div>
        <br>
        <div class="form-group w-50">
            <label for="">konfirmasi password</label>
            <input type="password" name="konfirmasi" required placeholder="password" class="form-control">
        </div>
        <br>
        <div class="form-group w-50">
            <label for="">level</label><br><br>
            <select name="level" id="">

                <option value="admin">admin</option>
                <option value="koki">koki</option>
                <option value="kasir">kasir</option>

            </select>
        </div>
        <br>

        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
    </form>
</div>
<br>

<?php

if (isset($_POST['simpan'])) {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    $konfirmasi = hash('sha256', $_POST['konfirmasi']);
    $level = $_POST['level'];

    if ($password == $konfirmasi) {
        $sql = "INSERT INTO tbluser VALUES ('','$user','$email','$password','$level',1)";

        $db->runSQL($sql);
        header("location:?f=user&m=select");
    } else {
        echo '<h3> PASSWORD TIDAK SAMA DENGAN KONFIRMASi </h3>';
    }
}


?>
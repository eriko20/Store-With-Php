<?php 

    if (isset($_GET['id'])) {
        $id=$_GET['id'];

        $sql= "DELETE FROM tbpelanggan WHERE idpelanggan=$id";

        $db->runSQL($sql);

        header("location:?f=pelanggan&m=select");
    }

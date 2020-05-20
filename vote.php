<?php
    require_once("sql.php");
    if (isset($_GET['id'])){
        $sql = "UPDATE players SET vote = ".$_GET['id']." WHERE id = ".$_COOKIE['user'];
        $conn->query($sql);
        Header("Location: index.php");
    }

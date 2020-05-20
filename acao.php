<?php
    require_once("sql.php");
    if (isset($_GET['role']) && isset($_GET['id'])){
        if($_GET['role'] == 1){
            $sql = "UPDATE players SET morto = true WHERE id =".$_GET['id'];
            $conn->query($sql);
            $header = "Location: index.php";
        } else {
            $sql = "SELECT players.nome, role.part FROM players INNER JOIN role on players.role = role.id  WHERE players.id = ".$_GET['id'];
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) {
                $header = "Location: index.php?nome=".$row['nome']."&role=".$row['part'];
            }
        }
        $sql = "UPDATE players SET done = true WHERE id = ".$_COOKIE['user'];
        $conn->query($sql);
        Header($header);
    }

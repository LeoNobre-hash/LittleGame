<?php
    $sql = "SELECT players.nome, players.done, players.role, role.part, role.objetivo FROM game.players INNER JOIN role ON players.role=role.id WHERE players.id=".$_COOKIE['user'];
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $nome = (string)$row['nome'];
            if($row['role'] != NULL){
                $role = (int)$row['role'];
                $papel = (string)$row['part'];
                $atual = (string)$row['objetivo'];
                $done = (bool)$row['done'];
            }
        }
    }


<?php
    $sql = "SELECT * FROM game.players WHERE players.id=".$_COOKIE['user'];
    $result = $conn->query($sql);
    if($result->num_rows == 0){
        setcookie('started', '', time()-1000);
        setcookie('user', '', time()-1000);
    }

<?php
    if(!empty($_GET['name'])){
        require_once("sql.php");
        $sql = "INSERT INTO game.players (nome, morto, done, vote) VALUES ('".$_GET['name']."', false, false, 0)";
        if ($conn->query($sql) === TRUE) {
            $sql = "SELECT * FROM game.players WHERE nome='".$_GET['name']."'";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) {
                setcookie('user', $row['id']);
            }

            Header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

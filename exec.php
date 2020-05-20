<?php

    if(isset($_GET['code'])){
        $i = $_GET['code'];
        if($i >= 0 && $i <= 2){
            require_once("sql.php");

            switch ($i){
                case 0:
                    $sql = "DELETE FROM game.players WHERE id>0;";
                    $sql .= "ALTER TABLE game.players AUTO_INCREMENT = 1;";
                    $sql .= "UPDATE game.atual SET id_back=1 WHERE id = 1;";
                    break;

                case 1:
                    $sql = "SELECT id FROM game.players";
                    $result = $conn->query($sql);
                    $num = $result->num_rows;
                    if($num > 0){
                        $numbers = range(1, $num);
                        shuffle($numbers);
                        $sql = "";

                        for ($n = 0; $n < count($numbers); $n++) {

                            if ($n == 0){
                                $id = "1";
                            }
                            elseif ($n == 1){
                                $id = "2";
                            }
                            else{
                                $id = "3";
                            }

                            $sql .= "UPDATE game.players SET role=".$id.", done=true WHERE id=".$numbers[$n].";";
                        }
                    }
                    break;

                case 2:
                    $sql = "SELECT id_back FROM game.atual";
                    $result = $conn->query($sql);

                    while($row = $result->fetch_assoc()) {

                        $n = (int)$row['id_back'];

                        if ($n == 3){
                            $id = 1;
                        }
                        else{
                            $id = $n + 1;
                        }

                        $sql = "UPDATE game.atual SET id_back=".$id." WHERE id=1;";
                        $sql .= "UPDATE game.players SET done=FALSE WHERE id>0;";
                    }
                    break;
            }
            $conn->multi_query($sql);
        }
    }
    header("Location: admin.php");
?>

<?php
    $papel = "Não Atribuido";

    require_once("sql.php");
    require_once("background.php");

    if(isset($_COOKIE['user'])){
        require_once("user.php");
        require_once("tester.php");
    }

    if(isset($_GET['role'])){
        require_once("disc.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Jogo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
<div>
    <div class="container" style="background-color: #dadada;margin: 30px auto;">
        <div class="row" style="min-height: 250px;">
            <div class="col-md-4 col-xl-3" style="margin: auto ;">
                <div class="row">
                    <div class="col" style="margin: auto 15px;">
                        <h4><?php if (isset($tempo)) { echo $tempo; } ?></h4>
                        <p id="time">1:00</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-6 align-self-end " style="height: 250px;">
                <div class="text-center border rounded border-dark shadow" id="text" style="margin: 25px auto;min-height: 200px;"></div>
            </div>
            <div class="col-md-4 col-xl-3 align-self-center">
                <div class="row" style="margin: auto 15px;">
                    <div class="col">
                        <h4><?php if(isset($nome)){echo $nome;}?></h4>
                    </div>
                </div>
                <div class="row" style="margin: auto 15px;">
                    <div class="col-xl-4">
                        <h5>Papel:</h5>
                    </div>
                    <div class="col">
                        <p><?php echo $papel;?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                if(isset($done) && !$done){
                    if (isset($id_back) && $id_back == 3){
                        if($role != 3){?>
                            <div class="col" style="margin-bottom: 15px;">
                                <p><?php if(isset($atual)){ echo $atual;} ?></p>
                                <div class="row">
                                    <?php
                                    $sql = "SELECT * FROM game.players WHERE id <> 1 AND morto <> true";
                                    $result = $conn->query($sql);

                                    while($row = $result->fetch_assoc()) {
                                        $string = "role=".$role."&id=".$row['id'];
                                        echo "<div class='col text-center align-self-center'><a href='acao.php?".$string."' class='btn btn-dark text-white' role='button'>".$row['nome']."</a></div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php }
                        else{
                            $sql = "UPDATE players SET done = true WHERE id = ".$_COOKIE['user'];
                            $conn->query($sql);
                        }
                    } elseif ($id_back == 2) {?>
                        <div class="col" style="margin-bottom: 15px;">
                            <p>Escolha quem deseja votar contra:</p>
                            <div class="row">
                                <?php
                                $sql = "SELECT id, nome FROM game.players WHERE id <> 1 AND morto <> true";
                                $result = $conn->query($sql);

                                while($row = $result->fetch_assoc()) {
                                    $string = "id=".$row['id'];
                                    echo "<div class='col text-center align-self-center'><a href='vote.php?".$string."' class='btn btn-dark text-white' role='button'>".$row['nome']."</a></div>";
                                }
                                echo "<div class='col text-center align-self-center'><a href='vote.php?id=0' class='btn btn-dark text-white' role='button'>Passar</a></div>";
                                ?>
                            </div>
                        </div>
                        <?php}
                }?>

        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script>
        let remain = 60;
        let extra = "";
        const phase = "<?php if (isset($acao)) { echo $acao; } ?>".split('');

        const cookies = document.cookie;
        let cookie = cookies.split("; ");
        let start = cookie[0].split("=");

        if(start[1]!=="true"){
            const person = prompt("Por favor, introduza o seu nome");

            if (null == person || person === "") {
                window.location.reload();
            } else {
                document.cookie = "started=true";
                window.location.replace("newuser.php?name="+person);
            }
        }

        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        function timer() {
            let extra;
            remain--;

            if(remain < 10){
                extra = "0";
            }else{
                extra = "";
            }

            $("#time").text("0:"+ extra + remain);
            setTimeout(timer, 1000);

            if(remain < 1){
                window.location.reload();
            }
        }

        async function char() {
            for (let i = 0; i < phase.length; i++) {
                if(phase[i] === '*'){
                    $("#text").append("<br>")
                }else{
                    $("#text").append(phase[i]);
                }
                await sleep(100);
            }
        }

        setTimeout(timer, 1000);
        char();

    </script>
</body>

</html>
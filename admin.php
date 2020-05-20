<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Admin</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p style="height: 48px;">Resetar Jogadores</p><button class="btn btn-primary" onclick="f(0)" type="button"><i class="fa fa-refresh"></i></button></div>
        <div class="col">
            <p style="height: 48px;">Atribuir Papel</p><button class="btn btn-primary" onclick="f(1)" type="button"><i class="fa fa-edit"></i></button></div>
        <div class="col">
            <p style="height: 48px;">Passar para a&nbsp;próxima fase<br><br></p><button class="btn btn-primary" onclick="f(2)" type="button"><i class="fa fa-forward"></i></button></div>
        <div class="col">
            <p style="height: 48px;">Realizar Votação<br><br></p><button class="btn btn-primary" onclick="f(2)" type="button"><i class="fa fa-forward"></i></button></div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script>
    function f(i) {
        window.location.replace("exec.php?code="+i);
    }
</script>
</body>

</html>
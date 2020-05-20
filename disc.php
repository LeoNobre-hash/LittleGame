<?php
    function alert($msg)
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); window.location.href = "index.php"</script>';
    }

    $nome = $_GET['nome'];
    $role = $_GET['role'];

    $msg = $nome." é um ".$role;
    alert($msg);


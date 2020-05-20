<?php
    $sql = "SELECT background.id, background.acao,background.nome FROM game.atual INNER JOIN background on atual.id_back = background.id";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $tempo = (string)$row['nome'];
        $acao = (string)$row['acao'];
        $id_back = (int)$row['id'];
    }

<?php
    
    require("../conexao.php");

    $codigo = $_GET["id_horarios"];

    $sql = "
        select 
            horarios as horarios, 
            dia_horarios as dia
        from 
            tb_ponto
        where 
            id_horarios = " . $codigo;

    $result = mysqli_query($conexao, $sql);

    if ($result) {
        $r = $result->fetch_array(MYSQLI_ASSOC);
        http_response_code(200);
        echo json_encode($r, JSON_UNESCAPED_UNICODE);
    } else {
        header("HTTP/1.1 500 Erro no SQL");
        echo json_encode(["erro" => "Erro SQL: " . $conexao->error]);
    }

?>
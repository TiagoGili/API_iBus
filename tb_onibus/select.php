<?php
    
    require("../conexao.php");

    $codigo = $_GET["id_onibus"];

    $sql = "
        select 
            numero_onibus as numero, 
            fk_linha_onibus as linha_onibus
        from 
            tb_onibus
        where 
            id_onibus = " . $codigo;

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
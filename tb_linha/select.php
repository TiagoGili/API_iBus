<?php
    
    require("../conexao.php");

    $codigo = $_GET["id_linha"];

    $sql = "
        select 
            nome_linha as nome, 
            numero_linha as numero
        from 
            tb_linha
        where 
            id_linha = " . $codigo;

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
<?php
    
    require("../conexao.php");

    $codigo = $_GET["id_usuario"];

    $sql = "
        select 
            fk_usuario_favoritos
            fk_linha_favoritos
        from 
            tb_favoritos 
        where 
            id_usuario = " . $codigo;

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
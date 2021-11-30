<?php

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $codigo = $_GET["codigo"];

        $sql = "delete from tb_favoritos where fk_usuario_favorito = " . $codigo;

        $status = mysqli_query($conexao, $sql);
        if ($status) {
            http_response_code(201);
            $data = ["mensagem" => "Produto excluído com sucesso"];
            echo json_encode($data);
        } else {
            header("HTTP/1.1 500 Erro no SQL");
            echo json_encode(["erro" => "Erro ao Exluir: " . $conexao->error]);
        }
    } 

?>
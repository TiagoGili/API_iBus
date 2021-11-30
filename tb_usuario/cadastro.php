<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        require("../conexao.php");
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        
        $nome_usuario = $request->nome_usuario;
        $email_usuario = $request->email_usuario;
        $senha_usuario = $request->senha_usuario;
        $desc_usuario = $request->desc_usuario;
        $dtNasc_usuario = $request->dtNasc_usuario;
    
        $sql = "
            insert into 
                tb_usuario 
                (
                    nome_usuario, 
                    email_usuario, 
                    senha_usuario, 
                    desc_usuario, 
                    dtNasc_usuario,
                    config_usuario,
                    localizacao_usuario
                ) 
                value
                (
                    '$nome_usuario', 
                    '$email_usuario', 
                    '$senha_usuario', 
                    '$desc_usuario', 
                    '$dtNasc_usuario',
                    'configurado',
                    'aaaa'
                )";

        $status = mysqli_query($conexao, $sql);
        
        if ($status) {
            http_response_code(201);
            $data = ["mensagem" => "Inserido com sucesso"];
            echo json_encode($data);
        } else {
            header("HTTP/1.1 500 Erro no SQL");
            echo json_encode(["erro" => "Erro ao Inserir " . $conexao->error]);
        }

    }

?>
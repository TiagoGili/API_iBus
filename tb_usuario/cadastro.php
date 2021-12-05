<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        require("../conexao.php");
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        
        $id_usuario = $request->id;
        $nome_usuario = $request->nome;
        $email_usuario = $request->email;
        $senha_usuario = $request->senha;

        $sql = "INSERT INTO tb_usuario 
                    (nome_usuario, 
                    email_usuario, 
                    senha_usuario, 
                    desc_usuario, 
                    dtNasc_usuario) 
                VALUES
                    ('$nome_usuario', 
                    '$email_usuario', 
                    '$senha_usuario', 
                    'Descrição', 
                    '1111-11-11')";

        $status = mysqli_query($conexao, $sql);
        
        if ($status) {
            http_response_code(201);
            echo json_encode(["mensagem" => "Usuário cadastrado com sucesso."]);
        } else {
            header("HTTP/1.1 500 Erro no SQL");
            echo json_encode(["erro" => "Erro ao Inserir " . $conexao->error]);
        }

    }

?>
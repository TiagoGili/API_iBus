<?php

    if ($_SERVER["REQUEST_METHOD"] == "PUT") {
        
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $codigo = $request->id_usuario;
        $nome = $request->nome_usuario;
        $email_usuario = $request->email_usuario;
        $senha_usuario = $request->senha_usuario;
        $desc_usuario = $request->desc_usuario;
        $dtNasc_usuario = $request->dtNasc_usuario;
        $status_usuario = $request->status_usuario;

        $sql = "
            update 
                tb_usuario 
            set 
                nome_usuario = '$nome_usuario', 
                email_usuario = '$email_usuario', 
                senha_usuario = '$senha_usuario', 
                desc_usuario = '$desc_usuario', 
                dtNasc_usuario = '$dtNasc_usuario', 
                status_usuario = '$status_usuario', 
                localizacao_usuario = '$localizacao_usuario' 
            where 
                id_usuario = $codigo";

        $status = mysqli_query ($conexao, $sql);
        if ($status) {
            http_response_code(200);
            $data = ["mensagem" => "$desc alterado com sucesso"];
            echo json_encode($data);
        } else {
            http_response_code(202);
            $data = ["status" => "Erro", "msg" => "Erro ao alterar" . mysqli_error($conexao)];
            echo json_encode($data);
        }
    }

?>
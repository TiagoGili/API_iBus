<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $email = $request->email_usuario;
        $senha = $request->senha_usuario;
        require("../conexao.php");

        $sql = "
            SELECT
                nome_usuario as nome, 
                email_usuario as email, 
                senha_usuario as senha, 
                desc_usuario as descricao, 
                dtNasc_usuario as dtNasc,
                status_usuario as status, 
                localizacao_usuario as localizacao
            FROM
                tb_usuario 
            WHERE 
                email_usuario = '" .$email."'
            AND
                senha_usuario = '".$senha."'";

        $result = mysqli_query($conexao, $sql);

    if ($result) {
        $r = $result->fetch_array(MYSQLI_ASSOC);
        http_response_code(200);
        echo json_encode($r, JSON_UNESCAPED_UNICODE);
    } else {
        header("HTTP/1.1 500 Erro no SQL");
        echo json_encode(["erro" => "Erro SQL: " . $conexao->error]);
    }

    }

?>
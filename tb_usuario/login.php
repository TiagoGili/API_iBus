<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        require("../conexao.php");
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $email = $request->email_usuario;
        $senha = $request->senha_usuario;

        $sql = "SELECT
                    id_usuario as id
                FROM
                    tb_usuario 
                WHERE 
                    email_usuario = '" .$email."'
                AND
                    senha_usuario = '".$senha."'";

        $result = mysqli_query($conexao, $sql);

    if ($result) {
        http_response_code(201);
        $r = $result->fetch_array(MYSQLI_ASSOC);
        echo json_encode(["codigo"=> $r["id"]]);
        $data = ["mensagem" => "Inserido com sucesso"];
        echo json_encode($data);
    } else {
        header("HTTP/1.1 500 Erro no SQL");
        echo json_encode(["erro" => "Erro SQL: " . $conexao->error]);
    }

    }

?>
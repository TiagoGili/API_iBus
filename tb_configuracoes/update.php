<?php

    if ($_SERVER["REQUEST_METHOD"] == "PUT") {
        
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $codigo = $request->id_config;
        $foto_config = $request->foto_config;
        $fk_config_usuario = $request->fk_config_usuario;

        $sql = "
            update 
                tb_configuracoes
            set 
                foto_config = '$foto_config', 
            where 
                id_config = $codigo";

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
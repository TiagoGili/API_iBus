<?php
    
    require("../conexao.php");

    $codigo = $_GET["id_usuario"];

    //$sql = "select pro_id as id, pro_descricao as descricao,
    //pro_preco as preco, pro_validade as validade from produto
    //where pro_id = " . $codigo;

    $sql = "select nome_usuario as nome, email_usuario as email, 
    senha_usuario as senha, desc_usuario as desc, dtNasc_usuario as dtNasc,
    status_usuario as status, localizacao_usuario as localizacao
    from tb_usuario where id_usuario = " . $codigo;

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
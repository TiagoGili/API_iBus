<?php
    $conexao = new mysqli("172.16.20.100","ibus_app","Ibus@pp3467");
    $conexao->set_charset("UTF8");
    if($conexao->connect_error){
        die("Falha ao conectar:".$conexao->connect_error);
    }if(!$conexao->select_db("ibus_app")){
        die("O Banco de dados não existe");
    }
?>
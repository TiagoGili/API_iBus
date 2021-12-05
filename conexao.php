<?php
    //$conexao = new mysqli("172.16.20.100","ibus_app","Ibus@pp3467");
    $conexao = new mysqli("201.62.65.6","ibus_app","Ibus@pp3467", "ibus_app");
    $conexao->set_charset("UTF8");

    if($conexao->connect_error){
        die("Falha ao conectar:".$conexao->connect_error);
    }
?>
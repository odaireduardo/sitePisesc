<?php

    $dbHost = "localhost";
    $dbUsuario = "root";
    $dbSenha = "";
    $dbBanco = "senac";

    $conexao = new mysqli($dbHost, $dbUsuario, $dbSenha, $dbBanco);

    // if ($conexao->connect_errno){
    //     echo "erro";
    // } else {
    //     echo "Conexão com Sucesso";
    // }

    // $dados = $conexao->query("SELECT * FROM usuarios");

    // echo "<pre>";
    // print_r ($dados);
    // echo "<br>";
    // var_dump($dados);
    // echo "</pre>";

?>
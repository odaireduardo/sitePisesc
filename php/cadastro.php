<?php
    if (isset($_POST['submit']) ) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cod_veiculo = $_POST['cod_veiculo'];
        $contactar = "N";
        $vendedor = $_POST['id_vendedor'];

        include_once('conectar.php');

        $sql = "INSERT INTO usuarios VALUES (default,'$nome', '$email', '$telefone', '$cod_veiculo', '$contactar', '$vendedor')";

        $resultado = $conexao->query($sql);
        
        header('Location: login.php');
    }

    ?>
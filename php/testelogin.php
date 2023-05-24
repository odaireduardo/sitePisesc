<?php
session_start();
include_once('conectar.php');


    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // echo "Login: ". $email . "<br>";
        // echo "Senha: " .  $senha;

        $sql = "SELECT * FROM vendedor WHERE email = '$email' and senha = '$senha'";
        
        $resultado = $conexao->query($sql);

        if (mysqli_num_rows($resultado) < 1){
            unset($_SESSION['email']);
            
            echo "<script>alert('Email enviado com Sucesso!);location.href='login.php';</script>";
            //header('location: login.php');
            //
        } else {
            $_SESSION['email'] = $email;
            header('location: vendedor.php');

        }

    } else {
        unset($_SESSION['email']);
        header('location: ../inicio.html');
    }
    

   



?>
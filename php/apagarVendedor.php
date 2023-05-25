<?php
session_start();
if (!isset($_SESSION['email'])==true) {
    unset($_SESSION['email']);
            
            echo  "<script>alert('Sem Permissão);</script>";
            header('location: home.html');
}
 

    if (!empty($_GET['id'])){
        include_once('conectar.php');
        $id = $_GET['id'];

        $sql = "SELECT * FROM vendedor WHERE id='$id'";
        $resultado = $conexao->query($sql);

        // echo "<pre>";
        // print_r($resultado);
        // echo "</pre>";

        if ($resultado->num_rows == 1) {

            $sqlDelete = "DELETE FROM vendedor WHERE id='$id'";
            $resultadoDel = $conexao->query($sqlDelete);
            header('Location: vendedor.php'); 
        }else {

            echo "Algo deu errado";
        }

    }

?>
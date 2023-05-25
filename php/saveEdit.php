<?php
session_start();
if (!isset($_SESSION['email'])==true) {
    unset($_SESSION['email']);
            
            echo  "<script>alert('Sem Permissão);</script>";
            header('location: home.html');
}
//VERIFICA SE É VENDEDOR

if ((isset($_POST['update'])) and (isset($_POST['cpf']))) {
    include_once('conectar.php');

    

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];

       
        $sql = "UPDATE vendedor SET nome='$nome', email='$email', senha='$senha', telefone='$telefone', cpf='$cpf' WHERE id='$id'";

        $resultado = $conexao->query($sql);

        header('Location: vendedor.php');
}
   

    //verifica se é cliente tendo vendedor

    if ((isset($_POST['update'])) and (isset($_POST['contactar']))) {
        include_once('conectar.php');
    

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cod_veiculo = $_POST['cod_veiculo'];
        $contactar = $_POST['contactar'];
        $vendedor = $_POST['vendedor'];
       

        

       
        $sql = "UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone', cod_veiculo='$cod_veiculo', contactar='$contactar', vendedor='$vendedor' WHERE id='$id'";

        $resultado = $conexao->query($sql);

        header('Location: clientes.php');

    }


     //verifica se é VEICULO tendo vendedor

     if ((isset($_POST['update'])) and (isset($_POST['img']))) {
        include_once('conectar.php');
    

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $img = $_POST['img'];

       
       

        

       
        $sql = "UPDATE veiculo SET nome='$nome', descricao='$descricao', img='$img' WHERE id='$id'";

        $resultado = $conexao->query($sql);

        header('Location: veiculos.php');

    }



        // if ($resultado ==1) {


        // }
        
        

?>
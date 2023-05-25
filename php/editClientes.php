<?php
session_start();
if (!isset($_SESSION['email'])==true) {
    unset($_SESSION['email']);
            
            echo  "<script>alert('Sem Permissão);</script>";
            header('location: home.html');
}
 include_once('conectar.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM clientes WHERE id='$id'";
    $resultado = $conexao->query($sql);


    if ($resultado->num_rows == 1) {

        $dados = mysqli_fetch_assoc($resultado);

        $nome = $dados['nome'];
        $email = $dados['email'];
        $telefone = $dados['telefone'];
        $cod_veiculo = $dados['cod_veiculo'];
        $contactar = $dados['contactar'];
        $vendedor = $dados['vendedor'];

       

        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
<link rel="stylesheet" href="cadastro.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style> 
.inputUser {
    color: red;
}
</style>
</head>
<body>
    
    <div class="box">
        
        <form action="saveEdit.php" method="post">
            <fieldset>
                <legend>Editar Usuario</legend>
                <br><br>
            <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome;?>" required>
                <label for="nome" class="labelInput">Nome Completo</label>
            </div>
            <br>
            <div class="inputBox">
                <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email;?>" required>
                <label for="email" class="labelInput">E-mail</label>
            </div>
            <br>
            <div class="inputBox">
                <input type="text" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone;?>" required>
                <label for="telefone" class="labelInput">Telefone</label>
            </div>
            <br>
            <div class="inputBox">
                <input type="text" name="cod_veiculo" maxlength="14" id="cod_veiculo" class="inputUser" value="<?php echo $cod_veiculo;?>" required>
                <label for="cod_veiculo" class="labelInput">Veiculo</label>
            </div>
            <br>
            <div class="inputBox">
                <input type="text" name="contactar" maxlength="14" id="contactar" class="inputUser" value="<?php echo $contactar;?>" required>
                <label for="contactar" class="labelInput">Contactar</label>
            </div>
            <br>
            <div class="inputBox">
                <input type="text" name="vendedor" maxlength="14" id="vendedor" class="inputUser" value="<?php echo $vendedor;?>" required>
                <label for="vendedor" class="labelInput">Vendedor</label>
            </div>
           
            
            <br><br>
            <input type="hidden" name="id" value=<?php echo $id; ?> >
            <input class="btn" type="submit" name="update" id="submit" value="Alterar">
           
            
            </fieldset>
        </form>
    </div>
</body>
</html>
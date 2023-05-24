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
    
    $sql = "SELECT * FROM veiculo WHERE id='$id'";
    $resultado = $conexao->query($sql);


    if ($resultado->num_rows == 1) {

        $dados = mysqli_fetch_assoc($resultado);

        $nome = $dados['nome'];
        $descricao = $dados['descricao'];
        $img = $dados['img'];
        
       

        
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
                <label for="nome" class="labelInput">Nome</label>
            </div>
            <br>
            <div class="inputBox">
                <textarea  name="descricao" id="descricao" class="inputUser" ><?php echo $descricao;?></textarea>
                <label for="descricao" class="labelInput">Descrição</label>
            </div>
            <br>
            <div class="inputBox">
                <input type="text" name="img" id="img"    class="inputUser" value="<?php echo $img;?>" required>
                <label for="img" class="labelInput">Imagem</label>
            </div>
            
           
            
            <br><br>
            <input type="hidden" name="id" value=<?php echo $id; ?> >
            <input class="btn" type="submit" name="update" id="submit" value="Alterar">
           
            
            </fieldset>
        </form>
    </div>
</body>
</html>
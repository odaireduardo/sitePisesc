<?php
    if (isset($_POST['submit']) ) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
       
        include_once('conectar.php');

        $sql = "INSERT INTO vendedor VALUES (default,'$nome', '$email', '$senha', '$telefone', '$cpf')";

        $resultado = $conexao->query($sql);
        
        header('Location: vendedor.php');
        echo "funcionou";
    }

  ?>




<!DOCTYPE html>
<html>
<head>
  <title>Tela de Cadastro</title>
  <link rel="stylesheet" href="..\css\Cadastro.css">
</head>
<body>
  <div class="container">
    <h2>Cadastro</h2>
    <form action="cadastro.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
      </div>
      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>
      </div>
      <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>
      </div>
      <input type="submit" name="submit" value="Cadastrar">
    </form>
  </div>
</body>
</html>
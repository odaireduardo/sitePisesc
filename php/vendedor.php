<?php
session_start();
if (!isset($_SESSION['email'])==true) {
    unset($_SESSION['email']);
            
            echo  "<script>alert('Sem Permissão);</script>";
            header('location: login.php');
}

    $logado = $_SESSION['email'];
    include_once('conectar.php');

    $sql = "SELECT * FROM vendedor";
    $resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: linear-gradient(to right, rgb(20,150,220), rgb(20,50,70));
            color: #fff;
            padding: 0 10px;
            
        }
        h1 {
            text-align: center;
        }
        .table-bg {
            background: rgba(0,0,0,.3);
            border-radius: 20px 20px 0 0;
            
            
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consecionaria</title>
    <link rel="stylesheet" href="../css/telainicial.css">
</head>
<body>
<nav class="cabeçalho-menu">
  <img class="imagemlogo" id="logogridmotors" src="../Imagens/logo-grid-motors-cupom-removebg-preview-removebg-preview.png">
              <ul>
                <li ><a href="../inicio.html">Inicio</a></li>
                <li ><a href="vendedor.php">Vendedores</a></li>
                <li ><a href="clientes.php">Clientes</a></li>
                <li ><a href="veiculos.php">Veiculos</a></li>
              </ul>
              
 </nav> 




    <h1> Bem Vindo ao Sistema, <?php echo $logado ?> </h1>

    <table class="table table-bg text-white ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Senha</th>
      <th scope="col">Telefone</th>
      <th scope="col">CPF</th>
      <th scope="col">....</th>
    </tr>
  </thead>
  <tbody>
    <?php
        
       while ($dados = mysqli_fetch_assoc($resultado)) {

       
        

        echo "<tr>";
            echo "<td>" . $dados['id'] . "</td>";
            echo "<td>" . $dados['nome'] . "</td>";
            echo "<td>" . $dados['email'] . "</td>";
            echo "<td>" . $dados['senha'] . "</td>";
            echo "<td>" . $dados['telefone'] . "</td>";
            echo "<td>" . $dados['cpf'] . "</td>";
            echo "<td> 
                <a class='btn btn-sm btn-primary' href='edit.php?id=$dados[id]' title='Editar'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                </svg> </a>            
             / <a class='btn btn-sm btn-danger' href='apagarVendedor.php?id=$dados[id]' title='Apagar'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
          </svg> </a> </td>";
        echo "</tr>";

       }


    ?>
    
  </tbody>
</table>

</body>
</html>
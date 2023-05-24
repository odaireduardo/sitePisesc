<?php

    include("conexao.php");

    if(isset($_FILES['arquivo'])){
        $arquivo = $_FILES['arquivo'];
        if($arquivo['size'] > 2097152)//bytes
            die("Arquivo muito grante!! Max: 2MB");
       
        if($arquivo['error']) die("Falha ao enviar arquivo!");

        if($arquivo['size'] > 2097152) die("Arquivo muito grande!! Max: 2MB");


        $pasta = "imagens/"; //esta pasta deve estar criada, pois o php não a cria.
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));

        if($extensao != "jpg"  &&  $extensao != "png") 
            die("Tipo de arquivo não aceito");

        $path =  $pasta . $novoNomeDoArquivo . "." . $extensao;
        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
                    //retorna true ou false
        if($deu_certo) {
            $conexao->query("INSERT INTO arquivos (nome, path) VALUES ('$nomeDoArquivo','$path')") or die($conexao->error);
            echo "<p> Arquivo enviado com sucesso!</p>";
            //echo "<p>Arquivo enviado! Para acessá-lo, clique aqui: <a href='imagens/$novoNomeDoArquivo.$extensao'>Clique Aqui!</a></p>";
            //outra forma de aceitar texto dentro de aspas duplas e colocar o \ no inicio e fim da variavel.
        }else {
            echo "<p>Falha ao Enviar arquivo!</p>";
        }

        $sql_query = $conexao->query("SELECT * FROM arquivos") or die($conexao->error);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" action="" method="post">
        <p>
            <label for="">Selecione o arquivo</label>
            <input name="arquivo" type="file">
        </p>
        <button name="upload" type="submit">Enviar Arquivo</button>
    </form>

    
    <h1>Lista de Imagens</h1>
    <table border="1" cellpadding="10">
        <thead>
            <th>Preview</th>
            <th>Arquivo</th>
            <th>Data de Envio</th>
        </thead>
        <tbody>
        <?php
            while($arquivo = $sql_query->fetch_assoc()){
        ?>
            <tr>
                <td></td>
                <td><a target="_blank" href="<?php echo $arquivo['path']; ?>"> <?php echo $arquivo['nome'];?></a></td>
                <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_upload'])); ?></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>

</body>
</html>
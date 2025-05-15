<?php
include('config.php');
$sql ="SELECT * FROM registro";
$result=$conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filhas de D.Helena</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./index.css">
</head>
<body>
<header class="header">    
        <a href="#" class="logo"><img src="logo.png" alt=""></a>
        <nav class="navbar">             
        <a href="#add-product">Adicionar produto</a>         
        <a href="#product">Produtos cadastrados</a>          
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>  
</header>
<section class="add-product" id="add-product">
    <div class="box">
        <h1 class="heading">Adicionar Produto</h1>
        <form action="inserir.php" method="post">
            <label for="livro">Livro</label>
            <input class="box" type="text" name="livro" id="livro" placeholder="Livro">
            <label for="autor">Autor</label>
            <input class="box" type="text" name="autor" id="autor" placeholder="Autor">
            <label for="genero">Gênero</label>
            <input class="box" type="text" name="genero" id="genero" placeholder="Gênero">
            <label for="ano">Ano</label>
            <input class="box" type="number" name="ano" id="ano" placeholder="Ano">
            <input class="btn" type="submit" value="Enviar">
        </form>
    </div>

</section>
<section class="product" id="product">
    <div class="box">
    <h1 class="heading"> Produtos Cadastrados</h1>
    <table>
            <tr>
                <th>ID</th>
                <th>Livro</th>
                <th>Autor</th>
                <th>Gênero</th>
                <th>Ano</th>    
            </tr>
            <?php while ($product=$result->fetch_assoc()):?>
            <tr>
                <td><?=$product['id']?></td>
                <td><?=$product['livro']?></td>
                <td><?=$product['autor']?></td>
                <td><?=$product['genero']?></td>
                <td><?=$product['ano']?></td>
                <td>
                <a class="btn" href="update.php?id=<?= $produto['id'] ?>">Editar</a> 
                <a class="delete-btn" href="delete.php?id=<?= $produto['id'] ?>" onclick="return confirm('Deseja deletar?')">Deletar</a>
            </td>
            </tr>
            <?php endwhile; ?>

        </table>
    </div>
</section> 
</body>
</html>
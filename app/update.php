<?php
include('/laragon/www/livrobd/api/config.php');
include('/laragon/www/livrobd/api/logic.php');
include('/laragon/www/livrobd/api/logicgenero.php');


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filhas de D.Helena</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./ressources/css/index.css">
    <link rel="stylesheet" href="./ressources/css/add-product.css">
    <link rel="stylesheet" href="./ressources/css/product.css">
</head>

<body>
    <header class="header">
        <a href="index.php" class="logo"><img src="./ressources/img/logo.png" alt=""></a>
        <nav class="navbar">
            <a href="#add-product">Adicionar produto</a>
            <a href="#product">Produtos cadastrados</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <section class="add-product" id="add-product">

        <div class="box">
            <h1 class="heading">Editar Produto</h1>
            
            <form method="POST">
                <input class="box" type="hidden" name="id" value="<?= $product['id'] ?>">

                <label for="livro">Livro</label>
                <input class="box" type="text" name="livro" id="livro" placeholder="Livro" value="<?= $product['livro'] ?>">

                <label for="autor">Autor</label>
                <input class="box" type="text" name="autor" id="autor" placeholder="Autor" value="<?= $product['autor'] ?>">

                <label for="quantidade">Quantidade</label>
                <input class="box" type="number" name="quantidade" id="quantidade" placeholder="Quantidade" value="<?= $product['quantidade'] ?>">

                <label for="preco">Preço</label>
                <input class="box" type="number" name="preco" id="preco" placeholder="Preço" step="0.010" maxlength="10" min="0" max="9999999999" value="<?= $product['preco'] ?>">

                <select class="box" name="id_genero" required>
                    <option class="box" value="<?= $genero['id_genero'] ?>">Gênero</option>
                    <?php foreach ($genero as $genero): ?>
                        <option value="<?= $categoria['id_genero'] ?>"><?= $genero['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input class="btn" name="update" type="submit" value="Atualizar">
            </form>
        
        </div>
        
            <div class="box">
                <h1 class="heading">Editar Gênero</h1>
                <?php foreach ($generos as $genero): ?>
                <form method="POST">
                    <input class="box" type="hidden" name="id" value="<?= $genero['id_genero'] ?>">

                    <label for="livro">Gênero</label>
                    <input class="box" type="text" name="nome" id="nome" placeholder="Nome" value="<?= $genero['nome'] ?>">
                    <input class="btn" name="update_genero" type="submit" value="Atualizar">
                    <?php endforeach; ?>
                </form>
            </div>
    </section>

</body>

</html>
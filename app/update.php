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
        <?php if ($productToEdit): ?>
            <div class="box">
                <h1 class="heading">Editar Produto</h1>
                <form method="POST">
                    <input class="box" type="hidden" name="id" value="<?= $productToEdit['id'] ?>">

                    <label for="livro">Livro</label>
                    <input class="box" type="text" name="livro" id="livro" placeholder="Livro" value="<?= $productToEdit['livro'] ?>">

                    <label for="autor">Autor</label>
                    <input class="box" type="text" name="autor" id="autor" placeholder="Autor" value="<?= $productToEdit['autor'] ?>">

                    <label for="quantidade">Quantidade</label>
                    <input class="box" type="number" name="quantidade" id="quantidade" placeholder="Quantidade" value="<?= $productToEdit['quantidade'] ?>">

                    <label for="preco">Preço</label>
                    <input class="box" type="number" name="preco" id="preco" placeholder="Preço" step="0.010" maxlength="10" min="0" max="9999999999" value="<?= $productToEdit['preco'] ?>">

                    <select class="box" name="id_genero" required>
                        <option class="box" value="">Selecione o Gênero</option>
                        <?php foreach ($generos as $genero): ?>
                            <option value="<?= $genero['id_genero'] ?>" <?= ($genero['id_genero'] == $productToEdit['id_genero']) ? 'selected' : '' ?>>
                                <?= $genero['nome'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input class="btn" name="update" type="submit" value="Atualizar">
                </form>
            </div>
        <?php endif; ?>
        <?php if ($generoToEdit): ?>
            <div class="box">
                <h1 class="heading">Editar Gênero</h1>
                <form method="POST">
                    <input class="box" type="hidden" name="id" value="<?= $productToEdit['id_genero'] ?>">

                    <label for="livro">Livro</label>
                    <input class="box" type="text" name="nome" id="nome" placeholder="Nome" value="<?= $generoToEdit['nome'] ?>">
                    <input class="btn" name="update_genero" type="submit" value="Atualizar">
                </form>
            </div>
        <?php endif; ?>
    </section>

</body>

</html>
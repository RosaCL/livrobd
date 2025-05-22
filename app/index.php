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
            <h1 class="heading">Adicionar Gênero</h1>
            <form method="post">
                <label for="genero">Gênero</label>
                <input class="box" type="text" name="nome" id="nome" placeholder="Gênero">
                <input class="btn" type="submit" name="adicionar_genero" value="Enviar">
            </form>
        </div>

        <div class="box">
            <h1 class="heading">Adicionar Produto</h1>
            <form method="post">
                <label for="livro">Livro</label>
                <input class="box" type="text" name="livro" id="livro" placeholder="Livro">

                <label for="autor">Autor</label>
                <input class="box" type="text" name="autor" id="autor" placeholder="Autor">

                <label for="quantidade">Quantidade</label>
                <input class="box" type="number" name="quantidade" id="quantidade" placeholder="Quantidade" required>

                <label for="preco">Preço</label>
                <input class="box" type="number" name="preco" id="preco" placeholder="Preço" step="0.010" required maxlength="10" min="0" max="9999999999" required>

                <select class="box" name="id_genero" required>
                    <option class="box" value="<?= $genero['id_genero'] ?>">Gênero</option>
                    <?php foreach ($generos as $genero): ?>
                        <option value="<?= $genero['id_genero'] ?>"><?= $genero['nome'] ?></option>
                    <?php endforeach; ?>
                </select>

                <input class="btn" type="submit" name="adicionar" value="Enviar">
            </form>
        </div> 



    </section>
    <section class="product" id="product">
        <div class="box">

            <form method="get">
                <select name="filtro" class="box" id="filtragem" onchange="this.form.submit()">
                    <option class="box" value="">Escolha a filtragem: </option>
                    <option class="box" value="crescente">Crescente de nome (A-Z)</option>
                    <option class="box" value="decrescente">Decrescente de nome(Z-A)</option>
                    <option class="box" value="crescente_quantidade">Crescente de quantidade(↑)</option>
                    <option class="box" value="decrescente_quantidade">Decrescente de quantidade (↓)</option>
                    <option class="box" value="id">ID</option>
                </select>
            </form>
        </div>
        <div class="box">
            <h2>Produtos Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Livro</th>
                    <th>Autor</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Gênero</th>
                    <th>Ações</th>

                </tr>
                <?php foreach ($produtos as $product): ?>
                    <tr>
                        <td><?= $product['id']; ?></td>
                        <td><?= ($product['quantidade'] <= 5 ? '⚠️🚨' : '') . htmlspecialchars($product['livro']); ?></td>
                        <td><?= $product['autor']; ?></td>
                        <td><?= $product['quantidade']; ?></td>
                        <td>R$<?= number_format($product['preco'], 2, ',', '.') ?></td>
                        <td><?= $product['genero']; ?></td>
                        <td><a class="btn" href="update.php">Editar</a><a class="delete-btn" href="?delete=<?= $product['id']; ?>" onclick="return confirm ('Tem certeza que deseja excluir?')">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>





            </table>
        </div>
        <div class="box">
            <h2>Gênero Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>


                </tr>
                <?php foreach ($generos as $genero): ?>
                    <tr>
                        <td><?= $genero['id_genero']; ?></td>
                        <td><?= $genero['nome']; ?></td>
                        <td><a class="btn" href="update.php">Editar</a><a class="delete-btn" href="?delete_genero=<?= $genero['id_genero']; ?>" onclick="return confirm ('Tem certeza que deseja excluir?')">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </section>

</body>

</html>
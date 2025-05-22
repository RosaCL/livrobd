<?php
include ('/laragon/www/livrobd/api/config.php');


//ADICIONAR
if ($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['adicionar'])){
    if(!empty($_POST['livro'])
    && !empty ($_POST['autor'])
    && !empty ($_POST['quantidade'])
    && !empty($_POST['preco'])
    && !empty($_POST['id_genero'])){
        $stmt = $pdo->prepare("INSERT INTO produto (livro, autor, quantidade , preco, id_genero) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$_POST['livro'], 
        $_POST['autor'], 
        $_POST['quantidade'],
        $_POST['preco'],
        $_POST['id_genero']]);
        header("Location: index.php");
        exit();
    }
}





//UPDATE

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
    $stmt = $pdo->prepare("UPDATE produto SET livro = ?, autor = ?, quantidade = ?, preco = ?, id_genero = ? WHERE id = ?");
    ($stmt->execute([$_POST[ 'livro'], $_POST ['autor'], $_POST ['quantidade'], $_POST ['preco'], $_POST ['id_genero'], $_POST ['id']]));
    header("Location: index.php");
    exit();
}



//DELETE
if (isset($_GET['delete'])){
    $stmt=$pdo->prepare("DELETE FROM produto WHERE id=?");
    $stmt->execute([$_GET['delete']]);
    header("Location: index.php");
    exit();    
}



//SELEÇÃO
$order = "product.livro ASC";
if(isset($_GET['filtro'])){
    switch ($_GET['filtro']){
        case 'crescente':
            $order = "product.livro ASC";
            break;
        case 'decrescente':
            $order = "product.livro DESC";
            break;
        case 'crescente_quantidade':
            $order = "product.quantidade ASC";
            break;
        case 'decrescente_quantidade':
            $order = "product.quantidade DESC";
            break;
        case 'id':
            $order = "product.id ASC";
            break;
    }
}

$produtos = $pdo->query("SELECT product.*, gender.nome AS genero FROM produto product JOIN genero gender ON product.id_genero = gender.id_genero ORDER BY $order")->fetchAll(PDO::FETCH_ASSOC);

?>
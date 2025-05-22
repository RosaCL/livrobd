<?php
include ('/laragon/www/livrobd/api/config.php');



if ($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['adicionar_genero'])){
    if(!empty($_POST['nome'])){
        $stmt = $pdo->prepare("INSERT INTO genero (nome) VALUES (?)");
        $stmt->execute([$_POST['nome']]);
        header("Location: index.php");
        exit();
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_genero'])){
    $stmt = $pdo->prepare("UPDATE genero SET nome = ? WHERE id_genero = ?");
    ($stmt->execute([$_POST[ 'nome'], $_POST ['id_genero']]));
    header("Location: index.php");
    exit();
}

if (isset($_GET['delete_genero'])){
    $stmt=$pdo->prepare("DELETE FROM genero WHERE id_genero=?");
    $stmt->execute([$_GET['delete_genero']]);
    header("Location: index.php");
    exit();    
}

$generos = $pdo->query("SELECT * FROM genero")->fetchAll(PDO::FETCH_ASSOC);






?>
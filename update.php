<?php
include('config.php');

$id = $_GET ['id'];
$livro = $_POST ['livro'];
$autor = $_POST ['autor'];
$genero = $_POST ['genero'];
$ano = $_POST ['ano'];

$sql="UPDATE registro SET livro=?, autor=?, genero=?, ano=? WHERE id=?";

$stmt=$conn->prepare($sql);
$stmt->bind_param("sssii", $livro, $autor, $genero, $ano, $id);

if($stmt->execute()){
    header("Location: index.php");
    exit();
}else{
    echo "Erro ao inserir: " . $conn->error;
}

?>
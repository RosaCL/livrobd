<?php
include ('config.php');

$livro=$_POST['livro'];
$autor=$_POST['autor'];
$genero=$_POST['genero'];
$ano=$_POST['ano'];

$sql="INSERT INTO registro (`livro`,`autor`, `genero`,`ano`) VALUES (?,?,?,?) ";
$stmt=$conn->prepare($sql);
$stmt->bind_param("sssi", $livro, $autor, $genero, $ano);

if($stmt->execute()){
    header("Location: index.php");
    exit();
}else{
    echo "Erro ao inserir: " . $conn->error;
}




?>
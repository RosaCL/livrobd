<?php
include('config.php');

$id=$_GET['id'];

$sql="DELETE FROM registro WHERE id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()){
    header("Location:index.php");
    exit();
}else{
    echo "Erro ao excluir:" . $conn->error;
}

?>
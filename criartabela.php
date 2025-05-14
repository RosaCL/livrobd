<?php
include('config.php');

$q="CREATE TABLE registro (id int AUTO_INCREMENT PRIMARY KEY, livro VARCHAR (255) NOT NULL, autor VARCHAR (255) NOT NULL, genero VARCHAR (255) NOT NULL, ano int NOT NULL)";
$conn->query($q);
$conn->close();


?>
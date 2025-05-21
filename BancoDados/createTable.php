<?php
include('/laragon/www/livrobd/api/config.php');


$pdo->exec("CREATE TABLE IF NOT EXISTS genero(
id_genero INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR (250) NOT NULL);
");

$pdo->exec("CREATE TABLE IF NOT EXISTS produto (
id INT PRIMARY KEY AUTO_INCREMENT,
livro VARCHAR (250) NOT NULL,
autor VARCHAR (250) NOT NULL,
quantidade INT NOT NULL,
preco DECIMAL(10, 2) NOT NULL,
id_genero INT NOT NULL,
FOREIGN KEY (id_genero) REFERENCES genero(id_genero)
)");


?>
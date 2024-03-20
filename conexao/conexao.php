<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'db_invisibilidades');

$conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('ERRO DE CONEXÃO!');
?>
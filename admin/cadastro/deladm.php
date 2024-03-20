<?php
include("../../conexao/conexao.php");

$id = intval($_GET['deletar']);
$sql_query = "SELECT * FROM administradores WHERE id = '$id'";

if(mysqli_query($conn, $sql_query)){
    $deletar = mysqli_query($conn, "DELETE FROM administradores WHERE id = '$id'");
}

mysqli_close($conn);
header("Location: pag_cadastro.php");
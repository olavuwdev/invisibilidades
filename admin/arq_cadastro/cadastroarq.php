<?php
include("../../conexao/conexao.php");
session_start();

$sql = "SELECT count(*) as total FROM arquivos where titulo='{$_POST['titulo']}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['arq_existente'] = true;
    header('Location: pag_cadastro.php');
    exit;
}else{


    if(isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];
        

        if($arquivo['error']){
            die("Falha no envio do arquivo :(");
        }

        $titulo = $_POST['titulo'];
        $pasta = "arquivos/";
        $nome_inicial = $arquivo['name'];
        $nome_novo = uniqid();
        $extensao = strtolower(pathinfo($nome_inicial, PATHINFO_EXTENSION));

        $path = $pasta . $nome_novo . "." . $extensao;
        $sucesso = move_uploaded_file($arquivo["tmp_name"], $pasta . $nome_novo . "." . $extensao);

        if($sucesso){
            $sql = "INSERT INTO arquivos(titulo, nome, path, data, tipo, adm) VALUES('$titulo', '$nome_novo', '$path', NOW(), '$extensao', '{$_SESSION['nome']}')";
            
            mysqli_query($conn, $sql);
        }
    }
}
mysqli_close($conn);
header('Location: pag_cadastro.php')
?>
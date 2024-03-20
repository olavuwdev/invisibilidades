<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title> Login/ Invisibilidades</title>
    <style>
        body{
            font-family: 'Montserrat';
            background-image: url("../../images/maesgrandes.png");
        }

        main{
            height:100%;
            width:100vw;
        }

        .form{
            background-color: rgba(0, 0, 0, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
        }

        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px; 
        }

        button{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 15px;
            color: white;
            font-size: 15px;

        }

        button:hover{
            background-color: deepskyblue;
            cursor: pointer;
        }

        html{
  scroll-behavior: smooth;
}

    </style>
</head>
<main>
<body>
    <center>
    <div class="form">
        <h3>Faça seu Login</h3>
        <form action="login.php" method="POST">
            <?php if(isset($_SESSION['not_autentic'])): ?>
            <div class="erro_autentic"><h4>ERRO DE AUTENTICAÇÃO</h4></div>
            <?php
                endif; 
                unset($_SESSION['not_autentic']);
            ?>
            <label for="login"></label>
            <input type="text" name="login" required="required" placeholder="Login">
            <br><br>
            <label for="senha"></label>
            <input type="password" name="senha" required="required" placeholder="Senha">
            <br><br>
            <button type="submit">Entrar</button>
            <br><br>
        </form>
    </div>
    </center>
</body>
</main>
</html>
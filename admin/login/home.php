<?php
include('autenticacao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="script.js" defer></script>
    <title>Sair/ Administrador</title>
    <link rel="stylesheet" href="../../style.css" />

    <style>
      *{
        font-weight: bold;
      }
      
        .navbar-links li a:hover {
      color: #fff;
      background-color: #2a006a;
      transition: 0.2s;
  }
        h2{
    font-family: "Montserrat";
    color: #2a006a;;
    font-size: 30px;
  }

  a{
    color: #2a006a;
  }


  footer{
    background-color: #191816 !important;
  }

  .footer-col .medias-socias a:hover{
      color: #191816 !important;
      background-color: white;
  }

  .h2-sair{
    margin-bottom: 60px;
    margin-left: 20px;
  }

  .h2-php{
    margin-top: 20px;
    margin-left: 20px;
  }

  .sair{
    margin-bottom: 300px;
    margin-left: 10px;
    width: 8rem;
    height: 3rem;
    color: dodgerblue;
    font-family: 'Montserrat'
  }

  .sair:hover{
    color:deepskyblue;

  }

  html{
  scroll-behavior: smooth;
}

    </style>
  </head>
<body>
    <!--HTML DA NAVBAR-->
    <nav class="navbar" id="navbar">
        <a href="home.php"><img class="brand-logo" alt="Logo do site, selecione para ir à página de logout" src=../../images/invisibilidadeshoriz.png></a>
        <div class="navbar-links">
          <ul>
            <li><a href="../arq_cadastro/pag_cadastro.php">Arquivos</a></li>
            <li><a href="../cadastro/pag_cadastro.php">Administradores</a></li>
            <li><a href="home.php">Sair</a></li>
          </ul>
        </div>
      </nav>
    <main>
      <div id="sair_text">
<div class= 'h2-php'><h2><?php echo 'Olá, '.$_SESSION['nome'], '.'; ?></h2></div>
<div class= 'h2-sair'>
<h2>pressione "Sair" para se desconectar. </h2>
</div>
</div>
<div class= 'sair'> <h2><a class="sair" href="logout.php" aria-describedby="sair_text">Sair</a></h2> </div>
    </main>
    <footer>
        <div class="container-footer">
            <div class="row-footer">
                <!-- footer col-->
                <div class="footer-col" id="footer">
                    <h4>Navegação</h4>
                    <ul>
                        <li><a href="../arq_cadastro/pag_cadastro.php"> Arquivos </a></li>
                        <li><a href="../cadastro/pag_cadastro.php"> Administradores </a></li>
                        <li><a href="#navbar"> Sair</a></li>
                    </ul>
                </div>
                <!--end footer col-->
                <!-- footer col-->
                <div class="footer-col">
                    <h4>Informação</h4>
                    <ul>
                    <li><a href="https://www.gov.br/governodigital/pt-br/acessibilidade-digital/eMAGv31.pdf ">e-MAG</a></li>
                        <li><a href="https://www.flaticon.com/packs/files-8">ícones dos arquivos</a></li>
                    </ul>
                </div>
                <!--end footer col-->
                <!-- footer col-->
                <div class="footer-col">
                   <h4>Contato</h4>
                   <ul>
                    <div class="medias-socias">
                        <a href="#">Facebook</a>
                        <a href="#">Instagram</a>
                        <a href="#">Twitter</a>
                        <a href="#">Linkedin</a>
                  </ul>
                    </div>
                 <div class="footer-col">
                  <a href="#navbar"> <div class= "footer-col-img"><img alt="Logo do site, selecione para ir à barra de navegação" src= "../../images/logo-verticalpx.png"> </a>
                </div>
                <!--end footer col-->
            </div>
        </div>
    </footer>

</body>
</html>
<?php
include('../login/autenticacao.php');
include("../../conexao/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    
    
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="../../script.js" defer></script>
    <title>Administradores/ Administrador</title>
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
    a{
        color:#2a006a;
    }

        .div_adm{
    background-color: #f7c820;
    border-radius: 15px;
    padding: 15px;
    height: 8rem;
    width: 40rem;
    text-align: center;
    position: relative;
    white-space: nowrap;
    overflow: hidden;
    font-family: 'Montserrat';
}

    
    footer{
    background-color: #191816 !important;
  }

    .footer-col .medias-socias a:hover{
      color: #191816 !important;
      background-color: white;
  }

  h3{
    font-family: 'Montserrat';
    color: #2a006a;
    padding: 20px;
  }

  .adms{
    color:#2a006a;
    font-family: 'Montserrat';
    font-size: 20px;
  }
  
.deletar{
    padding-bottom: 50px;
    padding-top: 10px;
}

.gerenciar_adm{
    padding: 25px;
}

label{
    font-family: 'Montserrat';
    color:#2a006a;
    font-size: 20px;

}

button{
    font-size: 18px;
    font-family: 'Montserrat';
}

button:hover{
    cursor:pointer;
}
.nome{
    font-family: 'Montserrat';
    position: relative;
    top: 2rem;
}



.vermais{
    margin-bottom: 5rem;
  }

  @media(max-width: 760px){

.nome{
    position:relative;
    right: 6rem;
}
}

html{
  scroll-behavior: smooth;
}

.irao_{
    font-size: 15px;
    background-color: #f7c820;
    padding: 25px;
    text-decoration: none;
  }

  .irao_:hover{
    background-color: #2a006a;
    color: white;
    transition: 0.2s;
  }
    </style>
</head>
<body>
    <!--HTML DA NAVBAR-->
    <nav class="navbar" id="navbar">
        <a href="../login/home.php">  <img class="brand-logo" alt="Logo do site, selecione para ir à página de logout" src= ../../images/invisibilidadeshoriz.png> </a>
        <div class="navbar-links">
          <ul>
            <li><a href="../arq_cadastro/pag_cadastro.php">Arquivos</a></li>
            <li><a href="pag_cadastro.php">Administradores</a></li>
            <li><a href="../login/home.php">Sair</a></li>
          </ul>
        </div>
      </nav>
    <center>
    <br> <br> <br>
  <a class="irao_"href="#ir ao inicio" id="ir ao final"> IR AO FINAL DA PÁGINA </a>
  <br> <br>
    <div class="form">
        <h3 id="cadastre">Cadastre um novo administrador</h3>
        <form action="cadastro.php" method="POST">
                <?php
                    if(isset($_SESSION['confirm_cadastro'])):
                ?>
                <div class="confirm_cadastro">CADASTRO CONCLUÍDO!</div>
                <?php
                    endif;
                    unset($_SESSION['confirm_cadastro']);
                ?>

                <?php
                    if(isset($_SESSION['usuario_existente'])):
                ?>
                <div class="erro_autentic"><h4>ESTE USUÁRIO JÁ EXISTE! TENTE OUTRO.</h4></div>
                <?php
                    endif;
                    unset($_SESSION['usuario_existente']);
                ?>
                <label for="nome" id="nome">Nome: </label>
                <input type="nome" name="nome" required="required" aria-describedby= "cadastre nome">
                <br><br>
                <label for="login" id="login">Login: </label>
                <input type="text" name="login" required="required" aria-describedby="cadastre login">
                <br><br>
                <label for="senha" id="senha">Senha: </label>
                <input type="password" name="senha" required="required" aria-describedby="cadastre senha">
                <br><br>
                <button type="submit">Cadastrar</button>
        </form>
    </div>
    <div class= "gerenciar_adm" id="gerenciar"><h3> Gerenciar administradores </h3></div>
    <?php 
    $sql = mysqli_query($conn, "SELECT id, nome FROM Administradores");
            while ($result = mysqli_fetch_assoc($sql)){ 
        ?>
        <div class="adms">
            <div class="div_adm">
            <div class="nome" id="nome<?php echo $result['id']; ?>"> Nome: <?php echo $result['nome'];?><br></div></div>
            <div class="deletar"><a onclick="janela_del2(this)" id="<?php echo $result['id']?>" aria-describedby="gerenciar nome<?php echo $result['id']; ?>" href="#">Deletar</a></div>
        </div>
        
        <?php 
            }
        mysqli_close($conn);
        ?>
        <br><br>
<a class="irao_" href="#navbar" id="ir ao inicio"> IR AO INÍCIO DA PÁGINA</a> <br> <br> <br> <br> 
    </center>
    <footer>
        <div class="container-footer">
            <div class="row-footer">
                <!-- footer col-->
                <div class="footer-col" id="footer">
                    <h4>Navegação</h4>
                    <ul>
                        <li><a href="../arq_cadastro/pag_cadastro.php"> Arquivos </a></li>
                        <li><a href="#navbar"> Administradores </a></li>
                        <li><a href="../login/home.php"> Sair</a></li>
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
                <div class="footer-col" id="contato">
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
                   <a href="#navbar"> <div class= "footer-col-img"><img alt="Logo do site, selecione para ir à barra de navegação" src= "../../images/logo-verticalpx.png"></a>
                </div>
                <!--end footer col-->
            </div>
        </div>
    </footer>
</body>

</html>
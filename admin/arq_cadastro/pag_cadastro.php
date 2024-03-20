<?php
include("../../conexao/conexao.php");
include('../login/autenticacao.php');

$n_max = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM arquivos"));

if(!isset($_GET['vermais'])){
  $n = 10;
}else{
  $n = $_GET['vermais'];
  if($n < $n_max){
    $n += 10;
  }

}

if((!isset($_GET['arqpesq']))&&(!isset($_GET['tipoarq']))){
  $sql_query = mysqli_query($conn, "SELECT * FROM arquivos LIMIT 0, {$n}") or die (mysqli_error($conn));
}

if(isset($_GET['arqpesq'])){
  $pesquisa = mysqli_real_escape_string($conn, $_GET['arqpesq']);
  if(isset($_GET['tipoarq2'])){
    $filtro2 = mysqli_real_escape_string($conn, $_GET['tipoarq2']);
    $sql_query = mysqli_query($conn, "SELECT * FROM arquivos WHERE tipo = '{$filtro2}' AND titulo like '%{$pesquisa}%' ") or die (mysqli_error($conn));
  }else{
    $sql_query = mysqli_query($conn, "SELECT * FROM arquivos WHERE titulo LIKE '%{$pesquisa}%'") or die (mysqli_error($conn));
  }
}

if(isset($_GET['tipoarq'])){
  $filtro = mysqli_real_escape_string($conn, $_GET['tipoarq']);
  if(isset($_GET['arqpesq2'])){
    $pesquisa2 = mysqli_real_escape_string($conn, $_GET['arqpesq2']);
    $sql_query = mysqli_query($conn, "SELECT * FROM arquivos WHERE tipo = '{$filtro}' AND titulo like '%{$pesquisa2}%' ") or die (mysqli_error($conn));
  }else{
    $sql_query = mysqli_query($conn, "SELECT * FROM arquivos WHERE tipo = '{$filtro}'") or die (mysqli_error($conn));
  }
  
  
}
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
    <title>Arquivos/ Administrador</title>
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

  table{
    width: 80%;
    height: 200px;
    margin-left: 5vw;
    margin-top: 50px;
    margin-bottom: 50px;
    background-color: white;
  }

  th{
    font-family: "Montserrat";
    color: #2a006a;;
    font-size: 20px; 
    padding: 15px;
  }

  .a-thead{
    font-family: "Montserrat";
    color: #2a006a;;
    font-size: 17px; 
  }

  .form{
    margin-left: 1vw;
    margin-top: 50px;
  }

  label{
    font-family: "Montserrat";
    color: #2a006a;;
    font-size: 20px;
    size: 40px;
    
  }

  h3{
    font-family: "Montserrat";
    color: #2a006a;;
    font-size: 20px;
  }

  footer{
    background-color: #191816 !important;
  }

  .content{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .footer-col .medias-socias a:hover{
      color: #191816 !important;
      background-color: white;
  }

  .div_arq{
    background-color: #f7c820;
    border-radius: 15px;
    padding: 15px;
    height: 8rem;
    width: 40rem;
    position: relative;
    overflow: hidden;


}

.titulo, .tipo{
  font-family: 'Montserrat';


}


  .data{
    font-family: 'Montserrat';
    font-size: 20px;
    color: #2a006a;
    padding-top: 25px;
  }
  
  .autor{
    font-family: 'Montserrat';
    font-size: 20px;
    color: #2a006a;
  }

  .opcoes{
    position: relative;
    bottom:11rem;
    left: 14rem;
    
  }
  a{
  color:#2a006a;
  }

  .a-thead-vis:hover, .a-thead-baix:hover{
    background-color:#2a006a;
    color: white;
    transition: 0.2s;
  }

  .a-thead-vis{
    font-size: 20px;
    position: relative;
    text-transform: none;
    font-family: 'Montserrat';
    text-decoration: none;
    padding: 10px;
  }
  .a-thead-baix{
    font-size: 20px;
    position: relative;
    text-transform: none;
    font-family: 'Montserrat';
    text-decoration: none;
    padding: 10px;
  }

  .caixa_data{
    padding-top: 0.4rem;
    padding-bottom: 4.5rem;
    font-size: 20px;

  }

  .logos{
    position: relative;
    right: 16rem;
    top: 0.5rem;
    width: 80px;
    height: 80px;
  }


  .caixa_titulo{
    position: relative;
    bottom: 4.5rem;
    left: 6rem;
    font-size: 20px;
    color:#2a006a;
    text-align: left;
  }

  input{
    font-size: 18px;
    font-family: 'Montserrat';
  }

  select{
    font-size: 18px;
    font-family: 'Montserrat';
  }
  
  button{
    font-size: 18px;
    font-family: 'Montserrat';
}

button:hover{
    cursor:pointer;
}


  @media (max-width: 1400px){
        .div_arq{
          width: 90vw;
          right: 0rem;
        }

        
        .content{
      margin-left: 0;
      margin-right: 0;
      background-image: url("images/maes.png");
      background-color: transparent;
      
    }
      .logos{
      height: 60px;
      width: 60px;
      top: 1.2rem;
      right: 35vw;

    }

    .opcoes{
      left: 32vw;
      bottom: 10rem;
    }


        .caixa_titulo{
      left: 15vw;
      bottom: 3rem;
    }

    }


      .content{
        background-color: transparent;
      }

       main{
    height: 100%;
    width: 100vw;
    overflow:hidden;
    background-image: url("../../images/maesgrandes.png");
  }

    .sem-resultados{
      margin-bottom: 130px;

    }

  .vermais{
    margin-bottom: 5rem;
  }

  html{
  scroll-behavior: smooth;
}

@media (max-width: 700px){
      .div_arq{
          width: 100vw;
        }

        .logos{
      right: 40vw;

    }
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
        <a href="../login/home.php"><img class="brand-logo" alt="Logo do site, selecione para ir à página de logout" src=../../images/invisibilidadeshoriz.png></a>
        <div class="navbar-links">
          <ul>
            <li><a href="pag_cadastro.php">Arquivos</a></li>
            <li><a href="../cadastro/pag_cadastro.php">Administradores</a></li>
            <li><a href="../login/home.php">Sair</a></li>
          </ul>
        </div>
      </nav>
    <main>
    <div class="content">
    <br> <br> <br>
  <a class="irao_"href="#ir ao inicio" id="ir ao final"> IR AO FINAL DA PÁGINA </a>
  <br> <br>
    <div class="form">
        <h3>Cadastre um arquivo</h3>
        <br>
        <?php
                    if(isset($_SESSION['arq_existente'])):
                ?>
                <div class="erro_autentic"><h4>ESTE TÍTULO JÁ EXISTE! TENTE OUTRO.</h4></div>
                <?php
                    endif;
                    unset($_SESSION['arq_existente']);
                ?>
        <form action="cadastroarq.php" enctype="multipart/form-data" method="POST">
                <label for="titulo" id="informe">Informe o título do arquivo: </label>
                <input type="text" name="titulo" required="required" aria-describedby="informe">
                <br><br>
                <label for="arquivo">Arquivo: </label>
                <input type="file" name="arquivo">
                <br><br>
                <button type="submit">Cadastrar</button>
        </form>
        <br><br><br>
    </div>
    <?php
    if((!isset($_GET['arqpesq']))||(!isset($_GET['tipoarq']))||(!isset($_GET['tipoarq2']))||(!isset($_GET['arqpesq2']))){
      $url = "pag_cadastro.php";
    }else{
      $url = null;
    }
    ?>
    <form action="<?php echo $url;?>">
      <input name="arqpesq" type="text" placeholder="Pesquise arquivos aqui" required>
      <?php
      if(isset($_GET['tipoarq'])){
      ?>
      <input type="hidden" name="tipoarq2" value="<?php echo $_GET['tipoarq']; ?>"></input>
      <?php
      }elseif(isset($_GET['tipoarq2'])){
      ?>
      <input type="hidden" name="tipoarq2" value="<?php echo $_GET['tipoarq2']; ?>"></input>
      <?php
      }
      ?>
      <input type="submit" value="Buscar"></input>
    </form>
    <?php
     if(isset($_GET['arqpesq']) || isset($_GET['arqpesq2'])){
      if(isset($_GET['tipoarq'])){
        $link = "pag_cadastro.php?tipoarq=".$_GET['tipoarq'];
      }elseif(isset($_GET['tipoarq2'])){
        $link = "pag_cadastro.php?tipoarq=".$_GET['tipoarq2'];
      }else{
        $link = "pag_cadastro.php";
      }
    ?>
    <a href="<?php echo $link?>">Remover busca</a>
    <?php
    }
    ?>
<br><br>
<form action="<?php echo $url;?>">
    <div class= "submit"><label for="tipoarq">Filtro: </label></div>
    <select name="tipoarq" required>
        <option value="">Selecione um tipo de arquivo</option>
        <option value="jpg">Imagem JPG</option>
        <option value="png">Imagem PNG</option>
        <option value="docx">Documento Word</option>
        <option value="pdf">Arquivo PDF</option>
        <option value="pptx">Arquivo PowerPoint</option>
        <option value="zip">Arquivo Zip</option>
    </select>
    <?php
    if(isset($_GET['arqpesq'])){
    ?>
    <input type="hidden" name="arqpesq2" value="<?php echo $_GET['arqpesq']; ?>"></input>
    <?php
    }elseif(isset($_GET['arqpesq2'])){
    ?>
      <input type="hidden" name="arqpesq2" value="<?php echo $_GET['arqpesq2']; ?>"></input>
    <?php
    }
    ?>
    <input type="submit" value="Filtrar"></input>
</form>
<?php
    if(isset($_GET['tipoarq']) || isset($_GET['tipoarq2'])){
      if(isset($_GET['arqpesq'])){
        $link = "pag_cadastro.php?arqpesq=".$_GET['arqpesq'];
      }elseif(isset($_GET['arqpesq2'])){
        $link = "pag_cadastro.php?arqpesq=".$_GET['arqpesq2'];
      }else{
        $link = "pag_cadastro.php";
      }
    ?>

    <a href="<?php echo $link?>">Remover filtro</a>
    <?php
    }
    ?>

<br><br>

<?php
  if(mysqli_num_rows($sql_query) > 0){
    while($arq = mysqli_fetch_assoc($sql_query)){
    ?>
    
    <div class="div_arq" id="arq<?php echo $arq['id']; ?>">
    <?php
    if($arq['tipo'] == "jpg"){
      $tipo = "jpg.png";
    }elseif($arq['tipo'] == "png"){
      $tipo = "png.png";
    }elseif($arq['tipo'] == "pdf"){
      $tipo = "pdf.png";
    }elseif($arq['tipo'] == "pptx"){
      $tipo = "ppt.png";
    }elseif($arq['tipo'] == "zip"){
      $tipo = "zip.png";
    }elseif($arq['tipo'] == "docx"){
      $tipo = "file.png";
    }else{
      $tipo = "file.png";
    }
    ?>
   <img class= "logos" src= "../../images/icones/<?php echo $tipo; ?>">
   <div class="caixa_titulo" id="info<?php echo $arq['id']; ?>">
      <div class= "titulo"> título: <?php echo $arq['titulo']; ?></div><br>
      <div class= "tipo"> Tipo: <?php echo $arq['tipo'];?></div><br>
      </div>
      <br>
      <div class= "opcoes">
      <a onclick="janela_vis2(this)" tabindex="0" id="<?php echo $arq['path'] ?>" class= "a-thead-vis" aria-describedby="info<?php echo $arq['id']; ?>" href="#">Visualizar</a><br><br><a class= "a-thead-baix" aria-describedby="info<?php echo $arq['id']; ?>"<?php echo "target='_blank' href='{$arq['path']}'";?> download>Baixar</a> <br><br> 
      </div>
    </div>
    <div class= "caixa_data">
    <a onclick="janela_del(this)" id="<?php echo $arq['id']; ?>" href="#" aria-describedby="info<?php echo $arq['id']; ?> data<?php echo $arq['id']; ?> autor<?php echo $arq['id']; ?>">Deletar</a>

      
    <div class= "data" id="data<?php echo $arq['id']; ?>"> Data da publicação: <?php echo date("d/m/Y H:i", strtotime($arq['data'])); ?></div><br>
      <div class= "autor" id="autor<?php echo $arq['id']; ?>"> Autor da postagem: <?php echo $arq['adm']; ?></div>
    </div>

    <?php
    $ultarq = $arq['id'];
      }
    } else{ ?>
      <div class="sem-resultados"><h2>Sem resultados</h2></div>
    <?php }
  mysqli_close($conn);
?>
<br><br>
<?php
if((!isset($_GET['arqpesq']))&&(!isset($_GET['tipoarq']))&&($n < $n_max)){
?>
<div class="vermais"><a href="pag_cadastro.php?vermais=<?php echo $n;?>#arq<?php echo $ultarq; ?>">VER MAIS</a></div>
<?php 
}
?>
<br><br>
<a class="irao_" href="#navbar" id="ir ao inicio"> IR AO INÍCIO DA PÁGINA</a> <br> <br> <br> <br> 
</div>
</main>

<footer>
        <div class="container-footer">
            <div class="row-footer">
                <!-- footer col-->
                <div class="footer-col" id="footer">
                    <h4>Navegação</h4>
                    <ul>
                        <li><a href="#navbar"> Arquivos </a></li>
                        <li><a href="../cadastro/pag_cadastro.php"> Administradores </a></li>
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
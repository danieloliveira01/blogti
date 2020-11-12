<?php

include ("model/posts.php");
include_once 'model/conexaomodel.php';
include_once 'view/includes/mensagem.php';
//include_once 'view/includes/header.php';
$_SESSION['mensagem'] = "Logoff com sucesso!";
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');


$post = new Posts();

echo "<link rel=”stylesheet” type=”text/css” href=”css/custom” />"
?>
<!DOCTYPE html>
  <html>
    <head>
       <link hel="stylesheet" href="css/custom.css">

      <!--Import Google Icon Font-->
        <link rel="stylesheet" type="text/css" href="/styles.css" media="screen" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <title>DNService</title>
      <!--Import materialize.css-->
       <!-- Compiled and minified CSS --> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
         <link hel="stylesheet" href="css/custom.css">
      <!--Let browser know website is optimized for mobile-->
    </head>
    <body>

      <!-- Menu -->

      <nav class="blue">

    <div class="container ">
      <div class="nav-wrapper blue">
      <a href="#!" class="brand-logo"><i class="material-icons">computer
</i>Blog TI</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="./">Home</a></li>
        <li><a href="view/perguntas.php">Perguntas</a></li>
        <li><a href="view/noticias.php">Notícias</a></li>
        <li><a href="view/dicas.php">Dicas</a></li>
       
        <li><a href="view/login.php"><i class="material-icons">account_circle</i></a></li>
      </ul>



    </div>



  </nav>
<nav class="blue">
    <div class="nav-wrapper">
      <form  action="controller/controlador.php" method="POST">
        <div class="input-field">
          <input id="search" type="search" name="search" placeholder="pesquise parte do título..."  required>
          <label class="label-icon" for="search" name="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>    

  <ul class="sidenav" id="mobile-demo">
    <li><a href="./">Home</a></li>
        <li><a href="view/perguntas.php">Perguntas</a></li>
        <li><a href="view/noticias.php">Notícias</a></li>
        <li><a href="view/dicas.php">Dicas</a></li>
        <nav class="blue">
    <div class="nav-wrapper">
      <nav class="blue">
    <div class="nav-wrapper">
      <form  action="../controller/controlador.php" method="POST">
        <div class="input-field">
          <input id="search" type="search" placeholder="pesquise parte do título..."  required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>    
    </div>
  </nav>    
        <li><a href="view/login.php"><i class="material-icons">account_circle</i></a></li>
  </ul>
      

    </div>
    



      
     <div class="slider">
    <ul class="slides">
      <li>
        <img src="http://www.ibes.med.br/wp-content/uploads/2018/11/sistema-1-1110x550.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>O mundo é movido pela tecnologia!</h3>
          <h5 class="light grey-text text-lighten-3">Cada dia que passa, avançamos.</h5>
        </div>
      </li>
      <li>
        <img src="https://saudebusiness.com/wp-content/uploads/2017/09/Cloud-computing-.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3>Computação cognitiva na Saúde</h3>
          <h5 class="light grey-text text-lighten-3">a revolução da inteligência artificial.</h5>
        </div>
      </li>
      <li>
        <img src="https://unisagrado.edu.br/custom/2008/uploads/2020_jessica/capa-ciencia-da-computacao.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3>Segurança da Informação</h3>
          <h5 class="light grey-text text-lighten-3">Para se defender, é necessário conhecer o atacante..</h5>
        </div>
      </li>
      <li>
        <img src="https://www.anchieta.br/hubfs/ci%C3%AAncia%20da%20computa%C3%A7%C3%A3o%202.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>Inteligencia Artificial</h3>
          <h5 class="light grey-text text-lighten-3">O futuro da tecnologia</h5>
        </div>
      </li>
    </ul>
  </div>
    
<!-- Conteudo -->
<div class="row container">
    <section class=" col s12 m6 l12">

      <h5 class="light">Perguntas mais comentadas</h5>
           <a href="view/login.php" class="waves-effect waves-light btn" style="float: right;"><i class="material-icons right">add_circle</i>Nova pergunta</a>
           <br/>
           <br/>
      <?php
          $Postagem = $post->ListaPerguntaComentadas();

          
          while($conteudo = mysqli_fetch_array($Postagem)):
            $totalcoments = $post->totalComentario($conteudo['id_post']);
          ?>
            <article class="col s12 l6 xl4">
            <div class="card blue-grey darken-1" >
            <div class="card-content white-text">
              <span class="card-title"style="height: 60px; overflow: hidden;"><?php echo $conteudo['titulo'] ?></span>
              <div style="height: 110px; overflow: hidden;">
                <span>💬<?php echo ($totalcoments)?> </span>
               <p><?php echo $conteudo['post'] ?></p>
              </div>
            </div>
            <div class="card-action">
              <a href="view/postitem.php?id=<?php echo $conteudo['id_post'];?>">Ver mais</a>
              
            </div>
          </div>
          </article>

      <?php endwhile;?>


    </section>

    
</div>

  
<?php
include_once 'view/includes/footer.php'; //footer
?>


 
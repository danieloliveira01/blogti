<?php
session_start();
include_once 'includes/headeruser.php';
//include_once 'view/includes/header.php';


$post = new Posts();

echo "<link rel=”stylesheet” type=”text/css” href=”css/custom” />"
?>


      
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
           <a href="cadastrar.php" class="waves-effect waves-light btn" style="float: right;"><i class="material-icons right">add_circle</i>Nova pergunta</a>
           <br/>
           <br/>
           <br/>
      <?php
          $Postagem = $post->ListaPerguntaComentadas();
          while($conteudo = mysqli_fetch_array($Postagem)):
          $totalcoments = $post->totalComentario($conteudo['id_post']);
          ?>
            <article class="col s12 l6 xl4">
            <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title" style="height: 60px; overflow: hidden;"><?php echo $conteudo['titulo'] ?></span>
               <div style="height: 110px; overflow: hidden;">
                  <span>💬<?php echo ($totalcoments)?> </span>
              <p><?php echo $conteudo['post'] ?></p>
            </div>
            </div>
            <div class="card-action">
               <a href="postitemuser.php?id=<?php echo $conteudo['id_post'];?>">Ver mais</a>
              
            </div>
          </div>
          </article>

      <?php endwhile;?>


    </section>

    
</div>

  
<?php
include_once 'includes/footer.php'; //footer
?>


 
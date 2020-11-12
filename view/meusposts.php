<?php
session_start();

if(isset($_SESSION['login']))
{

  $usuario = $_SESSION['login'];

  include_once 'includes/headeruser.php'; 
}
else{
  session_unset();
  $usuario = null;
   include_once 'includes/header.php'; 
}


include_once '../model/conexaomodel.php';



$post = new Posts();
  $nome_usuario = $usuario['nome'];
  $Postagem = $post->ListaPostUsuario($nome_usuario);

?>

<!-- Conteudo -->
<!-- Conteudo -->
<div class="row container">
  <h5 class="light">Todos os posts de <?php echo $nome_usuario?></h5>
  <a href="cadastrar.php" class="waves-effect waves-light btn" style="float: right;"><i class="material-icons right">add_circle</i>Novo Post</a>
    <section class=" col s12 m6 l12">

         
      <?php
        
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
              <?php if($usuario != null){ ?>
              <a href="postitemuser.php?id=<?php echo $conteudo['id_post'];?>">Ver mais</a>
              <?php } else {?>
                 <a href="postitem.php?id=<?php echo $conteudo['id_post'];?>">Ver mais</a>
                <?php } ?>
            </div>
          </div>
          </article>

      <?php endwhile;?>
  </section>
</div>





<?php
include_once 'includes/footer.php'; //footer
?>

<?php
include_once 'includes/header.php'; //header

include_once '../model/conexaomodel.php';
include_once 'includes/mensagem.php';
include_once '../model/posts.php';

$post = new Posts();



//BUSCANDO POST....
 if(isset($_GET['id'])):
      $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
      $id = mysqli_escape_string($objetdoConexao, $_GET['id']);
      $conteudo = $post->ListaConteudo($id);
       $totalcoments = $post->totalComentario($id);

    $_SESSION['id_post'] = $id;

  endif
?>
<!-- Conteudo -->

<div class="row container">
    <section class=" col s12 m6 l12">
      
        
        <h4 class="truncate"><?php echo $conteudo['titulo']?></h4>
        <div class="row">
          <p class="light"><i class="material-icons prefix">face</i> <?php echo $conteudo['usuario']?></p>
          <?php 
          $date = $conteudo['data'];
          $dataHora = date('d/m/Y H:i:s', strtotime($date));?>
        <p class="light" ><i class="material-icons prefix">date_range</i><?php echo $dataHora?></p>
        
        
        <p class="flow-text"><?php echo $conteudo['post']?></p>
      
        <hr/>
        <h5 class="light"> 
         
       <?php  echo $totalcoments?> Comentários
        
      </h5>

       <?php

 $coments = $post->ListaComentarios($id);
           
            while($comentarios = mysqli_fetch_array($coments)):
?>
<div class="row">
                
              <article class="col s12 l6 xl5">

             <div class=" col s12 m6 l12" style="border: 1px solid #ccc; width: 600px">
                <i class="material-icons prefix">face</i> <?php echo $comentarios['nome'] ?> <br/>
                 <span class="light">Comentário</span>
                <div class="input-field col s12">
                  <textarea id="textarea2" onkeydown="autoResize()" disabled style="color: black" class="materialize-textarea"><?php echo strval( $comentarios['mensagem'])?></textarea>
                   <?php 
                   $date = $comentarios['dataHora'];
                    $dataHora = date('d/m/Y H:i:s', strtotime($date));?>
                  <p><?php echo $dataHora ?> </p>
                    
                </div>

             </div>  
           </article>

      </div>
      <?php  endwhile;?>
       
      <hr/>

        <p>Para comentar, voce precisa estar logado.</p>
        <a href="login.php" class="btn green" type="submit" > Entrar</a>

	</section>
</div>


     
      

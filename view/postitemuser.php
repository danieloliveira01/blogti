<?php
session_start();
include_once 'includes/headeruser.php'; //header

include_once '../model/conexaomodel.php';
include_once 'includes/mensagem_aberto.php';


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
        <?php if($conteudo['usuario'] == $usuario['nome']){
        ?>
         <a href="editarpost.php?id=<?php echo $conteudo['id_post'];?>" >📝Alterar</a>
          <a href="#modal<?php echo $conteudo['id_post'];?>" class="modal-trigger" >❌Excluir</a>
          <?php if($conteudo['tipo_post_id'] == 2 && $conteudo['resolvido'] == 0){ ?>
            <br/>
            <br/>
          <a href="#modal3<?php echo $conteudo['id_post'];?>" class="modal-trigger" > 💬 Marcar como resolvido</a>

           <div id="modal3<?php echo $conteudo['id_post'];?>" class="modal">
            <div class="modal-content">
               <h4>Opa!</h4> 
                  <p>Marcar Pergunta como resolvida?</p>
            </div>
           <div class="modal-footer">
                                        

              <form action="../controller/controlador.php" method="POST">
                <input type="hidden" name="resolver" value="1"/>
                <input type="hidden" name="id_post" value="<?php echo $conteudo['id_post']?>"/>
                <input type="hidden" name="id_comentario" value="<?php echo $comentarios['id_comentario']?>"/>
                <button type="submit" name="resolverPost" class="btn green"> Sim, resolvido</button>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </form>

           </div>
        </div>


          <?php } else if($conteudo['tipo_post_id'] == 2 && $conteudo['resolvido'] == 1) {?>
            <br/>
            <br/>
            <a href="#modal4<?php echo $conteudo['id_post'];?>" class="modal-trigger" >✅ Reabrir pergunta</a>

           <div id="modal4<?php echo $conteudo['id_post'];?>" class="modal">
            <div class="modal-content">
               <h4>Opa!</h4> 
                  <p> Reabrir Pergunta ?</p>
            </div>
           <div class="modal-footer">
                                        

              <form action="../controller/controlador.php" method="POST">
                <input type="hidden" name="resolver" value="0"/>
                <input type="hidden" name="id_post" value="<?php echo $conteudo['id_post']?>"/>
                <input type="hidden" name="id_comentario" value="<?php echo $comentarios['id_comentario']?>"/>
                <button type="submit" name="resolverPost" class="btn green"> Reabrir pergunta</button>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </form>

           </div>
        </div>

      <?php }?>
         

           <!-- Modal Structure -->
          <div id="modal<?php echo $conteudo['id_post'];?>" class="modal">
            <div class="modal-content">
               <h4>Opa!</h4> 
                  <p>Tem certeza que deseja excluir este Post?</p>
            </div>
           <div class="modal-footer">
                                        

              <form action="../controller/controlador.php" method="POST">
                <input type="hidden" name="id_post" value="<?php echo $conteudo['id_post']?>"/>
                <input type="hidden" name="id_comentario" value="<?php echo $comentarios['id_comentario']?>"/>
                <button type="submit" name="deletarPost" class="btn red"> Sim, quero deletar</button>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </form>

           </div>
        </div>



        </div>
      <?php } ?>

        
        <p class="flow-text"><?php echo $conteudo['post']?></p>
      
        <hr/>
         <h5 class="light"> 
          <?php if($totalcoments == -1){?>
         0 comentários
          <?php } else {
        echo $totalcoments ?> Comentários
        <?php }?>
      </h5>
        <?php
          include_once 'coments.php'; //footer
        ?>
	</section>
</div>





<?php
include_once 'includes/footer.php'; //footer
?>

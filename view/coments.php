<?php


$id = $_SESSION['id_post'];
           $res = $post->ListaComentarios($id);
           
            while($comentarios = mysqli_fetch_array($res)):
            if($comentarios['nome'] == $usuario['nome']){


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
                     $dataHora = date('d/m/Y H:i:s', strtotime($date));
                  ?>
                  <p><?php echo $dataHora ?> </p>
                  <td><a href="#modal<?php echo $comentarios['id_comentario'];?>" class="btn-floating blue  modal-trigger"><i class="material-icons">edit</i></a></td>

                  <!-- modal editar -->
                  <!-- Modal Structure -->
                                    <div id="modal<?php echo $comentarios['id_comentario'];?>" class="modal">
                                      <div class="modal-content">
                                        <h4>Editar comentario</h4> 
                                         <form action="../controller/controlador.php" method="POST">
                                            <?php echo $usuario['nome'] ?>
                                            <div class="input-field col s12">
                                              <input type="hidden" name="id_comentario" value="<?php echo $comentarios['id_comentario']?>"/>
                                               <input type="hidden" name="id_post" value="<?php echo $conteudo['id_post']?>"/>
                                              <textarea id="comentario" name="comentario" class="materialize-textarea" data-length="400"><?php echo strval( $comentarios['mensagem']);?></textarea>
                                              <label for="textarea2">Comentário</label>
                                              <div class="modal-footer">
                                        
                                              
                                                  <input type="hidden" name="id" value="<?php echo $dados['id_cliente'];?>">
                                                  <button type="submit" name="alterarComentario" class="btn blue"> Alterar</button>
                                                  <a href="#!" class="modal-close waves-effect waves-red btn-flat">Cancelar</a>
                                              

                                              </div>
                                          
                                            </div>
                                          </form>
                                      </div>
                                      <
                                    </div>



                  <a href="#modal1<?php echo $comentarios['id_comentario'];?>" class="btn-floating red  modal-trigger"><i class="material-icons">delete</i></a>


                  <!-- Modal Structure -->
                                    <div id="modal1<?php echo $comentarios['id_comentario'];?>" class="modal">
                                      <div class="modal-content">
                                        <h4>Opa!</h4> 
                                        <p>Tem certeza que deseja excluir este comentário?</p>
                                      </div>
                                      <div class="modal-footer">
                                        

                                         <form action="../controller/controlador.php" method="POST">
                                           <input type="hidden" name="id_post" value="<?php echo $conteudo['id_post']?>"/>
                                            <input type="hidden" name="id_comentario" value="<?php echo $comentarios['id_comentario']?>"/>
                                            <button type="submit" name="deletarComentario" class="btn red"> Sim, quero deletar</button>
                                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                          </form>

                                      </div>
                                    </div>
                    
                </div>

             </div>  
            </article>
          </div>
           <?php } 
           else {

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
      <?php } endwhile;?>
       
      <hr/>

      <?php 

      if(empty($usuario)){ ?>
        <p>Para comentar, voce precisa estar logado.</p>
        <a href="login.php" class="modal-close waves-effect waves-green btn-flat">Entrar</a>

        <?php }?>

      <?php 

      if($conteudo['resolvido'] == 0){ ?>
       
       

      <article class="col s12 l6 xl5">
       <div class=" col s12 m6 l12" style="border: 1px solid #ccc; width: 600px">
        <form action="../controller/controlador.php" method="POST">
          <i class="material-icons prefix">face</i> <?php echo $usuario['nome'] ?>
          <div class="input-field col s12">
            <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']?>"/>
             <input type="hidden" name="id_post" value="<?php echo $conteudo['id_post']?>"/>
            <textarea id="textarea2" name="comentario" class="materialize-textarea" data-length="500"></textarea>
            <label for="textarea2">Comentário</label>
   
            <button class="btn waves-effect waves-light" type="submit" name="btn-comentar" >Comentar
              <i class="material-icons right">send</i>
            </button>
        
          </div>
        </form>
       </div>  
       


      </article>
       <?php } else{ ?>
        <div class="grid-example col s12"><span class="flow-text">✅ Pergunta resolvida</span></div>
      <?php }?>


         <!--JavaScript at end of body for optimized loading-->
    <script >
    function autoResize() {
        objTextArea = document.getElementById('txtTextArea');
        while (objTextArea.scrollHeight > objTextArea.offsetHeight) {
            objTextArea.rows += 1;
        }
        while (objTextArea.scrollHeight < objTextArea.offsetHeight) {
            objTextArea.rows -= 1;
        }
    }
</script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
       <script>

         $(document).ready(function() {
         $('input#input_text, textarea#textarea2').characterCounter();
        });
      M.AutoInit(); 
     </script>

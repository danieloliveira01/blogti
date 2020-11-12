<?php
session_start();
	include_once 'includes/headeruser.php';


$post = new Posts();
//BUSCANDO POST....
 if(isset($_GET['id'])):
      $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
      $id = mysqli_escape_string($objetdoConexao, $_GET['id']);
      $conteudo = $post->ListaConteudo($id);
      

    $_SESSION['id_post'] = $id;

  endif


?>





<div class="row container">
    
       <main>
		    <center>
		     <div class="container">
		        <div  class="z-depth-3  y-depth-3 x-depth-3 grey green-text lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px; margin-top: 100px; solid #EEE; width: 100%">
		        <div class="section"></div>
				<div class="section"><a href="#!" class="brand-logo"><i class="material-icons">computer</i><h5>EDITAR CONTEÚDO<h5></a></div>
		    
		        <div class="section"><i class="mdi-alert-error red-text"></i></div>
		      
		      	<div class='row'>
		      	<form action="../controller/controlador.php" method="POST">
   					<input type="hidden" value="<?php echo $conteudo['id_post'];?>" name="id_post">
		             <div class="input-field col s12">
		               <i class="material-icons prefix">collections_bookmark</i>
		                 <select name="tipo_post">
		               <option  value="<?php echo $conteudo['tipo_post_id'];?>"><?php echo $conteudo['tipo_post'];?></option>
		                <?php
			                $res = $post->ListaCategoria();
			                while($categoria = mysqli_fetch_array($res)) {?>
			                  <option value="<?php echo $categoria['id_categoria'];?>"><?php echo $categoria['descricao'];?></option><?php
		              		}
	            		  ?>
		              </select>
		                <label for="valor" >Tipo:</label>
		            </div>
		              <div class="input-field col s12">
		               <i class="material-icons prefix">mode_edit</i>
		                <input type="text" name="titulo" id="input_text" data-length="60" value="<?php echo $conteudo['titulo'];?>"> 
		                <label for="titulo" >Título: </label>
		            </div>
		              
		             
		             <div class="input-field col s12">
		               <i class="material-icons prefix">mode_edit</i>
		              <textarea name="descricao" id="textarea2" class="materialize-textarea" data-length="1000"> <?php echo $conteudo['post'];?></textarea> 
		              <label  for="icon_prefix2" >Descrição: </label>
		            </div>
		            
		            <div class="input-field col s12">
		               <i class="material-icons prefix">code</i>
		                 <select name="linguagem_programacao">
		                <option value="<?php echo $conteudo['linguagem_id'];?>"><?php echo $conteudo['linguagem'];?></option>
		                 <?php
			                $res = $post->ListaLinguagensP();
			                while($categoria = mysqli_fetch_array($res)) {?>
			                  <option value="<?php echo $categoria['id_linguagem'];?>"><?php echo $categoria['nome'];?></option><?php
		              		}
	            		  ?>
		              </select>
		                <label for="valor" >Linguagem:</label>
		            </div>
		            
		            <a href="postitemuser.php?id=<?php echo $conteudo['id_post']?>" class="btn red" type="submit" > Cancelar</a>
		            <button class="btn waves-effect waves-light" type="submit" name="editarPost">Editar Post
		            	<i class="material-icons right">send</i>
  					</button>
        
          		</form>
		           
		     
		        </div>
		       </div>
		      </center>
		      </main>

</div>


<?php
include_once 'includes/footer.php'; //footer
?>
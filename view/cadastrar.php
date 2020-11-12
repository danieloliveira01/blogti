<?php
	session_start();
	include_once 'includes/headeruser.php';

?>





<div class="row container">
    
       <main>
		    <center>
		     <div class="container">
		        <div  class="z-depth-3  y-depth-3 x-depth-3 grey green-text lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px; margin-top: 100px; solid #EEE; width: 100%">
		        <div class="section"></div>
				<div class="section"><a href="#!" class="brand-logo"><i class="material-icons">computer</i><h5>CADASTRAR CONTEÚDO<h5></a></div>
		    
		        <div class="section"><i class="mdi-alert-error red-text"></i></div>
		      
		      	<div class='row'>
		      	<form action="../controller/controlador.php" method="POST">
   					<input type="hidden" value="<?php echo $usuario['id_usuario'];?>" name="id_usuario">
		             <div class="input-field col s12">
		               <i class="material-icons prefix">collections_bookmark</i>
		                 <select name="tipo_post">
		                <option>Selecione</option>
		                <?php
			                $res = $post->ListaCategoria();
			                while($categoria = mysqli_fetch_array($res)) {?>
			                  <option value="<?php echo $categoria['id_categoria'];?>"><?php echo $categoria['descricao'];?></option><?php
		              		}
	            		  ?>
		              </select>
		                <label for="tipo" >Tipo:</label>
		            </div>
		              <div class="input-field col s12">
		               <i class="material-icons prefix">mode_edit</i>
		                <input type="text" name="titulo" id="input_text" data-length="60"> 
		                <label for="titulo" >Título: </label>
		            </div>
		              
		             
		             <div class="input-field col s12">
		               <i class="material-icons prefix">mode_edit</i>
		              <textarea name="descricao" id="textarea2" class="materialize-textarea" data-length="1000"> </textarea> 
		              <label  for="icon_prefix2" >Descrição: </label>
		            </div>
		            
		            <div class="input-field col s12">
		               <i class="material-icons prefix">code</i>
		                 <select name="linguagem_programacao">
		                <option>Selecione</option>
		                 <?php
			                $res = $post->ListaLinguagensP();
			                while($categoria = mysqli_fetch_array($res)) {?>
			                  <option value="<?php echo $categoria['id_linguagem'];?>"><?php echo $categoria['nome'];?></option><?php
		              		}
	            		  ?>
		              </select>
		                <label for="valor" >Linguagem:</label>
		            </div>
		            
		            <a href="listacliente.php" class="btn red" type="submit" > Cancelar</a>
		            <button class="btn waves-effect waves-light" type="submit" name="cadastrarPost">Cadastrar Post
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
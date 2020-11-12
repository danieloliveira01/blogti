<?php

include ("model/servicos.php");
include_once 'model/conexaomodel.php';
include_once 'view/includes/mensagem.php';


$servicos = new Servicos();


?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <title>DNService</title>
      <!--Import materialize.css-->
       <!-- Compiled and minified CSS --> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

       <link rel="stylesheet" type="text/css" href="style.css">


      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>

     
    <div class="menu">
         <h2> DNServices</h2>
      <form action="controller/controlador.php" method="POST">
        <div class="menu">
          <button class="btn" type="submit" name= "/">Inicio</button>
           <button class="btn" type="submit" name= "/">A receber</button>
          <button class="btn" type="submit" name= "clientes">Clientes</button>
           <button class="btn" type="submit" name= "novoservico">Novo Serviço</button>
        </div>
    </form>
      </div>
      
     <div class="row">
        <div class="col s20 m6 push-m3 ">
            <form action="controller/controlador.php" method="POST">
                    <h5 class="light">Todos os servicos realizados - Registros</h5>
                        
                            <table class="striped">
                                <thead>
                                        <tr>
                                            <th>Nome do cliente</th>
                                            <th>Tipo de servico</th>
                                            <th>Data</th>
                                            <th>Descricao</th>
                                            <th>Valor</th>
                                            <th>Pago</th>
                                            
                                            
                                        </tr>
                                </thead>
                                <tbody>
                             <?php
                            $res = $servicos->ListaServicos();
                        

                            while($dados = mysqli_fetch_array($res)):
                        ?>
                                <tr>
                                    <td><?php echo $dados['nome']?></td>
                                    <td><?php echo $dados['tipo_servico']?></td>
                                    <td><?php echo $dados['data_servico']?></td>
                                    <td><?php echo $dados['descricao']?></td>
                                    <td><?php echo $dados['valor']?></td>
                                    <td><?php echo $dados['pago']?></td>
                                    <td><a href="view/editarservico.php?id=<?php echo $dados['id_os'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

                                    <td><a href="#modal<?php echo $dados['id_os'];?>" class="btn-floating red  modal-trigger"><i class="material-icons">delete</i></a></td>


                                    <!-- Modal Structure -->
                                    <div id="modal<?php echo $dados['id_os'];?>" class="modal">
                                      <div class="modal-content">
                                        <h4>Opa!</h4> 
                                        <p>Tem certeza que deseja excluir este serviço?</p>
                                      </div>
                                      <div class="modal-footer">
                                        

                                         <form action="controller/controlador.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $dados['id_os'];?>">
                                            <button type="submit" name="deletarServico" class="btn red"> Sim, quero deletar</button>
                                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                          </form>

                                      </div>
                                    </div>
                                                                     
                                     
                                         
                                        </div>
                                      </div>


                                                                       
                                   
                                </tr>
                            <?php endwhile;?>
                                </tbody>
                                
                            </table


                  </div>
                   <button class="btn" type="submit"  name="novoServico"> Novo Serviço</button>
       </form>
        </div>            

          </div>
      </div>
      
      


  
<?php
include_once 'view/includes/footer.php'; //footer
?>


 
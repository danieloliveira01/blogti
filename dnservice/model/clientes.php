
<?php

//iniciar a sessao


     class Clientes{


        public function  CadastrarCliente($nome, $sobrenome, $endereco, $telefone){
            session_start();
               $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
               $insert = "insert into Clientes(nome,sobrenome,endereco,telefone)values('$nome', '$sobrenome', '$endereco', '$telefone') ";
               
               if(mysqli_query($objetdoConexao,$insert)):
                  $_SESSION['mensagem'] = "Cadastrado com sucesso!";
                  header('Location: ../view/listarclientes.php');
                    
               else:
                $_SESSION['mensagem'] = "Erro ao cadastrar!";
                  header('Location: ../view/listarclientes.php');
                endif;
               
           
        }
     

     public function ListaCliente(){
         $sql = "SELECT * FROM Clientes";
        $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
        $resultado = mysqli_query($objetdoConexao, $sql);
        
        return  $resultado;

     }


     public function ListaClienteid($id){
                              $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
                            
                              $sql = "SELECT * FROM Clientes WHERE id_cliente = '$id' ";
                          
                              $resultado = mysqli_query($objetdoConexao, $sql);
                    
                              $dados = mysqli_fetch_array($resultado);
        
                            return  $dados;

     }



     public function  EditarCliente($nome, $sobrenome, $endereco, $telefone, $id){
             session_start();
            $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
            $update = "update Clientes set nome = '$nome',sobrenome = '$sobrenome',endereco = '$endereco',telefone = '$telefone' where id_cliente = '$id'";
           if(mysqli_query($objetdoConexao,$update)):
                  $_SESSION['mensagem'] = "Atualizado com sucesso!";
                  header('Location: ../view/listarclientes.php');
                    
               else:
                $_SESSION['mensagem'] = "Erro ao atualizar!";
                  header('Location: ../view/listarclientes.php');
                endif;
               
        
     }


     public function  ExcluirCliente($id){
             session_start();
            $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
            $delete = "DELETE from Clientes where id_cliente = '$id'";
           if(mysqli_query($objetdoConexao,$delete)):
                  $_SESSION['mensagem'] = "Deletado com sucesso!";
                  header('Location: ../view/listarclientes.php');
                    
               else:
                $_SESSION['mensagem'] = "Erro ao deletar!";
                  header('Location: ../view/listarclientes.php');
                endif;
               
        
     }

//listar clientes

        public function ListaNomeCliente(){
                $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
                                
                $sql = "SELECT nome FROM Clientes";
                              
                $resultado = mysqli_query($objetdoConexao, $sql);
                        
                $dados = mysqli_fetch_assoc($resultado);
            
                return  $dados;

         }

        public function  InserirPagamento($nome, $data, $valor){
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $insert = "insert into clientes(nome,data,valor_pago)values('$nome', '$data', '$valor') ";
            mysqli_query($objetdoConexao,$insert);
            if(mysqli_Insert_id($objetdoConexao)){
                echo "<span style='color:green'>Valor pago com sucesso</span>";
            }
            else{
            echo "<span style='color:red'>não foi Cadastrado com sucesso</span>";
            }
        
     }
    
       
        public function SearchClientes($nome){
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $sql = "SELECT * FROM clientes WHERE nome = '$nome'";
            $resultado = mysqli_query($objetdoConexao, $sql);
          
            return $resultado;
        }
        public function CalculaDivida( $nome){
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $sqlValor_devido = "SELECT SUM(valor_devido) AS total FROM clientes where nome = '$nome'";
            $resultado = mysqli_query($objetdoConexao, $sqlValor_devido);
            return $resultado;
        }

        public function CalculaValorPago( $nome){
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $sqlValor_devido = "SELECT SUM(valor_pago) AS total FROM clientes where nome = '$nome'";
            $resultado = mysqli_query($objetdoConexao, $sqlValor_devido);
            return $resultado;
        }


        public function CalculaDividaTotal(){
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $sqlValor_devido = "SELECT SUM(valor_devido) AS total FROM clientes";
            $resultado = mysqli_query($objetdoConexao, $sqlValor_devido);
            return $resultado;
        }

        public function CalculaValorPagoTotal(){
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $sqlValor_devido = "SELECT SUM(valor_pago) AS total FROM clientes";
            $resultado = mysqli_query($objetdoConexao, $sqlValor_devido);
            return $resultado;
        }


        public function LimpaNome($nome)
        {
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $sqlValor_devido = "delete * FROM clientes where nome  = '$nome'";
            $resultado = mysqli_query($objetdoConexao, $sqlValor_devido);
           
        }


    }

?>
<?php

//iniciar a sessao


     class Posts{


        public function  CadastrarPost($tipo_post, $titulo, $descricao, $linguagem_programacao, $id_usuario, $dataHora, $resolvido){
            session_start();
               $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
               $insert = "insert into Post(tipo_post, titulo, descricao,linguagem_programacao, id_usuario, dataHora, resolvido)values($tipo_post, '$titulo','$descricao', $linguagem_programacao, $id_usuario, '$dataHora', $resolvido) ";
               echo $dataHora;
               if(mysqli_query($objetdoConexao,$insert)):
                 $_SESSION['mensagem'] = "Cadastrado com sucesso!";
                  header('Location: ../view/indexadm.php');
                  echo "Deu certo";
                    
               else:
                $_SESSION['mensagem'] = "Erro ao cadastrar!";
                echo "ERROOOOO";
                  header('Location: ../view/indexadm.php');
                  
                endif;
               
           
        }

        

        public function  EditarPost($tipo_post, $titulo, $descricao, $linguagem_programacao, $id_post, $dataHora){
            session_start();
               $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
               $update = "update Post set tipo_post = $tipo_post, titulo = '$titulo', descricao = '$descricao',linguagem_programacao = $linguagem_programacao, dataHora = '$dataHora' WHERE id_post = $id_post ";
               echo $dataHora;
               if(mysqli_query($objetdoConexao,$update)):
                 $_SESSION['mensagem'] = "Post editado com sucesso!";
                  //header('Location: ../view/indexadm.php');
                  echo "Deu certo";
                    
               else:
                $_SESSION['mensagem'] = "Erro ao editar!";
                echo "ERROOOOO";
                //  header('Location: ../view/indexadm.php');
                  
                endif;
               
           
        }



        public function  ExcluirPost($id){
             session_start();
            $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
            $delete = "DELETE from Post where id_post = '$id'";
           if(mysqli_query($objetdoConexao,$delete)):
                  $_SESSION['mensagem'] = "Deletado com sucesso!";
                  //header('Location: ../index.php');
                    
               else:
                $_SESSION['mensagem'] = "Erro ao deletar!";
                  //header('Location: ../index.php');
                endif;
               
        
     }


         public function ListaPost($tipo){
         $sql = "SELECT * FROM buscaNoticia where tipo_post_id = $tipo";
        $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
        $resultado = mysqli_query($objetdoConexao, $sql);
        
        return  $resultado;

       }

        public function ListaPerguntaComentadas(){
         $sql = "SELECT * FROM BuscaPostComents ";
        $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
        $resultado = mysqli_query($objetdoConexao, $sql);
        
        return  $resultado;

       }

       

       public function ListaPostUsuario($nome){
         $sql = "SELECT * FROM buscaNoticia where usuario = '$nome'";
        $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
        $resultado = mysqli_query($objetdoConexao, $sql);
        
        return  $resultado;

       }

       

       public function  ResolverPost($id_post, $resolver){
            session_start();
               $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
               $update = "update Post set resolvido = $resolver WHERE id_post = $id_post ";
               echo $dataHora;
               if(mysqli_query($objetdoConexao,$update)):
                 $_SESSION['mensagem'] = "Post resolvido com sucesso!";
                  //header('Location: ../view/indexadm.php');
                  echo "Deu certo";
                    
               else:
                $_SESSION['mensagem'] = "Erro ao resolver post!";
                echo "ERROOOOO";
                //  header('Location: ../view/indexadm.php');
                  
                endif;
               
           
        }


        public function ListaCategoria(){
         $sql = "SELECT * FROM categorias";
        $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
        $resultado = mysqli_query($objetdoConexao, $sql);
        
        return  $resultado;

       }
       public function ListaLinguagensP(){
           $sql = "SELECT * FROM LinguagensProgramacao";
          $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
          $resultado = mysqli_query($objetdoConexao, $sql);
          
          return  $resultado;

       }



        public function ListaConteudo($id){
                              $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
                            
                              $sql = "SELECT * from buscaNoticia
                                  WHERE id_post = $id";
                          
                              $resultado = mysqli_query($objetdoConexao, $sql);
                    
                              $dados = mysqli_fetch_array($resultado);
        
                            return  $dados;

     }

      public function  CadastrarComentario($id_post, $id_usuario, $mensagem, $dataHora){
            session_start();
               $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
               $insert = "insert into Comentarios(id_post, id_usuario, mensagem, dataHora)values($id_post,$id_usuario,'$mensagem','$dataHora') ";
               echo $dataHora;
               echo $id_post;
               echo $id_usuario;
               echo $mensagem;
               if(mysqli_query($objetdoConexao,$insert)):
                 $_SESSION['mensagem'] = "Comentado com sucesso!";
                  //header('Location: ../view/coments.php');
                  echo "Deu certo";
                    
               else:
                $_SESSION['mensagem'] = "Erro ao comentar!";
                echo "ERROOOOO";
                 // header('Location: ../view/indexadm.php');
                  
                endif;
               
           
        }

         public function ListaComentarios($id){
                              $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
                            
                              $sql = "SELECT * from comentariosUsuario
                                  WHERE id_post = $id";
                          
                              $resultado = mysqli_query($objetdoConexao, $sql);
                    
                             
        
                            return  $resultado;

     }


     

      public function  EditarComentario($id_comentario, $comentario, $dataHora){
            session_start();
            echo $id_comentario;
            $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
            
            $update = "update Comentarios set mensagem = '$comentario',dataHora = '$dataHora' WHERE id_comentario = $id_comentario";
           
             if(mysqli_query($objetdoConexao,$update)):
                  $_SESSION['mensagem'] = "Atualizado com sucesso!";
                 
                 // header('Location: ../view/listarclientes.php');
                    
               else:
                $_SESSION['mensagem'] = "Erro ao atualizar!";
                  
                 // header('Location: ../view/listarclientes.php');
                endif;
        
     }

     

      public function  ExcluirComentario($id){
             session_start();
            $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
            $delete = "DELETE from Comentarios where id_comentario = '$id'";
           if(mysqli_query($objetdoConexao,$delete)):
                  $_SESSION['mensagem'] = "Deletado com sucesso!";
                  //header('Location: ../index.php');
                    
               else:
                $_SESSION['mensagem'] = "Erro ao deletar!";
                  //header('Location: ../index.php');
                endif;
               
        
     }

     //totalizar comentario
      public function  totalComentario($id){
             
            $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
            $sql = "select * from Comentarios where id_post = $id";
          $resultado = mysqli_query($objetdoConexao, $sql);
          $dados = mysqli_num_rows($resultado);

          return $dados;
        
     }


      public function  search($palavra){
             
            $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
           $query = "select * from buscaNoticia  where titulo like '%".$palavra."%'";
          $resultado = mysqli_query($objetdoConexao, $query);
          $dados = mysqli_num_rows($resultado);

          return $resultado;
        
     }



} 
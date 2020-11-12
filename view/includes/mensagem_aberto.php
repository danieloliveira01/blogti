<?php
//abrindo a sessao

if(isset($_SESSION['mensagem'])): ?>
  <script>
    //mensagem
  window.onload = function(){
      M.toast({html: '<?php  echo $_SESSION['mensagem'];?>'})
  };
</script>
 
  <?php
endif;


?>
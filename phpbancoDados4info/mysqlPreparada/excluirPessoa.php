<?php
if($_GET){//verificar se existe valores no array post
  $id = $_GET["id"];
  include("Pessoa.php");
  $excluirPessoa = new Pessoa();

  $retorno = $excluirPessoa->deletePessoa($id);

  if($retorno==1){
      echo "Pessoa excluida com sucesso";
  }else{
    echo "Erro ao excluir a pessoa.";
  }
}else{
  echo "Dados do Formulário";
}


?>

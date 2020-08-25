<?php
if($_POST){//verificar se existe valores no array post
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $telefone = $_POST["telefone"];
  $email = $_POST["email"];
  $dataNascimento = $_POST["dataNascimento"];

  include("Pessoa.php");

  $alterarPessoa = new Pessoa();

  $retorno = $alterarPessoa->updatePessoa($id, $nome, $telefone, $email, $dataNascimento);

  if($retorno==1){
      echo "Pessoa alterada com sucesso";
  }else{
    echo "Erro ao alterar pessoa.";
  }
}else{
  echo "Dados do Formulário";
}


?>

<?php
if($_POST){//verificar se existe valores no array post
  $nome = $_POST["nome"];
  $telefone = $_POST["telefone"];
  $email = $_POST["email"];
  $dataNascimento = $_POST["dataNascimento"];

  include("Pessoa.php");

  $cadastrarPessoa = new Pessoa();

  $retorno = $cadastrarPessoa->addPessoa($nome, $telefone, $email, $dataNascimento);

  if($retorno==1){
      echo "Pessoa Cadastrada com sucesso";
  }else{
    echo "Erro ao cadastrar a pessoa.";
  }
}else{
  echo "Dados do Formulário";
}


?>

<?php
//arquivo de conexão com banco de dados utilizando a API Mysqli
  $local = "localhost"; //localização da base dados
  $usuario = "root";    //usuário da base de dados
  $senha = "";          //senha para a base de dados
  $database = "3info";

  //API Mysqli é orientada a objetos
  $conectar = new Mysqli($local, $usuario, $senha, $database);
  //o objeto $conectar possui a conexão com o banco de dados
  if($conectar){
    //echo "Conectado com sucesso";
  }else{
    echo "Erro ao conectar";
  }
?>

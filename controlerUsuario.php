<?php

$nome = $_POST["nome"];
$email = $_POST["email"];
$login = $_POST["login"];
$senha = $_POST["senha"];

/*$nome = "Rafael";
$email = "rafael.florindo@escola.pr.gov.br";
$login = "rafael";
$senha = "85";*/

include("classeUsuario.php");

$usuario = new Usuario();

$usuario->addusuario($nome, $email, $login, $senha);

if($usuario){
  echo "O usuario foi cadastrado com sucesso";
}
?>

<?php
//função do mysqli para tratamento de erros.
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//tratamento de excessão
  try {
    // código que inclui comandos/invocações de métodos
    // que podem gerar uma situação de exceção.
    $conectar = new mysqli("localhost", "root", "", "xxx");
    //correção de caracteres adcicional para o retorno do banco
    $conectar->set_charset("utf8mb4");
  } catch(Exception $e) {
  // bloco de tratamento associado à condição de exceção XException ou a qualquer uma de suas
  // subclasses, identificada aqui pelo objeto com referência ex
    error_log($e->getMessage());
    exit('Error connecting to database'); //Should be a message a typical user could understand
  }
?>

<?php
class Conectar{
  private $host, $usuario, $senha, $database, $conectar;
  public function conectar(){
    $this->host = "localhost";
    $this->usuario = "root";
    $this->senha = "";
    $this->database = "unifamma";
    $this->conectar = new Mysqli($this->host,
                          $this->usuario,
                          $this->senha,
                          $this->database);
    return $this->getConectar();
  }
  public function getConectar(){ return $this->conectar;}
}
 ?>

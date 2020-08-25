<?php
class Usuario{
  private $id, $nome, $email, $login, $senha,
  $dataCadastro, $ativo, $conexao;

  public function __construct(){
    include ("Conexao.php");
    $conectar = new Conectar();
    $this->conexao=$conectar->conectar();
  }

  public function addUsuario($nome, $email, $login, $senha){
    $this->nome = $nome;
    $this->email = $email;
    $this->login = $login;
    $this->senha = md5($senha);
    $dataCadastro = date("Y-m-d H:i:s");
    if($this->getConexao()){
      $query = "INSERT INTO usuario (nome, email, login, senha, dataCadastro)
      VALUE ('{$this->getNome()}', '{$this->getEmail()}', '{$this->getLogin()}',
      '{$this->getSenha()}','{$dataCadastro}')";
      $insert = $this->conexao->query($query);
      if ($this->conexao->affected_rows){ return 1;
      }else{ return 0;}
    }else{
      echo "Não conectado ao BD";
    }
  }
    public function getId(){ return $this->id; }
    public function getNome(){ return $this->nome; }
    public function getEmail(){ return $this->email; }
    public function getLogin(){ return $this->login; }
    public function getSenha(){ return $this->senha; }
    public function getDataCadastro(){ return $this->$dataCadastro; }
    public function getAtivo(){ return $this->ativo; }
    public function getConexao(){ return $this->conexao;}
  }
 ?>

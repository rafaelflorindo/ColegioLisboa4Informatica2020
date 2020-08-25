<?php
abstract class Pessoa{//A classe Pessoa não pode ser instanciada
  protected $id, $nome, $telefone, $email, $dataNascimento;

    abstract public function mostrarPessoa();

  public function addPessoa($nome, $telefone, $email, $dataNascimento){
    include ("conexaoPreparada.php");//[ALTERAÇÃO]
    $this->setNome($nome);
    $this->setTelefone($telefone);
    $this->setEmail($email);
    $this->setDataNascimento($dataNascimento);

    //string preparada a espera dos dados tratados
    $stmt = $conectar->prepare("INSERT INTO pessoa (nome, telefone, email, dataNascimento)
     VALUES (?, ?, ?, ?)");
    /*
    Os quatro tipos de variáveis ?? :
    •	i - Integer
    •	d - duplo
    •	s - String
    •	b - Blob
    */
    $stmt->bind_param("ssss", $this->nome, $this->telefone, $this->email, $this->dataNascimento);
    $stmt->execute();
    $stmt->close();

    if($conectar->affected_rows){
      return 1;
    }else{
      return 0;
    }
  }
  public function updatePessoa($id, $nome, $telefone, $email, $dataNascimento){
    include ("conexaoPreparada.php");
    $this->setId($id);
    $this->setNome($nome);
    $this->setTelefone($telefone);
    $this->setEmail($email);
    $this->setDataNascimento($dataNascimento);

    $stmt = $conectar->prepare("update pessoa set
    nome = ?, telefone = ?, email = ?, dataNascimento = ? where id  = ?");

    $stmt->bind_param("ssssi", $this->nome, $this->telefone, $this->email, $this->dataNascimento, $this->id);
    $stmt->execute();
    $stmt->close();

    if($conectar->affected_rows){
      return 1;
    }else{
      return 0;
    }
  }

  public function deletePessoa($id){
    $this->setId($id);
    include ("conexaoPreparada.php");
    $stmt = $conectar->prepare("delete from pessoa where id  = ?");

    $stmt->bind_param("i", $this->id);
    $stmt->execute();
    $stmt->close();
    
    if($conectar->affected_rows){
      return 1;
    }else{
      return 0;
    }
  }
  public function relatorioSimples(){
      include ("conexaoPreparada.php");
      $stmt = $conectar->prepare("SELECT id, nome, email, telefone FROM pessoa");
      $stmt->execute();

      $result = $stmt->get_result();//pegar resultado da consulta no objeto
      $retornoBanco = array();//array dinamico
      while ($linha = $result->fetch_assoc()) {
        $retornoBanco[] = $linha;
      }
      $stmt->close();
      return $retornoBanco;
  }

  public function relatorioUnico($id){
      include ("conexaoPreparada.php");
      $stmt = $conectar->prepare("SELECT * FROM pessoa where id = ?");

      $this->setId($id);
      $stmt->bind_param("i", $this->id);
      $stmt->execute();
      $result = $stmt->get_result();

      while ($linha = $result->fetch_assoc()) {
        $retornoBanco = $linha;
      }
      $stmt->close();
      return $retornoBanco;
  }
  public function setID($id){ $this->id = $id; }
  public function setNome($nome){ $this->nome = $nome; }
  public function setTelefone($telefone){ $this->telefone = $telefone; }
  public function setEmail($email){ $this->email = $email; }
  public function setDataNascimento($dataNascimento){ $this->dataNascimento = $dataNascimento; }

  public function getId(){ return $this->id;}
  public function getNome(){ return $this->nome;}
  public function getTelefone(){ return $this->telefone;}
  public function getEmail(){ return $this->email;}
  public function getDataNascimento(){ return $this->dataNascimento;}
}
?>

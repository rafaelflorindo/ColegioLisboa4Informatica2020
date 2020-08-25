<?php
class Pessoa{
  private $id, $nome, $telefone, $email, $dataNascimento;

  public function addPessoa($nome, $telefone, $email, $dataNascimento){
    include ("conexao.php");//incluimos a conexão com o banco de dados
    //setamos os valores recebidos nas variaveis de classe
    $this->setNome($nome);
    $this->setTelefone($telefone);
    $this->setEmail($email);
    $this->setDataNascimento($dataNascimento);
    //construímos a query de inserção no bando de dados
    $sql = "insert into pessoa (nome, telefone, email, dataNascimento)
    value ('{$this->getNome()}','{$this->getTelefone()}','{$this->getEmail()}','{$this->getDataNascimento()}')
    ";
    //o método query, executa as consultas no banco de dados
    $insere = $conectar->query($sql);
    //verficar se a tabela foi afetada pela consulta
    if($conectar->affected_rows){
      return 1;
    }else{
      return 0;
    }
  }

  public function relatorioSimples(){
      include ("conexao.php");
      $query = "SELECT id, nome, email, telefone FROM pessoa";
      $busca = $conectar->query($query);

      $retornoBanco = array();//array dinamico
      while ($linha = $busca->fetch_assoc()) {
        $retornoBanco[] = $linha;
      }
      return $retornoBanco;
  }

  public function relatorioUnico($id){
      include ("conexao.php");
      $query = "SELECT * FROM pessoa where id = ". $id;//2
      $busca = $conectar->query($query);

      $retornoBanco = array();
      while ($linha = $busca->fetch_assoc()) {
        //echo $row["nome"];
        $retornoBanco[] = $linha;
      }
      return $retornoBanco;
  }

  public function setNome($nome){ $this->nome = $nome; }
  public function setTelefone($telefone){ $this->telefone = $telefone; }
  public function setEmail($email){ $this->email = $email; }
  public function setDataNascimento($dataNascimento){ $this->dataNascimento = $dataNascimento; }

  public function getNome(){ return $this->nome;}
  public function getTelefone(){ return $this->telefone;}
  public function getEmail(){ return $this->email;}
  public function getDataNascimento(){ return $this->dataNascimento;}
}
?>

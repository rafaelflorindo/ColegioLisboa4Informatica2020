<?php
  include("Pessoa.php");
  $pessoa = new Pessoa();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ALTERAR PESSOA</title>
    <style>
    .form{
      background-color: #fdfd96;
    }
    .lista{
      background-color: #20b2aa;
    }
    </style>
  </head>
  <body>
    <?php
      if($_GET){
        $id = $_GET["id"];
        $retornoLinha = $pessoa->relatorioUnico($id);
      }else{
        $retornoLinha = array('id'=>"",
                              'nome' => "",
                              'telefone' => "",
                              'email' => "",
                              'dataNascimento' => "");
      }
     ?>
  <div class="form">
      <form action="alterarPessoa.php" method="post">
        <div>
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" value="<?=$retornoLinha["nome"]?>" placeholder="Nome">
        </div>
        <div>
          <label for="telefone">Telefone:</label>
          <input type="text" id="telefone" name="telefone" value="<?=$retornoLinha["telefone"]?>" placeholder="Telefone">
        </div>
        <div>
          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" value="<?=$retornoLinha["email"]?>" placeholder="E-mail">
        </div>
        <div>
          <label for="dataNascimento">Data Nascimento:</label>
          <input type="date" id="dataNascimento" name="dataNascimento" value=<?=$retornoLinha["dataNascimento"]?>>
        </div>
        <div>
          <input type="hidden" name="id" value=<?=$retornoLinha["id"]?>>
          <input type="submit" value="ALTERAR">
        </div>
      </form>
    </div>

    <div class="lista">
      <?php
        $retornoListaBanco = $pessoa->relatorioSimples();
        //print_r($retornoListaBanco);
        if($retornoListaBanco){
            ?>
            <table>
              <th>ITEM</th>
              <th>NOME</th>
              <th>E-MAIL</th>
              <th>TELEFONE</th>
              <th>AÇÃO</th>
            <?php
            $i=1;
            foreach($retornoListaBanco as $value) {
              ?>
              <tr>
                <td><?=$i++;?></td>
                <td><?=$value["nome"];?></td>
                <td><?=$value["email"];?></td>
                <td><?=$value["telefone"];?></td>
                <td><a href="formAlterarPessoa.php?id=<?=$value["id"]?>">ALTERAR</a></td>
                <td><a href="excluirPessoa.php?id=<?=$value["id"]?>">EXCLUIR</a></td>
              </tr>
              <?php
            }
            echo "</table>";
        }else{
          echo "Ainda não existem registros!!!";
        }
      ?>
    </div>
  </body>
</html>

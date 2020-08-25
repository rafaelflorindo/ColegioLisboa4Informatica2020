<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CADASTRO DE PESSOA</title>
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
  <div class="form">
      <form action="cadastroPessoa.php" method="post">
        <div>
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" placeholder="Nome">
        </div>
        <div>
          <label for="telefone">Telefone:</label>
          <input type="text" id="telefone" name="telefone" placeholder="Telefone">
        </div>
        <div>
          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" placeholder="E-mail">
        </div>
        <div>
          <label for="dataNascimento">Data Nascimento:</label>
          <input type="date" id="dataNascimento" name="dataNascimento">
        </div>
        <div>
          <input type="submit" value="GRAVAR">
        </div>
      </form>
    </div>

    <div class="lista">
      <?php
        include("Pessoa.php");
        $listaPessoa = new Pessoa();
        $retornoListaBanco = $listaPessoa->relatorioSimples();
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
                <td>ALTERAR</td>
                <td>EXCLUIR</td>
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

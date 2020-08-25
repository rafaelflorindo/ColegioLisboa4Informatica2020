<?php
include ("Pessoa.php");
    class ClienteFisica extends Pessoa{
        private $idClienteFisica, $cpf;

        public function mostrarPessoa(){
            echo $this->nome;
            echo $this->telefone;
            echo $this->email;
            echo $this->cpf;  

            //interoperabilidade = conexão/interligação entre sistemas diferentes

            return array("nome"=>$this->nome, "telefone"=>$this->telefone);
        
            /*$pessoas = {
                [
                    nome: "Rafael", 
                    telefone: "1231324156"
                ],
                [
                    nome: "Carlos", 
                    telefone: "258"
                ]
            }

            for($i =0; $i<2; $i++){
                echo "Nome = {$pessoas[nome]}";
            }
        */
        }

        public function cadastrarPessoaFisica($nome, $telefone, $email, $dataNascimento, $cpf){
            //codificar
            $this->cpf=$cpf;
            if($this->addPessoa($nome, $telefone, $email, $dataNascimento))
                return true;
            else
                return false;
        }
        
        public function setCpf($cpf){
            if ($this->validarCPF($cpf)) 
                $this->cpf = $cpf;  
            else 
                return "Cpf Inválido";
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function validarCPF($cpf){

            //

// Elimina possivel mascara

$cpf = preg_replace("/[^0-9]/", "", $cpf);
$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

// Verifica se o numero de digitos informados é igual a 11 
if (strlen($cpf) != 11) {
    return false;
}
// Verifica se nenhuma das sequências invalidas abaixo 
// foi digitada. Caso afirmativo, retorna falso
else if ($cpf == '00000000000' || 
    $cpf == '11111111111' || 
    $cpf == '22222222222' || 
    $cpf == '33333333333' || 
    $cpf == '44444444444' || 
    $cpf == '55555555555' || 
    $cpf == '66666666666' || 
    $cpf == '77777777777' || 
    $cpf == '88888888888' || 
    $cpf == '99999999999') {
    return false;
 // Calcula os digitos verificadores para verificar se o
 // CPF é válido
 } else {   
    
    for ($t = 9; $t < 11; $t++) {
        
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf{$c} != $d) {
            return false;
        }
    }

    return true;
}
         /*   //
            $valid = 1;//deve fazer a validação de cpf
            if ($valid) return true;
            else  return false;*/
        }
    }

?>

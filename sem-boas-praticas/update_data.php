<?php

require_once 'autoload.php';

use Model\Pessoa;

if($_SERVER["REQUEST_METHOD"]=="POST"){
$nome=$_POST['nome'];
$idade=$_POST['idade'];
$cidade=$_POST['cidade'];
$endereco=$_POST['endereco'];
$telefone=$_POST['telefone'];


$pessoa=new Pessoa();

$pessoa->atualizarDados($nome,$idade,$cidade,$endereco,$telefone);

if($pessoa->idade>=0&&$pessoa->idade<10){
echo"Criança";
}else{
if($pessoa->idade>=10&&$pessoa->idade<20){
echo"Adolescente";
}else{
if($pessoa->idade>=20&&$pessoa->idade<30){
echo"Jovem Adulto";
}else{
if($pessoa->idade>=30&&$pessoa->idade<60){
echo"Adulto";
}else{
echo"Idoso";
}
}
}
}

$pessoa->exibirInformacoes();

echo"Dado satualizados com sucesso!";
}else{
header("Location:update_form.php");
exit;
}

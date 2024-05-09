<?php

require_once 'autoload.php';

use Model\Pessoa;

if($_SERVER["REQUEST_METHOD"]=="POST"){
$pessoa=new Pessoa();
if ($_POST['nome']){
$nome=$_POST['nome'];
if ($_POST['idade']){
$idade=$_POST['idade'];
if ($_POST['endereco']){
$cidade=$_POST['cidade'];
if ($_POST['telefone']){
$telefone=$_POST['telefone'];
} else {
echo 'Campo inválido';
}
} else {
echo 'Campo inválido';
}
} else {
echo 'Campo inválido';
}
} else {
echo 'Campo inválido';
}
$nome=$_POST['nome'];
$idade=$_POST['idade'];
$cidade=$_POST['cidade'];
$endereco=$_POST['endereco'];
$telefone=$_POST['telefone'];
//$pessoa->nome=$_POST['nome'];
//$pessoa->idade=$_POST['idade'];
//$pessoa->cidade=$_POST['cidade'];
//$pessoa->endereco=$_POST['endereco'];
//$pessoa->telefone=$_POST['telefone'];
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

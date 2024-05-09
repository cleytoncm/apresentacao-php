<?php

require_once 'autoload.php';

use Model\Pessoa;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];


    $pessoa = new Pessoa();

    $pessoa->atualizarDados($nome, $idade, $cidade, $endereco, $telefone);

    $categoriaIdade = $pessoa->getCategoriaIdade();

    echo 'Categoria de Idade: ' . $categoriaIdade . '<br>';

    $pessoa->exibirInformacoes();

    echo 'Dados atualizados com sucesso!' . '<br>';
} else {
    header('Location: update_form.php');
    exit;
}

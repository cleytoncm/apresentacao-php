<?php

require_once 'Model/Pessoa.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pessoa = new Model\Pessoa();

    $pessoa->nome = $_POST['nome'];
    $pessoa->idade = $_POST['idade'];
    $pessoa->cidade = $_POST['cidade'];
    $pessoa->endereco = $_POST['endereco'];
    $pessoa->telefone = $_POST['telefone'];
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-4">Informações Inseridas</h2>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <p class="mb-4"><span class="font-bold">Nome:</span> <?php echo htmlspecialchars($pessoa->nome); ?></p>
            <p class="mb-4"><span class="font-bold">Idade:</span> <?php echo htmlspecialchars($pessoa->idade); ?></p>
            <p class="mb-4"><span class="font-bold">Cidade:</span> <?php echo htmlspecialchars($pessoa->cidade); ?></p>
            <p class="mb-4"><span class="font-bold">Endereço:</span> <?php echo htmlspecialchars($pessoa->endereco); ?></p>
            <p class="mb-4"><span class="font-bold">Telefone:</span> <?php echo htmlspecialchars($pessoa->telefone); ?></p>
        </div>
    <?php }; ?>
</div>

</body>
</html>

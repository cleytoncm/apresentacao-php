<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Dados da Pessoa</title>
    <!-- Adicione o link para o CSS do Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl mb-4">Atualizar Dados da Pessoa</h2>
        <form action="update_data.php" method="post" class="space-y-4">
            <div>
                <label for="nome" class="block">Nome:</label>
                <input type="text" id="nome" name="nome" class="w-full border rounded-md p-2">
            </div>

            <div>
                <label for="idade" class="block">Idade:</label>
                <input type="number" id="idade" name="idade" class="w-full border rounded-md p-2">
            </div>

            <div>
                <label for="cidade" class="block">Cidade:</label>
                <input type="text" id="cidade" name="cidade" class="w-full border rounded-md p-2">
            </div>

            <div>
                <label for="endereco" class="block">Endereço:</label>
                <input type="text" id="endereco" name="endereco" class="w-full border rounded-md p-2">
            </div>

            <div>
                <label for="telefone" class="block">Telefone:</label>
                <input type="text" id="telefone" name="telefone" class="w-full border rounded-md p-2">
            </div>

            <div>
                <button type="submit" class="w-full bg-blue-500 text-white rounded-md py-2">Atualizar</button>
            </div>
        </form>
    </div>
</body>
</html>

# Boas Práticas de Desenvolvimento de Código em PHP

## Introdução

- Desenvolver código legível e de fácil manutenção é crucial para o sucesso de um projeto em PHP.
- Seguir padrões de codificação estabelecidos, como as PSRs e princípios de Clean Code, ajuda a alcançar esses objetivos.

## PSR-12: Padrão de Código Estilo

- Define um padrão de estilo para a escrita de código PHP.
- Promove a consistência e a legibilidade do código em projetos compartilhados.
- Algumas diretrizes do PSR-12 incluem:
    - Uso de indentação com quatro espaços.
    - Linhas com no máximo 80 caracteres.
    - Uso de chaves em uma nova linha para estruturas de controle.

### Exemplos:

#### Problemas de indentação
```php
<?php
/**
 * Validação de idade da classe Pessoa.
 * */
if ($pessoa->idade >= 0 && $pessoa->idade < 10) {
echo "Criança";
} else {
if ($pessoa->idade >= 10 && $pessoa->idade < 20) {
echo "Adolescente";
} else {
if ($pessoa->idade >= 20 && $pessoa->idade < 30) {
echo "Jovem Adulto";
} else {
if ($pessoa->idade >= 30 && $pessoa->idade < 60) {
echo "Adulto";
} else {
echo "Idoso";
}
}
}
}
```
```php
/**
 * Validação de idade da classe Pessoa.
 * */
if ($pessoa->idade >= 0 && $pessoa->idade < 10) {
    echo "Criança";
} else {
    if ($pessoa->idade >= 10 && $pessoa->idade < 20) {
        echo "Adolescente";
    } else {
        if ($pessoa->idade >= 20 && $pessoa->idade < 30) {
            echo "Jovem Adulto";
        } else {
            if ($pessoa->idade >= 30 && $pessoa->idade < 60) {
                echo "Adulto";
            } else {
                echo "Idoso";
            }
        }
    }
}
```

```php
<?php

namespace Model;

class Pessoa
{
    private $conexao;

    public $nome;
    public $idade;
    public $cidade;
    public $endereco;
    public $telefone;

    public function __construct($conexao, $nome = null, $idade = null, $cidade = null, $endereco = null, $telefone = null)
    {
        $this->conexao = $conexao;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cidade = $cidade;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }

    // Função para validar os atributos da pessoa
    public function validar()
    {
        $erros = [];

        // Validar nome
        if (!is_string($this->nome) || empty($this->nome)) {
            $erros[] = "O nome deve ser uma string não vazia.";
        }

        // Validar idade
        if (!is_int($this->idade) || $this->idade < 0) {
            $erros[] = "A idade deve ser um número inteiro positivo.";
        }

        // Validar cidade
        if (!is_string($this->cidade) || empty($this->cidade)) {
            $erros[] = "A cidade deve ser uma string não vazia.";
        }

        // Validar endereco
        if (!is_string($this->endereco) || empty($this->endereco)) {
            $erros[] = "O endereço deve ser uma string não vazia.";
        }

        // Validar telefone
        if (!is_string($this->telefone) || empty($this->telefone)) {
            $erros[] = "O telefone deve ser uma string não vazia.";
        }

        return $erros;
    }

    // Função para criar uma nova pessoa
    public function criar()
    {
        // Executar validação
        $erros = $this->validar();
        if (!empty($erros)) {
            return $erros; // Retorna erros se a validação falhar
        }

        // Preparar e executar a query SQL para inserir uma nova pessoa
        $query = "INSERT INTO pessoas (nome, idade, cidade, endereco, telefone) VALUES (:nome, :idade, :cidade, :endereco, :telefone)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':cidade', $this->cidade);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->execute();

        return "Pessoa criada com sucesso.";
    }

    // Função para ler os dados de uma pessoa existente
    public function ler($id)
    {
        // Preparar e executar a query SQL para ler os dados de uma pessoa
        $query = "SELECT * FROM pessoas WHERE id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        // Atribuir os dados lidos aos atributos da pessoa
        $this->nome = $dados['nome'];
        $this->idade = $dados['idade'];
        $this->cidade = $dados['cidade'];
        $this->endereco = $dados['endereco'];
        $this->telefone = $dados['telefone'];

        return "Dados da pessoa lidos com sucesso.";
    }

    // Função para atualizar os dados de uma pessoa existente
    public function atualizar($id)
    {
        // Executar validação
        $erros = $this->validar();
        if (!empty($erros)) {
            return $erros; // Retorna erros se a validação falhar
        }

        // Preparar e executar a query SQL para atualizar os dados de uma pessoa
        $query = "UPDATE pessoas SET nome = :nome, idade = :idade, cidade = :cidade, endereco = :endereco, telefone = :telefone WHERE id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':cidade', $this->cidade);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return "Dados da pessoa atualizados com sucesso.";
    }

    // Função para deletar uma pessoa existente
    public function deletar($id)
    {
        // Preparar e executar a query SQL para deletar uma pessoa
        $query = "DELETE FROM pessoas WHERE id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return "Pessoa deletada com sucesso.";
    }
}
```
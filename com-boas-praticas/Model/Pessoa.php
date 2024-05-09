<?php

namespace Model;

use PDO;
use PDOException;

class Pessoa
{
    private $conexao;
    public $nome;
    public $idade;
    public $cidade;
    public $endereco;
    public $telefone;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=seu_banco_de_dados';
        $usuario = 'seu_usuario';
        $senha = 'sua_senha';

        try {
            //$this->conexao = new PDO($dsn, $usuario, $senha);
        } catch (PDOException $e) {
            echo 'Erro de conexão: ' . $e->getMessage();
        }
    }

    public function exibirInformacoes()
    {
        echo "Nome: {$this->nome}<br> Idade: {$this->idade}<br> Cidade: {$this->cidade}<br> Endereço: {$this->endereco}<br> Telefone: {$this->telefone}";
    }

    public function validar()
    {
        $erros = [];
        if (!is_string($this->nome) || empty($this->nome)) {
            $erros[] = 'O nome deve ser uma string não vazia.';
        }
        if (!is_int($this->idade) || $this->idade < 0) {
            $erros[] = 'A idade deve ser um número inteiro positivo.';
        }
        if (!is_string($this->cidade) || empty($this->cidade)) {
            $erros[] = 'A cidade deve ser uma string não vazia.';
        }
        if (!is_string($this->endereco) || empty($this->endereco)) {
            $erros[] = 'O endereço deve ser uma string não vazia.';
        }
        if (!is_string($this->telefone) || empty($this->telefone)) {
            $erros[] = 'O telefone deve ser uma string não vazia.';
        }
        return $erros;
    }

    public function criar()
    {
        $erros = $this->validar();
        if (!empty($erros)) {
            return $erros;
        }
        $query = 'INSERT INTO pessoas (nome, idade, cidade, endereco, telefone) VALUES (:nome, :idade, :cidade, :endereco, :telefone)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':cidade', $this->cidade);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->execute();
        return 'Pessoa criada com sucesso.';
    }

    public function ler($id)
    {
        $query = 'SELECT * FROM pessoas WHERE id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->nome = $dados['nome'];
        $this->idade = $dados['idade'];
        $this->cidade = $dados['cidade'];
        $this->endereco = $dados['endereco'];
        $this->telefone = $dados['telefone'];
        return 'Dados da pessoa lidos com sucesso.';
    }

    public function atualizar($id)
    {
        $erros = $this->validar();
        if (!empty($erros)) {
            return $erros;
        }
        $query = 'UPDATE pessoas SET nome = :nome, idade = :idade, cidade = :cidade, endereco = :endereco, telefone = :telefone WHERE id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':cidade', $this->cidade);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return 'Dados da pessoa atualizados com sucesso.';
    }

    public function deletar($id)
    {
        $query = 'DELETE FROM pessoas WHERE id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return 'Pessoa deletada com sucesso.';
    }
}

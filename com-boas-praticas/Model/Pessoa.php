<?php

namespace Model;

class Pessoa
{
    public $nome;
    public $idade;
    public $cidade;
    public $endereco;
    public $telefone;

    public function atualizarDados($nome, $idade, $cidade, $endereco, $telefone)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cidade = $cidade;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }

    public function exibirInformacoes()
    {
        echo "Nome: {$this->nome}, Idade: {$this->idade}, Cidade: {$this->cidade}, Endereço: {$this->endereco}, Telefone: {$this->telefone}";
    }

    public function getCategoriaIdade()
    {
        if ($this->idade >= 0 && $this->idade < 10) {
            return "Criança";
        } elseif ($this->idade >= 10 && $this->idade < 20) {
            return "Adolescente";
        } elseif ($this->idade >= 20 && $this->idade < 30) {
            return "Jovem Adulto";
        } elseif ($this->idade >= 30 && $this->idade < 60) {
            return "Adulto";
        } else {
            return "Idoso";
        }
    }
}

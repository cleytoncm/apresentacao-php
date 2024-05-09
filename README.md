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
    - Uso de namespaces e imports em linhas separadas.
    - Uso de chaves em uma nova linha para estruturas de controle.

### Exemplo (com PSR-12):

```php
<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function index()
    {
        $users = User::all();
        
        foreach ($users as $user) {
            echo $user->name . "\n";
        }
    }
}
```

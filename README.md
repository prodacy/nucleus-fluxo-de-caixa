# Avaliação Técnica
Processo seletivo para Desenvolvedor(a) Fullstack Laravel Remoto
nucleus.eti.br

1. Autenticação - Email/Senha
2. Contas A pagar / A receber
2.1.1. Criar conta
2.1.1.1. Tipo
2.1.1.1.1. A pagar
2.1.1.1.2. A receber
2.1.1.2. Data de vencimento
2.1.1.2.1. Validação da data
2.1.1.3. Valor a pagar
2.1.1.3.1. Validação do valor
2.1.1.4. Nome/Razão Social do Fornecedor ou Cliente
2.1.1.5. CPF/CNPJ do Fornecedor ou Cliente
2.1.1.5.1. Validação do CPF/CNPJ

2.1.2. Listar todas as contas
2.1.3. Editar uma conta
2.1.4. Excluir uma conta

- Extra
3. API_REST
3.1 Authtication JWT
3.2.1 /api/bills 
3.2.2 /api/clients

## Requirements

- PHP >= 7.3.0|^8.0
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Installation

- Clone the repo and `cd` into it
- Run `composer install`
- Rename or copy `.env.example` file to `.env`
- Run `php artisan key:generate`
- Run `php artisan jwt:secret`
- Set your database credentials in your `.env` file
- Run `php artisan migrate:fresh --seed`
- Run `php artisan serve`


## License

Licensed under the MIT license.
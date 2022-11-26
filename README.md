# Desafio API de Integração 

## Problema

Temos uma jornada de compra do nosso produto. Essa jornada possui 4 telas e uma aplicação no frontend foi construída para este processo. 
Na primeira tela, o front recupera informações de APIs externas.

Ao realizar uma integração com um parceiro, descobrimos que precisamos buscar informações em uma nova API, que vai retornar os 
dados do cliente do nosso parceiro, **então na primeira tela** da nossa jornada vamos receber um token do parceiro que vai nos dar acesso ao dados do cliente dele.

* O front precisa recuperar o token que chega via GET na URL. Parâmetro `token`;
* O backend vai receber o token do front e se comunicar com a API do parceiro para recuperar os registro do cliente;

1. Considerando as informações acima, descreva como seria a comunicação entre frontend > backend > API > backend > frontend;
2. Implemente uma classe que faz a recuperação do token chegando do front e consumindo uma API (fake).
   - A API só retorna dados dos clientes mediante o envio do token no cabeçalho;
   - A classe deve utilizar a estrutura de um projeto Laravel (controllers, services, etc);
   - O Laravel deve devolver dados cadastrais (nome, email, celular) para o front em formato json.

## Resolução do Problema

O problema tem maior foco em integrar com o parceiro, então temos verificação de token para consumimos a API do do mesmo. Implementei também o segundo conceito de **SOLID** - `'Open-Closed Principle'`. Com o ponto de vista que se precisamos integrar com um parceiro, futuramente poderiamos ter outras integrações, o que facilitaria em novas features. Sendo assim temos integrações de dois parceiros para testar as funcionalidades. Utilizei a API https://jsonplaceholder.typicode.com/users, e a consumi com a Lib [Guzzle](https://docs.guzzlephp.org/en/stable/) para ter uma melhor manipulação dos dados dos usuarios.
Feito isso é retornado os devidos dados em formato `JSON`.

### Testes

Utilizei TDD para construir a aplicação, imaginando os cenarios necessarios para cada etapa tanto com cenarios positivos e os negativos. E tratamento de erros com **`Exceptions`** personalizadas.

## Como rodar o projeto

```
1 - git clone https://github.com/Canhassi12/integrations-tests-laravel.git
2 - composer install
3 - Renomear .env.example para .env
4 - E em 'INTEGRATIONS_TOKEN' escreva algo.
```

## Como rodar os testes

Utilizei a lib PHPUnit ja presente no Laravel.

```
$ php artisan test
```

## Referências

[Laravel doc](https://laravel.com/docs/9.x) <br> [PHP doc](https://www.php.net) <br> [Guzzle](https://docs.guzzlephp.org/en/stable/)  

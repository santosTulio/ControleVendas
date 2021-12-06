# Controle de Vendas
Autor: [**Getulio dos Santos Araujo**](https://github.com/santosTulio)
### Instalação
* Para rodar esse código:
  1. Clone o projeto em um diretorio local:
    ```
     git clone https://github.com/santosTulio/ControleVendas.git
    ```
  2. Acesse a raiz desse diretório, caso não exista realize uma copia do arquivo .env.example, no seguinte comando:
    ```
    php -r "file_exists('.env') || copy('.env.example', '.env');"
    ```
   Faça as alterações que achar conveniente. Obs: Caso queira usar os dados dispostos na base de dado database.sqlite, não é necessario alterar qualquer parametro relativo ao banco de dados.
  3. Ainda na raiz instale as dependencia com o seguinte comando:
    ```
    composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist
    ```
  4. E por fim para executar o programa basta usar o seguinte comando:
     ```
     php artisan serve
     ```
  Agora por meio dos endpoint abaixo definido é possivel visualizar e fazer as alterações permitidas e viabilizada pela aplicação.

### Requisito da plataforma
* Só pode ser acessível pelos vendedores a partir de um login e senha:
  * O acesso aos endpoints descritos a seguir são realizado por meio de token, e ainda assim o usuario equivalente ao token passado no cabeçalho, deve está cadastrado como vendedor na plataforma.
  * A obtenção do token é realizada por meio de uma requisição POST no endpoint http://localhost:8000/api/login, com email e senha no corpo da requisição na seguinte estrutura:
  ```
    {
        "email": "fulano@example.com.br",
        "password": "vendedor#123"
    }
  ```
  (Usando o banco de dados database.sqlite disposto junto ao projeto, pode se usar os parametros acima exemplificado)
  * Obtendo como resposta um token, basta usa-lo no cabeçalho das demais requisições que dependem de tal autencação, no seguinte parametro:
  ```
  Authorization: Bearer <token_recebido>
  ```
  * Deve listar os pedidos e os produtos:
    * Para listar os pedidos basta fazer uma requisição GET ao endpoint http://localhost:8000/api/pedidos/. É esperado obter como resposta um JSON com a seguinte estrutura:
    ```
    [
      {
          "numero": 1,
          "cliente_id": "4",
          "vendedor_id": "1",
          "valorTotal": "467.02",
          "produtos_pedidos": [
              {
                  "id": 1,
                  "produto_id": "7",
                  "pedido_id": "1",
                  "quantidade": "2",
                  "valor_unitario": "46.97"
              },
              ...
          ]
      },
      ...
    ]
    ```
    * Idem para produtos no endpoint http://localhost:8000/api/produtos. É esperado obter como resposta um JSON com a seguinte estrutura:
    ```
    [
      {
        "id": 1,
        "codigo": "123456",
        "nome": "Gorgeous Rubber Watch ...",
        "cor": "Teal",
        "descricao": "Lorem lipsum ...",
        "valor": "78.55"
      },
      ...
    ]
    ```
* Necessário poder ver e editar os detalhes dos pedidos e dos produtos:
  * Pedidos:
    * Para visualizar os detalhes de um pedido basta fazer uma requisição GET para o endpoint http://localhost:8000/pedidos/<numero>, com <numero> sendo o numero do pedido a ser detalhado:
    ```
    {
          "numero": 1,
          "cliente_id": "4",
          "vendedor_id": "1",
          "valorTotal": "467.02",
          "produtos_pedidos": [
              {
                  "id": 1,
                  "produto_id": "7",
                  "pedido_id": "1",
                  "quantidade": "2",
                  "valor_unitario": "46.97"
              },
              ...
          ]
      }
    ```
    * Para alterar os parametros [cliente_id,vendedor_id e valorTotal] basta enviar uma resquisição PATCH para o mesmo endpoint anterior com os novos valores validos no corpo da requisição.
  * Produtos:
    * Para visualizar os detalhes de um produto basta fazer uma requisição GET para o endpoint http://localhost:8000/produtos/<id>, com <id> sendo o id do produto a ser detalhado:
    ```
    {
    "id": 11,
    "codigo": "353509",
    "nome": "Ergonomic Concrete Plate",
    "cor": "Aqua",
    "descricao": "veritatis sint voluptate illo et eligendi molestiae voluptatibus quaerat distinctio",
    "valor": "19.92"
    }
    ```
    * Para alterar qualquer dos detalhes de um produtos basta enviar uma resquisição PATCH para o mesmo endpoint anterior com os novos valores validos no corpo da requisição.


* Possibilidade de gerar um relatório detalhado de pedidos, que possa ser ordenado por valor, ou data de compra. O relatório precisa ser paginado.
  * Para obter tal relatorio basta realizar realizar uma requisição GET ao endpoint http://localhost:8000/relatorio/pedidos. Escolhemos por padrão ordenar o resultado da requisição pela data da compra, e possivel mudar a mesma adicionado uma query a url da requisição da seguinte forma:
  ```
    http://localhost:8000/api/relatorio/pedidos?orderby=<tipo_ordenação>
  ```
  Substituindo <tipo_ordenação> pelo tipo de ordenação: "valor" ou "data".
  * Para a paginação, usamos os parametros:
    * perPage : quantidade de pedidos por página. Minimo de 1 pedido por página. Definimos como padrão 5;
    * page: pagina a ser retornada. São contabilizada a partir da página 1. Exibimos por padrão a pagina inicial;
    Ambos aplicados na url de forma idem a ordenação, espera-se que a resposta seja algo semelhante a listagem dos pedidos e produtos.

##
## Dependencias

* ![SQLite](https://img.shields.io/badge/sqlite-%2307405e.svg?style=for-the-badge&logo=sqlite&logoColor=white)
* ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) Versão: *^7.3|^8.0*
* ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) Versão: *^8.65*
* [*Módulo de linguagem Português do Brasil (pt-BR) para Laravel >= 5.6*](https://github.com/lucascudo/laravel-pt-BR-localization)
* [*faker-provider-collection*](https://github.com/mbezhanov/faker-provider-collection)

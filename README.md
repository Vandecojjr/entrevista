# Avaliação
Projeto de avaliação das conhecimentos de desenvolvimento. 
Após finalizar, deve disponibilizar o link do repositório no github.

## Prazo
O candidato terá 3 dias corridos para finalizar o projeto.

## Especificações
Este projeto conta com o ambiente de banco dados já prepardo no docker.
* Docker
  * Postgres 14+
* Laravel (última versão)

## Observações
Quaisquer configurações ou alterações necessárias para que o projeto seja executado,
devem ser documentadas no projeto

# Objetivo
- Criar um sistema para controle de viagens.
- O Sistema deve conter as seguintes funcionalidades:
* Veículos
  * Modelo
  * Ano
  * Data de aquisição
  * KMs rodados no momento da aquisição
  * Renavam - Deve ser único
* Motoristas
  * Nome 
  * Data de nascimento - ter no minímo, 18 anos
  * N° da CNH.
* Viagens
  * Veiculo
  * KM Inicial no início da viagem
  * KM Final na volta da viagem
  * Motoristas


  ## Alterações Laravel
  Foi criado na pasta "Models", as models necessarias para tratar das entidades do banco de dados (Motorista, Veiculo, Viagens).
  Foi ciado tambem os "Controllers" para realização do CRUD de cada entidade.
  Foi criado as "Views" de layout, motoristas, veiculos e viagens.
  Foi criado no arquivo "/routes/web.php", as rotad para realização do CRUD de cada entidade.

  No arquivo .env foi configurado a conexão com o banco de dados postgres.
  Em provaiders/AppServiceProvider.php foi modificado o metodo root() para verificar a idade do motorista e consequentemente devolver uma mensgen de erro.
  Em resources foi criado os diretoris lang/pt e o arquivo validation.php para a tradução das mensagens de validação.

## Orientações 
Para executar o projeto, sera necessario a execução do comando "docker-compose up -d" no diretório "entrevista-app" para a executar o banco de dados.
Em seguida executar o Laravel em algun ambiente como o wampServer, Laragon, xamp, etc.. Eu recomento o Laragon.
Depois disso executar o comando "php artisan migrate" no terminal do diretório para executar as migrations e criar as tabelas.
Logo apos é acessar o site e verificar.


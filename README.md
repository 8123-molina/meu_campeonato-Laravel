# Meu campeonato
## Este projeto foi criado para simular uma campeonato que com 8 competidores participantes iniciais e finaliza com 1 Campeão, 2° e 3° lugar.
### Segue um telas demonstrativas (o intuito foi focar na lógica e não na parte de visualização).

* Versão Web

![127 0 0 1_laravel_meu_campeonato-Laravel_public_](https://user-images.githubusercontent.com/60671190/178127488-833c93c6-e66d-4ce4-b79d-e887b512b2df.png)
![127 0 0 1_laravel_meu_campeonato-Laravel_public_jogos_1](https://user-images.githubusercontent.com/60671190/178127489-fc63786e-8445-4d1a-bdeb-11365432392b.png)

* Versão Responsive mobile

![127 0 0 1_laravel_meu_campeonato-Laravel_public_ mobile](https://user-images.githubusercontent.com/60671190/178128306-79be3035-5876-4c89-ba71-7099926ed490.png)
![127 0 0 1_laravel_meu_campeonato-Laravel_public_jogos_1 mobile](https://user-images.githubusercontent.com/60671190/178128302-0b43f7ec-32e4-4526-a7e6-9260e0f5730a.png)


## Instalação

Para executar este projeto é necessario ter instalado em sua maquina os software Python, XAMPP, Composer e NPM algum manipulador de banco de dados exemplo MySQL( já incluso no Xampp) ou HeidiSQL.

## Caso não possua os itens acima segue meios para instalação.

- Xampp
> Para instalar o Xampp.
Siga os passsos conforme descrito pelo distribuidor.
Segue link Xamp:
    -https://www.apachefriends.org/pt_br/download.html
Ou busque no Google por Xamp.

- HeidiSQL
> Para instalar o HeidiSQL.
Siga os passsos conforme descrito pelo distribuidor.
Segue link HeidiSQL:
    -https://www.heidisql.com/download.php
Ou busque no Google por HeidiSQL.

- Python
> Para instalar o Python.
Siga os passsos conforme descrito pelo distribuidor.
Segue link Python:
    -https://www.python.org/
Ou busque no Google por Python.


- Composer
> Para instalar do Composer
Siga os passo conforme descrito pelo distribuidor
Segue link Composer:
 -https://getcomposer.org/

## Caso possua os itens acima siga os passos abaixo descritos. 
> Dentro da pas raiz do projeto executa os comandos
 > * composer install
 > * npm install

## Caso possua os itens acima segue meios para execução. 
> Dentro da pasta raiz do projeto executa os comandos
> * composer install
> * npm install


## Instalando bibliotecas Jquery e Bootstrap
> Atenção para instalar corretamente as bibliotecas e necessario comentar a linha que contem a rota em webpack.mix.jon que aponta para os arquivos e ir descomentando conforme for instalando as bibliotecas.
> Observação: procedimento para garantir o funcionamento correto.

## Instalando biblioteca JQUERY
Abra o terminal dentro da pasta raiz do projeto exemplo: c://src/meu_projeto/

>Execute os comandos 
> * npm install jquery
> * npm run dev

## Instalando biblioteca Bootstrap
Abra o terminal dentro da pasta raiz do projeto exemplo: c://src/meu_projeto/

> Execute os comandos 
> * npm install Bootstrap
> * npm run dev

## Será necessário gerar um arquivo Python com os codigos decritos e salvar na pasta c://src com nome teste.py
```
 import random
 print(random.randrange(0, 8, 1))
 print(random.randrange(0, 8, 1))
```

## Criando banco de dados

* Em seu gerenciador de banco de dados utilize o comando:
```
 CREATE DATABASE meu_campeonato;
```
## Após finalizao os procedimentos acima vamos abra o projeto em um editor de codigo de sua preferência abra o terminal na pasta raiz do projeto e execute os comandos:

* Em seu gerenciador de banco de dados utilize o comando:
> * Execute os comandos
> * php artisan migrate

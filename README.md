ScupTel Project
============

Objetivos
-----

[Descrição dos Objetivos](docs/ShowmethecodeBackend.pdf)


Instalação
-----

1) Instale e configure o servidor web Apache (https://httpd.apache.org/docs/2.4/install.html). Caso utilize Ubuntu/Debian use o comando: "sudo apt-get install apache2"

2) Prepare seu ambiente para rodar aplicações PHP (5.x) (http://php.net/manual/pt_BR/install.php) com suporte ao banco PostgreSQL. Caso utilize Ubuntu/Debian use o comando: "apt-get install php5-pgsql"

3) Instale o banco de dados PostgreSQL 9.x (http://www.postgresql.org/download/). Caso utilize Ubuntu/Debian use o comando: "sudo apt-get install postgresql-9.4"

4) Conecte ao PostgreSQL e execute o arquivo "dump.sql" localizado na pasta raiz do projeto 

5) Cole o código fonte no root_dir configurado em seu Apache

6) Acesse http://localhost/scuptel/


Configurações
-----

Edite as configurações de conexão com o banco no arquivo [ROOT]/util/DBConnection.class.php


Testes
-----

Alguns testes unitários podem ser encontrados em [ROOT]/tests. Para executá-los, entre na pasta [ROOT]/tests e execute:

```
./run_tests.sh
```


Exemplo da Aplicação
-----

![Exemplo da Aplicação](docs/sample.jpg?raw=true)
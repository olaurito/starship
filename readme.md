# AMLDD

Parabéns! Você foi aprovado para a próxima fase deste processo seletivo!

Nesta próxima fase a ideia é entender seu conhecimento com a nossa Stack. Para facilitar o processo, iremos usar alguns artifícios...
Usaremos o [Json Server](https://www.npmjs.com/package/json-server#getting-started) - esta aplicação irá criar uma API REST basado em um arquivo JSON - [neste vídeo](https://www.youtube.com/watch?v=-LF_TOnaH4Y) tem uma explicação sobre o Json Server.

Junto com este aquivo, você está recebendo um dump da chamada de listagem de Espaçonaves do Star Wars disponibilizado pela [API SWAPI](https://swapi.dev/documentation#starships). Você deverá utilizar o arquivo db.json junto com o Json Server.


Para instalar o JSON Server utilize 
~~~
npm install -g json-server
~~~

Para iniciar a API utilize o seguinte comando.
~~~
json-server --watch db.json
~~~


## Desafio CRUD
O seu desafio é criar as quatro operações do CRUD (create, read, update e delete) com PHP.
Você tem toda a liberdade de modelar a arquitetura e a solução da maneira que vc achar mais interessante.

Neste desafio, você precisará:
 - Criar uma tela de listagem das espaçonaves, com pelo menos o Nome, Fabricante e Preço - além das operações (visualizar, editar, deletar);
 - Criar uma tela de visualização da espaçonave com TODAS as informações disponíveis do cadastro;
 - Na tela de visualização, é importante que exista explicações para cada um dos atributos (isso está naquele link informado);
 - Criar uma tela de adição / edição para fazer os ajustes. Lembrando que as requisições de adição e edição são diferentes ;)
 - Criar funcionalidades para exclusão de registro.

Vc recebeu este ZIP com essas informações e o arquivo da API. O retorno aguardado é neste mesmo ZIP com os arquivos do projeto em PHP finalizados. Se você tiver alguma dúvida, por favor, nos acione :)

## RESULTADO

SCRIPT p/ criar o **banco** e suas **tabelas**:
~~~
CREATE TABLE `starship` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(45) NOT NULL,
`manufacturer` varchar(145) NOT NULL,
`cost_in_credits` varchar(45) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8
~~~


Para Visualizar os resultados é preciso utilizar o software **[postman](https://www.postman.com/downloads/)**

no terminal inicie o server local
~~~
php -S 127.0.0.1:8000
~~~

## CRUD
verbo POST - Criar as naves no BD pela api 
~~~
 http://127.0.0.1:8000/starship/api/create
~~~~
verbo GET - 
Buscar por id
~~~~
http://127.0.0.1:8000/starship/api/single_read/?id=1
~~~~
verbo GET -
Buscar todas as naves
~~~~
http://127.0.0.1:8000/starship/api/read
~~~~
verbo PUT - 
atualizar alguma nave
~~~~
http://127.0.0.1:8000/starship/api/update/?id=1&name=Olaurito Neto&manufacturer=Ndigital exemplo 2
~~~~
verbo DELETE -
Deletar alguma nava
~~~
http://127.0.0.1:8000/starship/api/delete/?id=1
~~~
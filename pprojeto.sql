CREATE DATABASE projeto;
use projeto;
create table cadastro(
usuario varchar (20) not null primary key,
email varchar (80) not null,
senha varchar (8) not null
);
create table login(
usuario int not null primary key,
senha varchar (8) not null
);
create table produtos(
id int not null  primary key auto_increment,
nome_produto varchar (30) not null,
marca varchar (20) not null,
descricao varchar (100) not null
);
create table componentes(
id_componete int not null primary key auto_increment,
nome_componentes varchar (100)not null,
descricao_componente varchar (400) not null
);
create table tabela_nutricional(
id_produto int,
qtd_porcao varchar (10) not null,
porcentagem float not null,
nome_componentes varchar (100) not null,
descricao_componente varchar (400) not null,
foreign key (id_produto) references produtos (id) on delete cascade on update cascade
);

select * from  tabela_nutricional;





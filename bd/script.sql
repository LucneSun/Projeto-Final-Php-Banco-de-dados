create database if not exists mmo;
use mmo;

create or replace table usuario(id int primary key auto_increment, login varchar(30) not null unique, nome varchar(250) not null, email varchar(250) not null unique, creat_at TIMESTAMP not null default CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into usuario(login, nome, email) values ('admin123', 'administrador', 'admin@senac.com.br');
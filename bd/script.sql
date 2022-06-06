create database if not exists mmo;
use mmo;

create or replace table usuario(id int primary key auto_increment, login varchar(30) not null unique, nome varchar(250) not null, email varchar(250) not null unique, senha int not null, creat_at TIMESTAMP not null default CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=latin1;
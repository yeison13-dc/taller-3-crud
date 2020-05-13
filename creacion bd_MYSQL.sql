create database if not exists tienda;
use tienda;
create table pais
(
    pai_id varchar(60),
    pai_nom varchar(60) not null,
    pai_des varchar(250) default 'no se encuentra descripcion',
    primary key (pai_id)
);

create table desarrollador
(
	des_cc int,
    des_nom varchar (60) not null,
    des_ape varchar (60) not null,
    des_pai_id int not null,
    primary key (des_cc),
    foreign key (des_pai_id) references pais(pai_id)
);

create table cliente
(
	cli_cc int,
    cli_nom varchar (60) not null,
    cli_ape varchar (60) not null,
    cli_pai_id int not null,
    primary key (cli_cc),
    foreign key (cli_pai_id) references pais(pai_id)
);

create table tipo
( 
	tip_id int,
    tip_nom varchar(60) not null,
    primary key (tip_id)
);

create table juego
(
	jue_id int,
    jue_nom varchar (60) not null,
    jue_val int not null,
    jue_des_cc int,
    jue_tip_id int,
    primary key (jue_id),
    foreign key (jue_des_cc) references desarrollador (des_cc),
    foreign key (jue_tip_id) references tipo (tip_id)
);

create table recibo
(
	rec_id int,
    rec_val int not null,
    rec_gra varchar(250) default 'gracias por su compra',
    rec_cli_cc int,
    rec_jue_id int,
    primary key (rec_id),
    foreign key (rec_cli_cc) references cliente (cli_cc),
    foreign key (rec_jue_id) references juego (jue_id)
);

select *
from pais

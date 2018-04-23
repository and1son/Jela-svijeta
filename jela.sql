drop database if exists jela;
create database jela default character set utf8;
use jela;

create table jelo(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
opis varchar(50),
cijena int,
tag int not null,
kategorija int not null


);

create table sastojak(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
slug varchar(50) not null
);

create table jelo_sastojak(
jelo int not null,
sastojak int not null

);

create table kategorija(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
slug varchar(50) not null
);

create table tag(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
slug varchar(50) not null
);

alter table jelo add foreign key (tag) references tag(sifra);
alter table jelo_sastojak add foreign key (jelo) references jelo(sifra);
alter table jelo_sastojak add foreign key (sastojak) references sastojak(sifra);
alter table jelo add foreign key (kategorija) references kategorija(sifra);


drop database if exists jela;
create database jela default character set utf8;
use jela;
#f:\Programs\xampp\mysql\bin\mysql.exe -uroot -p --default_character_set=utf8 < f:\Programs\xampp\htdocs\Jela\jela.sql

create table jelo(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
opis varchar(50),
cijena int,
tag int not null,
kategorija int null

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

insert into sastojak(naziv,slug) values
	('rajčica','slug-rajc'),
	('sir','slug-sir'),
	('gljive','slug-gljive'),
	('sunka','slug-sunka'),
	('kobasica','slug-kobasica'),
	('grah','slug-grah'),
	('kukuruz','slug-kukuruz'),
	('feferoni','slug-feferoni'),
	('pršut','slug-pršut'),
	('masline','slug-masline'),
	('suhi vrat','slug-suhivrat'),
	('jaje','slug-jaje'),
	('kethup','slug-kethup'),
	('slanina','slug-slanina'),
	('luk','slug-luk'),
	('mozzarela','slug-mozzarela'),
	('bosiljak','slug-bosiljak');

insert into kategorija(naziv,slug) values
	('pizza','slug-pizza'),
	('grill','slug-grill'),
	('sendviči','slug-sendvici'),
	('salate','slug-salate'),
	('riba','slug-riba'),
	('juha','slug-juha'),
	('vege','slug-vege'),
	('doručak','slug-dorucak'),
	('deserti','slug-deserti');

insert into tag(naziv,slug) values
	('naslov taga 1','slug-tag1'),
	('naslov taga 2','slug-tag2'),
	('naslov taga 3','slug-tag3'),
	('naslov taga 4','slug-tag4'),
	('naslov taga 5','slug-tag5'),
	('naslov taga 6','slug-tag6'),
	('naslov taga 7','slug-tag7'),
	('naslov taga 8','slug-tag8'),
	('naslov taga 9','slug-tag9');

insert into jelo(naziv,opis,cijena,tag,kategorija) values
	('Margarita','null','null','1','1'),
	('Vesuvio','null','null','2','1'),
	('Slavonska','null','null','3','1'),
	('Biftek na žaru','null','null','1','2'),
	('Biftek s gljivama','null','null','1','2'),
	('Kulen sendvič','null','null','1','3');


insert into jelo_sastojak(jelo,sastojak) values
	(1,1),(1,2),(1,3),(2,1),(2,4),(2,5),(2,6),(3,1),(3,5),(3,6),(3,7),(3,8);


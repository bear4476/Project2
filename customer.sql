create table customer(
id int(4) not null,
writer varchar(20) not null,
email varchar(40),
passwd varchar(40),
topic varchar(50) not null,
content text not null,
hit int(3) not null,
wdate varchar(20) not null,
space int(2),
primary key(id) );
create table member(
 uid varchar(12),
 upass varchar(15),
 uname varchar(10),
 mphone varchar(15),
 email varchar(30),
 zipcode varchar(7),
 addr1 varchar(50),
 addr2 varchar(50),
 approved int(1) default 0,
 primary key(uid));
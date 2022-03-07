 create database if not exists appusers;
 use appusers;
CREATE TABLE if not exists appuserstbl (id int  AUTO_INCREMENT, username varchar(50),user_password varchar(8),PRIMARY KEY(id));
insert into appuserstbl (username,user_password) values ("muhammed","123");
insert into appuserstbl (username,user_password) values ("abdo","12");

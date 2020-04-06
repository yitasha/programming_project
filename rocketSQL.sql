drop database if exists account;
create database account;
use account;

create table user(
userid int NOT NULL auto_increment,
firstname varchar(20),
lastname varchar (20),
phone varchar(15),
email varchar (40),
address1 varchar (40),
address2 varchar (40),
postcode int,
state varchar(10),
username varchar (20),
password varchar (30),
primary key (userid)
);


/*INSERT INTO user (userid, firstname, lastname, phone, email, address1, address2, postcode, state, username, password)
VALUES (null,'Yi','Sexy', '0466888000','yitashasimida@gmail.com','20 xxx street','Address 2 none','3000','VIC','yi','abc123');
*/
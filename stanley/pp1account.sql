drop database if exists account;
create database account;
use account;

create table user(
userid int NOT NULL auto_increment,
firstname  varchar(20) NOT NULL,
lastname varchar (20) NOT NULL,
phone varchar(20) NOT NULL,
email varchar (20) NOT NULL,
address1 varchar (40) NOT NULL,
address2 varchar (40),
postcode int NOT NULL,
state varchar(10) NOT NULL,
username varchar(20) NOT NULL,
password varchar (20) NOT NULL,
primary key (userid)
);

create table admin(
adminid int NOT NULL auto_increment,
username varchar(20) NOT NULL,
password varchar(20) NOT NULL,
adminname varchar(20) NOT NULL,
phone varchar(20) NOT NULL,
primary key (adminid)
);

create table products(
productid int NOT NULL auto_increment,
productname varchar(40) NOT NULL,
description varchar(60) NOT NULL,
datelisted date NOT NULL,
lastedited date,
user_userid   int NOT NULL,
primary key(productid)
);

create table specs(
specid int NOT NULL auto_increment,
price int NOT NULL,
batterylife int NOT NULL,
graphics varchar (40) NOT NULL,
processor varchar (40) NOT NULL,
ramsize int NOT NULL,
brand varchar(20) NOT NULL,
screensize decimal(4,2) NOT NULL,
resolution varchar(15) NOT NULL,
warranty int NOT NULL,
opersys varchar (40) NOT NULL,
weight decimal (3,2) NOT NULL,
product_productid int NOT NULL,
primary key(specid)
);
create table phones(
phoneid int NOT NULL auto_increment,
memorysize int NOT NULL,
camera int NOT NULL,
network varchar(5) NOT NULL,
product_productid   int NOT NULL,
primary key (phoneid)
);

create table computers(
computerid int NOT NULL auto_increment,
purpose varchar(20) NOT NULL,
harddrivesize int NOT NULL,
wireless varchar (40) NOT NULL,
product_productid   int NOT NULL,
primary key (computerid)
);
ALTER TABLE products
    ADD CONSTRAINT products_user_fk FOREIGN KEY ( user_userid )
        REFERENCES user ( userid );
        
ALTER TABLE phones
    ADD CONSTRAINT phones_product_fk FOREIGN KEY ( product_productid )
        REFERENCES products ( productid );
        
ALTER TABLE computers
    ADD CONSTRAINT computers_product_fk FOREIGN KEY ( product_productid )
        REFERENCES products ( productid );
        
ALTER TABLE specs
    ADD CONSTRAINT specs_product_fk FOREIGN KEY ( product_productid )
        REFERENCES products ( productid );
        
insert into admin values (1, 'stanley', 'accord','stanleyyeo',0451968897);
insert into admin values (2, 'tayjiahong', 'ilikecloud','tayjh',0412345678);

insert into user values (1, 'alan', 'dodgson',0423456789,'alan@outlook.com','570 lygon st','',3053,'VIC','alanrd','alanisgood');
insert into user values (2, 'amy', 'hodghes',0458965421,'amy@outlook.com','32 gippsland st','',3020,'VIC','amyrh','amyfantastic');

insert into products values(1,'hp probook 430 g4','a business notebook for your needs','2020-03-01','2020-03-02', 1);
insert into products values(2,'samsung galaxy a20','the smartest smartphone in the world','2020-03-03','2020-03-04', 2);

insert into specs values(1,1029,7,'intel graphics hd 620','intel core i5',8,'HP',13.2,'1366x768',2,'windows 10 pro',1.6,1);
insert into specs values(2,1300,12,'scorpion graphics 1','scorpion x1',6,'Samsung',6.1,'1920x1080',2,'android 10.1',0.3,2);

insert into phones values(1,64,12,'5G',2);

insert into computers values (1,'business',500,'intel wireless',1);
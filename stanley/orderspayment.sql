create table orders(
orderid int not null auto_increment,
quantity int not null,
totalprice int not null,
user_userid int not null,
computer_computerid int,
phone_phoneid int,
primary key (orderid)
);

create table payment(
paymentid int not null auto_increment,
creditcardno int not null,
expirydate varchar(10) not null,
cvv smallint (5) not null,
mastervisa varchar (10) not null,
orders_orderid int not null,
primary key (paymentid)
);

ALTER TABLE orders
	ADD CONSTRAINT order_computer_fk FOREIGN KEY (computer_computerid)
		REFERENCES computer ( computerid );

ALTER TABLE orders
	ADD CONSTRAINT order_phone_fk FOREIGN KEY (phone_phoneid)
		REFERENCES phone ( phoneid );

ALTER TABLE payment
	ADD CONSTRAINT orders_order_fk FOREIGN KEY (orders_orderid)
		REFERENCES orders ( orderid );
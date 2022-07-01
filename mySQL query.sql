create database ebay;
 
use ebay;
 
create table items(
    item_number varchar(30),
    itemName varchar(60),
    link varchar(100),
    primary key(item_number));
    
create table orderdetails(
	order_number varchar(30) primary key,
	sold_price float,
	buying_price float,
	profit float,
	tracking_number varchar(100),
	itemID varchar(30),
	description varchar(100),
	date date,
	quantity int,
	foreign key(itemID) references items(item_number));

create table buyer_details(
    name varchar(100),
    username varchar(50),
    address varchar(100),
    city varchar(60),
    state varchar(60),
    phonenumber varchar(60),
    zipcode varchar(40),
    country varchar(50),
    orderID varchar(30),
    foreign key(orderID) references orderdetails(order_number));

create table ali_details(
    aliorderid varchar(50) primary key,
    link varchar(100),
    orderid varchar(50),
    foreign key(orderid) references orderdetails(order_number));
        
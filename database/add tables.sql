create table tarea(
 name char(12) not null,
 price_multiplier float not null default 1.0, 
 primary key (name)
); 

create table seat(
 row_no char(3) not null,
 area_name char(12) not null,
 primary key (row_no),
 foreign key (area_name) references tarea(name)
);

create table production(
 title varchar(100) not null,
 basic_price numeric(5,2) not null,
 intro varchar(500) ,
 primary key (title)
);

create table performance(
 date_time datetime not null,
 title varchar(100) not null,
 primary key (date_time),
 foreign key (title) references production(title)
);

create table booking(
 ticket_no mediumint not null AUTO_INCREMENT,
 row_no char(3) not null,
 performance char(100) not null,
 date_time datetime not null,
 customer_name varchar(300) not null,
 customer_address varchar(500),
 
 primary key (ticket_no),
 foreign key (row_no) references seat(row_no),
 foreign key (date_time) references performance(date_time)
);








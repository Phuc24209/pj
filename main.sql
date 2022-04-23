create table admin(
    id int auto_increment primary key,
    name varchar(30),
    avartar varchar(255),
    email varchar(255) unique,
    user_name varchar(50),
    phone char(10) unique,
    address varchar(250),
    password varchar(32),
    roles tinyint(1)
    
);

create table type_product(
    id int auto_increment primary key,
    name varchar(100)
);

create table color(
    id int auto_increment primary key,
    color varchar(30)
);
 create table brand(
     id int auto_increment primary key,
     brand varchar(30),
     image varchar(255)
 );
 create table size(
    id_size int auto_increment primary key,
    size char(5)
);
 create table product(
    id_product char(6) primary key,
    id_type int,
    name varchar(100),
    descrip varchar(250),
    FOREIGN KEY (id_type) REFERENCES type_product(id)

);
create table image(
     id int auto_increment,
     image varchar(255),
     id_product char(6),
     primary key(id,id_product),
     FOREIGN KEY (id_product) REFERENCES product(id_product)
 );


create table warehouse (
    id int auto_increment primary key,
    name varchar(100),
    address varchar(250)
);
create table product_detail(
    id int auto_increment,
    id_product char(6),
    id_size int ,
    id_color int,
    id_brand int,
    id_warehouse int,
    quantity int,
    price double,
    primary key(id,id_product,id_size,id_color,id_brand,id_warehouse),
    FOREIGN KEY (id_product) REFERENCES product(id_product),
    FOREIGN KEY (id_color) REFERENCES color(id),
    FOREIGN KEY (id_size) REFERENCES size(id_size),
    FOREIGN KEY (id_brand) REFERENCES brand(id),
    FOREIGN KEY (id_warehouse) REFERENCES warehouse(id)
);
create table supplier(
    id int auto_increment,
    name varchar(100),
    id_product_detail int,
    address varchar(250),
    phone char(10) unique,
     primary key(id,id_product_detail),
    FOREIGN KEY (id_product_detail) REFERENCES product_detail(id)

 );
 create table receipt(
    id int auto_increment,
    id_product_detail int,
    id_admin int,
    id_warehouse int,
    id_supplier int,
    date_receipt date,
    quantity int,
    primary key(id,id_product_detail,id_supplier),
    FOREIGN KEY (id_supplier) REFERENCES supplier(id),
    FOREIGN KEY (id_product_detail) REFERENCES product_detail(id),
    FOREIGN KEY (id_admin) REFERENCES admin(id),
    FOREIGN KEY (id_warehouse) REFERENCES warehouse(id)
    
 );

 create table issue(
    id int auto_increment,
    id_product_detail int,
    id_admin int,
    id_warehouse int,
    date_issue date,
    quantity int,
    primary key(id,id_product_detail),
    FOREIGN KEY (id_product_detail) REFERENCES product_detail(id),
    FOREIGN KEY (id_admin) REFERENCES admin(id),
    FOREIGN KEY (id_warehouse) REFERENCES warehouse(id)
 );

 create table warehouse_transfer(
    id int auto_increment,
    id_product_detail int,
    id_admin int,
    id_warehouse int,
    id_warehouse_old int,
    date_transfer date,
    quantity int,
    primary key(id,id_product_detail),
    FOREIGN KEY (id_product_detail) REFERENCES product_detail(id),
    FOREIGN KEY (id_admin) REFERENCES admin(id),
    FOREIGN KEY (id_warehouse) REFERENCES warehouse(id)
    
 );
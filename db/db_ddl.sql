create database carritocompras;
use carritocompras;

create table compras (
 id int(11) Not Null Auto_Increment,
 numeroVenta int (11) not null,
 nombre varchar (45) not null,
 imagen varchar (45) not null,
 precio DECIMAL(6,2) not null,
 cantidad int (4) not null,
 subtotal int (12) not null,
 primary key (id));
 
CREATE TABLE productos (
  id int(11) NOT NULL AUTO_INCREMENT primary key,
  nombre VARCHAR(45) NULL,
  descripcion VARCHAR(45) NULL,
  imagen VARCHAR(45) null,
  precio DECIMAL(6,2) NULL
);

CREATE TABLE admins(
 idadmin int(6) UNSIGNED NOT NULL AUTO_INCREMENT primary key,
 uname varchar (10) NOT NULL UNIQUE,
 psw varchar (30) not null
);

/*inserta un admin por default*/
insert into admins values (null,'admin','%ÕZÒƒª@\nôdÇmq<­');

CREATE TABLE usuarios(
 id SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT primary key,
 uname varchar (10) NOT NULL UNIQUE,
 email varchar (20) NOT NULL UNIQUE,
 psw varchar (30) NOT NULL,
 nombre varchar(20) not null,
 apellido varchar(20) not null,
 edad TINYINT(2)not null,
 genero varchar(6)not null
);

CREATE TABLE direcciones(
 id_dire int(5) NOT NULL AUTO_INCREMENT,
 direccion varchar (45) NOT NULL,
 ciudad varchar (45) NOT NULL,
 estado varchar (45) NOT NULL,
 cp TINYINT(5)not null,
 id_user SMALLINT(5) UNSIGNED NOT NULL,
 primary key(id_dire),
 foreign key (id_user)references usuarios(id)
);

select * from direcciones;
select id from usuarios where uname='jesus ruiz';

select * from direcciones d
join usuarios u on u.id = d.id_user
where u.uname="pacheco"
order by id_dire desc
limit 1;

select count(*) from productos;
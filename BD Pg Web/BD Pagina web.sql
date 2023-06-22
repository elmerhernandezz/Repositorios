create database if not exists Facturacion;
use Facturacion;

create table Categorias(
	id_Categoria int primary key auto_increment,
    Categoria varchar(60) not null
);

create table Productos(
	id_Producto int primary key auto_increment,
    Nombre_Producto varchar(200) not null,
    Precio decimal(6,2) not null,
    Stock int not null,
    id_Categoria int not null,
    foreign key (id_Categoria) references Categorias(id_Categoria)
);

create table Clientes(
	id_Cliente int primary key auto_increment,
    Nombres varchar(100) not null,
    Apellidos varchar(100) not null,
    Direccion varchar(200) not null,
    Fecha_Nacimiento date not null,
    Telefono varchar(15) not null,
    Email varchar(150) not null
);

create table Facturas(
	num_Factura int primary key auto_increment,
    id_Cliente int not null,
    Fecha_Factura date not null,
    Descuento decimal(6,2),
    Total decimal(7,2) not null,
    foreign key (id_Cliente) references Clientes(id_Cliente)
);

create table Detalles_factura(
	num_Detalle int primary key auto_increment,
    id_Factura int not null,
    id_Producto int not null,
    Cantidad int not null,
    Precio decimal(6,2) not null,
    foreign key (id_Factura) references Facturas(num_Factura),
	foreign key (id_Producto) references Productos(id_Producto)
);
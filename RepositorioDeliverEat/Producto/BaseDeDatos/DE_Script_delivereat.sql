-- we don't know how to generate schema de_delivereat (class Schema) :(
create table if not exists t_comercio_adherido
(
	id_comercio int auto_increment
		primary key,
	nombre varchar(40) null,
	descripcion varchar(40) null,
	direccion varchar(40) null,
	imagen_url varchar(40) null,
	imagen_url_grande varchar(40) null
)
charset=latin1
;

create table if not exists t_detalles_pedido
(
	id_detalle_pedido int not null,
	id_producto int not null,
	cantidad int null,
	precio decimal null,
	primary key (id_detalle_pedido, id_producto)
)
charset=latin1
;

create index fk_producto
	on t_detalles_pedido (id_producto)
;

create table if not exists t_formas_de_pago
(
	id_forma_de_pago int auto_increment
		primary key,
	nombre varchar(40) null
)
charset=latin1
;

create table if not exists t_pedido
(
	id_pedido int auto_increment
		primary key,
	id_detalle_pedido int null,
	id_forma_de_pago int null,
	fecha_hora timestamp default CURRENT_TIMESTAMP not null on update CURRENT_TIMESTAMP,
	domicilio_de_entrega varchar(40) null,
	fecha_hora_entrega varchar(40) null,
	con_cuanto_paga decimal null,
	cod_tarjeta decimal null,
	cod_seguridad_tarjeta decimal null,
	nombre_tarjeta varchar(40) null,
	vencimiento_tarjeta varchar(40) null,
	constraint fk_forma_de_pago
		foreign key (id_forma_de_pago) references t_formas_de_pago (id_forma_de_pago)
)
charset=latin1
;

create index fk_detalle_pedido
	on t_pedido (id_detalle_pedido)
;

create table if not exists t_productos
(
	id_producto int auto_increment
		primary key,
	id_comercio int null,
	descripcion varchar(200) null,
	nombre varchar(40) null,
	precio decimal(3) null,
	peso decimal null,
	imagen_url varchar(200) null,
	constraint fk_comercio
		foreign key (id_comercio) references t_comercio_adherido (id_comercio)
)
charset=latin1
;

INSERT INTO t_comercio_adherido(nombre, descripcion, direccion, imagen_url)
VALUES ('Pato Restaurant', 'Comida Asiatica', 'Obispo Salguero 115', 'images/icons/logo.png');

INSERT INTO t_productos(id_comercio, descripcion, nombre, precio, peso, imagen_url)
VALUES (1,'Pollo Asado para 4 personas con Fritas','Pollo Asado', 350, 3, 'images/producto-1.jpg');

INSERT INTO t_productos(id_comercio, descripcion, nombre, precio, peso, imagen_url)
VALUES (1,'Queso, Queso Azul, Jamon Crudo, Jamon Cocido','Picada', 220, 1, 'images/producto-2.jpg');

INSERT INTO t_productos(id_comercio, descripcion, nombre, precio, peso, imagen_url)
VALUES (1,'Pollo a la plancha con especias','Pollo Grill', 350, 1, 'images/producto-8.jpg');

INSERT INTO t_productos(id_comercio, descripcion, nombre, precio, peso, imagen_url)
VALUES (1,'Ensalda Mixta con tomate, lechuga, huevo duro, remolacha, zanahoria y salmon','Ensalada Completa', 100, 1, 'images/producto-7.jpg');
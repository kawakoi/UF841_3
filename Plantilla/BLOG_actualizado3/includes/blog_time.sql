DROP DATABASE IF EXISTS blog_time;
CREATE DATABASE blog_time CHARACTER SET utf8mb4;
USE blog_time;
​
CREATE TABLE usuarios(
  id INT auto_increment not null,
  nombre varchar(100) not null,
  apellidos varchar(100) not null,
  email varchar(255) not null,
  pass varchar(255) not null,
  fecha date not null,
  CONSTRAINT pk_usuarios PRIMARY KEY(id)
);
​
CREATE TABLE categorias(
    id INT auto_increment not null,
    nombre varchar(100),
    CONSTRAINT pk_categorias PRIMARY KEY(id)
);
​
CREATE TABLE entradas(
    id  INT auto_increment not null,
    usuario_id int(255) not null,
    categoria_id int(255) not null ,
    titulo varchar(255) not null,
    descripcion MEDIUMTEXT,
    fecha       DATE not null,
    CONSTRAINT pk_entradas PRIMARY KEY(id),
    CONSTRAINT fk_entrada_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
    CONSTRAINT fk_entrada_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
);

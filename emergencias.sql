CREATE DATABASE emergencias;

CREATE TABLE usuario (
    dni varchar(15) NOT NULL PRIMARY KEY,
    nombre varchar(45) NOT NULL,
    apellido varchar(45) NOT NULL,
    emergencia varchar(255), 
    PRIMARY KEY (dni)
);

INSERT INTO usuario (dni, nombre, apellido, emergencia)
VALUES ('77345678A', 'Rodolfo', 'Rodríguez', 'Se ha dado un golpe en la cabeza mientras estaba distraído observando el baile de cortejo de unas palomas')
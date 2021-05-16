CREATE DATABASE CLIENTS;

USE CLIENTS;

CREATE TABLE CLIENT(
	name varchar(255),
    lastName varchar(255),
    age int,
    id int,
    city varchar(255),
    neighborhood varchar(255),
    email varchar(255),
    phoneNumber varchar(255),
    commentary varchar(255)
); 
INSERT INTO CLIENT
(name, lastName,age,id, city,neighborhood,email, phoneNumber, commentary) VALUES
('Daniela','Diaz',20,1032508052,'Bogota','Kennedy','danielad_diazl@ecci.edu.co',3212192258,'Estoy interesada en un criollito');

SELECT * FROM CLIENT;
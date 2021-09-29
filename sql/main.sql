DROP DATABASE IF EXISTS bromatologia;
CREATE DATABASE IF NOT EXISTS bromatologia;

CREATE TABLE Roles(
    RolId INT NOT NULL AUTO_INCREMENT,
    Rol VARCHAR(255) NOT NULL,
    PRIMARY KEY(RolId)
) ENGINE = INNODB; 

CREATE TABLE IF NOT EXISTS Usuarios(
    UsuarioId INT NOT NULL AUTO_INCREMENT,
    Usuario VARCHAR(64) NOT NULL,
    Nombre VARCHAR(255) NOT NULL,
    Apellido VARCHAR(255) NOT NULL,
    Nacimiento DATE NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Clave VARCHAR(255) NOT NULL,
    Activo BOOLEAN NOT NULL,
    RolId INT NULL,
    PRIMARY KEY(UsuarioId),
    FOREIGN KEY(RolId) REFERENCES Roles(RolId)
) ENGINE = INNODB; 

CREATE TABLE IF NOT EXISTS Propietarios(
    PropietarioId INT NOT NULL AUTO_INCREMENT,
    DNI INT NOT NULL,
    Nombre VARCHAR(255) NOT NULL,
    Apellido VARCHAR(255) NOT NULL,
    Email VARCHAR(255),
    Telefono VARCHAR(255),
    Direccion VARCHAR(255),
    PRIMARY KEY(PropietarioId)
) ENGINE = INNODB; 

CREATE TABLE IF NOT EXISTS Perros(
    PerroId INT NOT NULL AUTO_INCREMENT,
    TatooId VARCHAR(255) NOT NULL,
    FotoUrl VARCHAR(255),
    Apodo VARCHAR(255),
    Raza VARCHAR(255),
    Castracion DATE,
    Adopcion DATE NOT NULL,
    Observacion VARCHAR(255),
    PropietarioId INT NULL,
    PRIMARY KEY(PerroId),
    FOREIGN KEY(PropietarioId) REFERENCES Propietarios(PropietarioId)
) ENGINE = INNODB;

INSERT INTO Roles(Rol)
VALUES("Administrador"),("Tatuador");

INSERT INTO Usuarios(
    Usuario,
    Nombre,
    Apellido,
    Nacimiento,
    Email,
    Clave,
    Activo,
    RolId
)
VALUES(
    "BromatologiaSaladillo",
    "Bromatologia",
    "Saladillo",
    "2021-09-23",
    "-",
    "$2a$12$ZF23CpD6UhclIfa.aXiAtuGi5FaQ3UO4qO4ERDwipm3FPWzcw2qVy",
    1,
    1
);

DROP DATABASE IF EXISTS bromatologia;
CREATE DATABASE IF NOT EXISTS bromatologia;

CREATE TABLE IF NOT EXISTS Usuarios (
  UsuarioID INT NOT NULL AUTO_INCREMENT,
  Usuario VARCHAR(64) NOT NULL,
  Nombre VARCHAR(255) NOT NULL,
  Apellido VARCHAR(255) NOT NULL,
  Nacimiento DATE NOT NULL,
  Email VARCHAR(255) NOT NULL,
  Clave VARCHAR(255) NOT NULL,
  Administrador BOOLEAN NOT NULL,
  Activo BOOLEAN NOT NULL,
  PRIMARY KEY (UsuarioID)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Propietarios (
  PropietarioID INT NOT NULL AUTO_INCREMENT,
  DNI INT NOT NULL,
  Nombre VARCHAR(255) NOT NULL,
  Apellido VARCHAR(255) NOT NULL,
  Email VARCHAR(255),
  Telefono VARCHAR(255),
  Direccion VARCHAR(255),
  PRIMARY KEY (PropietarioID)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Perros (
  PerroID INT NOT NULL AUTO_INCREMENT,
  TatooID INT NOT NULL,
  Apodo VARCHAR(255),
  Raza VARCHAR(255),
  Castracion DATE,
  Adopcion DATE NOT NULL,
  Observacion VARCHAR(255),
  PropietarioID INT,
  PRIMARY KEY (PerroID),
  FOREIGN KEY (PropietarioID) REFERENCES Propietarios(PropietarioID)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Vacunas (
  VacunaID INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(255),
  PRIMARY KEY (VacunaID)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS FotosPerros (
  FotoID INT NOT NULL AUTO_INCREMENT,
  url VARCHAR(255) NOT NULL,
  PerroID INT NOT NULL,
  PRIMARY KEY (FotoID),
  FOREIGN KEY (PerroID) REFERENCES Perros(PerroID)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS VacunasPerros (
  VacunasPerrosID INT NOT NULL AUTO_INCREMENT,
  VacunaID INT NOT NULL,
  PerroID INT NOT NULL,
  PRIMARY KEY (VacunasPerrosID),
  FOREIGN KEY (VacunaID) REFERENCES Vacunas(VacunaID),
  FOREIGN KEY (PerroID) REFERENCES Perros(PerroID)
) ENGINE=INNODB;

INSERT INTO Usuarios (
  Usuario, 
  Nombre, 
  Apellido,
  Nacimiento, 
  Email, 
  Clave,
  Administrador,
  Activo
) VALUES (
  "administrador",
  "Gabriel Dario",
  "Briones Dos Santos",
  "2002-11-03",
  "brionesgabriel@hotmail.com",
  "12345678",
  1,
  1
);

DROP DATABASE IF EXISTS bromatologia;
CREATE DATABASE IF NOT EXISTS bromatologia;

CREATE TABLE IF NOT EXISTS Usuarios (
  UsuarioId INT NOT NULL AUTO_INCREMENT,
  Usuario VARCHAR(64) NOT NULL,
  Nombre VARCHAR(255) NOT NULL,
  Apellido VARCHAR(255) NOT NULL,
  Nacimiento DATE NOT NULL,
  Email VARCHAR(255) NOT NULL,
  Clave VARCHAR(255) NOT NULL,
  Administrador BOOLEAN NOT NULL,
  Activo BOOLEAN NOT NULL,
  PRIMARY KEY (UsuarioId)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Propietarios (
  PropietarioId INT NOT NULL AUTO_INCREMENT,
  DNI INT NOT NULL,
  Nombre VARCHAR(255) NOT NULL,
  Apellido VARCHAR(255) NOT NULL,
  Email VARCHAR(255),
  Telefono VARCHAR(255),
  Direccion VARCHAR(255),
  PRIMARY KEY (PropietarioId)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Perros (
  PerroId INT NOT NULL AUTO_INCREMENT,
  TatooId INT NOT NULL,
  Apodo VARCHAR(255),
  Raza VARCHAR(255),
  Castracion DATE,
  Adopcion DATE NOT NULL,
  Observacion VARCHAR(255),
  PRIMARY KEY (PerroId)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Vacunas (
  VacunaId INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(255),
  PRIMARY KEY (VacunaId)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS FotosPerros (
  FotoId INT NOT NULL AUTO_INCREMENT,
  Url VARCHAR(255) NOT NULL,
  PerroId INT NOT NULL,
  PRIMARY KEY (FotoId),
  FOREIGN KEY (PerroId) REFERENCES Perros(PerroId)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS VacunasPerros (
  VacunaPerroId INT NOT NULL AUTO_INCREMENT,
  VacunaId INT NOT NULL,
  PerroId INT NOT NULL,
  PRIMARY KEY (VacunaPerroId),
  FOREIGN KEY (VacunaId) REFERENCES Vacunas(VacunaId),
  FOREIGN KEY (PerroId) REFERENCES Perros(PerroId)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS PropietariosPerros (
  PropietarioPerroId INT NOT NULL AUTO_INCREMENT,
  PropietarioId INT NOT NULL,
  PerroId INT NOT NULL,
  PRIMARY KEY (PropietarioPerroId),
  FOREIGN KEY (PropietarioId) REFERENCES Propietarios(PropietarioId),
  FOREIGN KEY (PerroId) REFERENCES Perros(PerroId)
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
  "$2a$04$IZTtQfshyTnu8I0qOvzxv.0vJ/F..NBAfLtaWtIcp.FZT0H1qA.eO",
  1,
  1
);

INSERT INTO Propietarios (
  DNI,
  Nombre,
  Apellido,
  Email,
  Telefono,
  Direccion
) VALUES (
  44367293,
  "Gabriel Dario",
  "Briones Dos Santos",
  "brionesgabriel@hotmail.com",
  02344468916,
  "Saavedra 3455"
);

INSERT INTO Perros (
  TatooId,
  Apodo,
  Raza,
  Castracion,
  Adopcion,
  Observacion
) VALUES (
  "AABBCC11",
  "Cliford",
  "Bulldog",
  "2020/11/12",
  "2020/10/10",
  NULL
);

INSERT INTO Vacunas (
  Nombre
) VALUES (
  "Vacuna Antirrabica"
);

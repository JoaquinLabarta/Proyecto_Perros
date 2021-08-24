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
  TatooId VARCHAR(255) NOT NULL,
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
  "admin",
  "Bromatologia",
  "Saladillo",
  "2021-08-31",
  "-",
  "$2a$12$L3ApBbryfSZgHLa9lXPOiOFEvep6.On8DJyAKAcZTYHpO23IHnoya",
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
  00000001,
  "Bromatologia",
  "Saladillo",
  "-",
  02344451350,
  "Eva Duarte de Perón, Saladillo, Provincia de Buenos Aires"
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
  "2021/08/31",
  "2021/08/31",
  NULL
);

INSERT INTO Vacunas (
  Nombre
) VALUES (
  "Vacuna Antirrabica"
);

INSERT INTO Vacunas (
  Nombre
) VALUES (
  "Vacuna Parvovirus"
);

INSERT INTO Vacunas (
  Nombre
) VALUES (
  "Vacuna Moquillo Canino"
);

INSERT INTO Vacunas (
  Nombre
) VALUES (
  "Vacuna Leptospirosis"
);

INSERT INTO Vacunas (
  Nombre
) VALUES (
  "Vacuna Parainfluenza"
);

INSERT INTO Vacunas (
  Nombre
) VALUES (
  "Vacuna Enfermedad de lyme"
);

INSERT INTO Vacunas (
  Nombre
) VALUES (
  "Vacuna Tos"
);

INSERT INTO Vacunas (
  Nombre
) VALUES (
  "Vacuna Coronavirus"
);


-- INSERT INTO Perros (TatooID,Apodo,Raza,Castracion,Adopcion,Observacion) VALUES (?,?,?,?,?,?)

-- INSERT INTO Vacunas (Nombre) VALUES (?)

-- INSERT INTO Usuarios (Usuario,Nombre,Apellido,Nacimiento,Email,Clave,Administrador,Activo) VALUES (?,?,?,?,?,?,?,?)





DROP DATABASE IF EXISTS bromatologia;
CREATE DATABASE IF NOT EXISTS bromatologia;

CREATE TABLE IF NOT EXISTS Usuarios(
    UsuarioId INT NOT NULL AUTO_INCREMENT,
    Usuario VARCHAR(64) NOT NULL,
    Nombre VARCHAR(255) NOT NULL,
    Apellido VARCHAR(255) NOT NULL,
    Nacimiento DATE NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Clave VARCHAR(255) NOT NULL,
    Activo BOOLEAN NOT NULL,
    PRIMARY KEY(UsuarioId)
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
    Apodo VARCHAR(255),
    Raza VARCHAR(255),
    Castracion DATE,
    Adopcion DATE NOT NULL,
    Observacion VARCHAR(255),
    PRIMARY KEY(PerroId)
) ENGINE = INNODB; CREATE TABLE IF NOT EXISTS Fotos(
    FotoId INT NOT NULL AUTO_INCREMENT,
    Url VARCHAR(255) NOT NULL,
    PRIMARY KEY(FotoId)
) ENGINE = INNODB; 

CREATE TABLE IF NOT EXISTS FotosPerros(
    FotoPerroId INT NOT NULL AUTO_INCREMENT,
    FotoId INT NOT NULL,
    PerroId INT NOT NULL,
    PRIMARY KEY(FotoPerroId),
    FOREIGN KEY(FotoId) REFERENCES Fotos(FotoId),
    FOREIGN KEY(PerroId) REFERENCES Perros(PerroId)
) ENGINE = INNODB; 

CREATE TABLE IF NOT EXISTS PropietariosPerros(
    PropietarioPerroId INT NOT NULL AUTO_INCREMENT,
    PropietarioId INT NOT NULL,
    PerroId INT NOT NULL,
    PRIMARY KEY(PropietarioPerroId),
    FOREIGN KEY(PropietarioId) REFERENCES Propietarios(PropietarioId),
    FOREIGN KEY(PerroId) REFERENCES Perros(PerroId)
) ENGINE = INNODB; 

CREATE TABLE Roles(
    RolId INT NOT NULL AUTO_INCREMENT,
    Rol VARCHAR(255) NOT NULL,
    PRIMARY KEY(RolId)
) ENGINE = INNODB; 

CREATE TABLE RolesUsuarios(
    RolUsuarioId INT NOT NULL AUTO_INCREMENT,
    RolId INT NOT NULL,
    UsuarioId INT NOT NULL,
    PRIMARY KEY(RolUsuarioId),
    FOREIGN KEY(RolId) REFERENCES Roles(RolId),
    FOREIGN KEY(UsuarioId) REFERENCES Usuarios(UsuarioId)
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
    Activo
)
VALUES(
    "admin",
    "Bromatologia",
    "Saladillo",
    "2021-08-31",
    "-",
    "$2a$12$L3ApBbryfSZgHLa9lXPOiOFEvep6.On8DJyAKAcZTYHpO23IHnoya",
    1
);


INSERT INTO RolesUsuarios(RolId, UsuarioId)
VALUES(1, 1);

INSERT INTO Propietarios(
    DNI,
    Nombre,
    Apellido,
    Email,
    Telefono,
    Direccion
)
VALUES(
    00000001,
    "Bromatologia",
    "Saladillo",
    "-",
    02344451350,
    "Eva Duarte de Perón, Saladillo, Provincia de Buenos Aires"
);
INSERT INTO Perros(
    TatooId,
    Apodo,
    Raza,
    Castracion,
    Adopcion,
    Observacion
)
VALUES(
    "AABBCC11",
    "Cliford",
    "Bulldog",
    "2021/08/31",
    "2021/08/31",
    NULL
);

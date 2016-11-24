CREATE DATABASE Choose;

USE Choose;

CREATE TABLE IF NOT EXISTS Alumno
(
    id                  INT             NOT NULL,
    nombre              VARCHAR(50)     NOT NULL,
    user_name           VARCHAR(50)     NOT NULL,
    password            VARCHAR(50)     NOT NULL,
    email               VARCHAR(50)     NOT NULL,
    carrera             VARCHAR(60),
    direccion           VARCHAR(70),
    id_curriculum       INT,
    PRIMARY KEY         (id)

);

CREATE TABLE IF NOT EXISTS Empresa (
    id                  INT             NOT NULL,
    razon_social        VARCHAR(100)    NOT NULL,
    user_name           VARCHAR(50),
    email               VARCHAR(50)     NOT NULL,
    ramo                VARCHAR(60),
    direccion           VARCHAR(70),
    descripcion         VARCHAR(200),
    PRIMARY KEY         (id)
);

CREATE TABLE IF NOT EXISTS Mensaje (
    id                  INT             NOT NULL,
    contenido           VARCHAR(200)    DEFAULT'',
    fecha_enviado       DATE,
    fecha_visto         DATE,
    id_emisor           INT             NOT NULL,
    id_alumno           INT             NOT NULL,
    id_empresa          INT             NOT NULL,
    PRIMARY KEY         (id)
);

CREATE TABLE IF NOT EXISTS Skill (
    id                  INT             NOT NULL,
    id_alumno           INT             NOT NULL,
    nombre              VARCHAR(50),
    porcentaje          INT,
    PRIMARY KEY         (id)
);

CREATE TABLE IF NOT EXISTS Postulacion (
    id                  INT             NOT NULL,
    id_alumno           INT             NOT NULL,
    id_empresa          INT             NOT NULL,
    status              VARCHAR(50)     DEFAULT'EN PROCESO',
    fecha_inicio        DATE,
    fecha_fin           DATE,
    comentarios         VARCHAR(200),
    PRIMARY KEY         (id)
);

CREATE TABLE IF NOT EXISTS Curriculum (
    id                  INT             NOT NULL,
    id_alumno           INT             NOT NULL,
    descripcion         VARCHAR(200),
    experiencia         VARCHAR(200),
    historial_acaedmico VARCHAR(200),
    foto                LONGBLOB,
    archivo             BLOB,
    PRIMARY KEY         (id)
);


ALTER TABLE Alumno ADD CONSTRAINT fk_curriculum FOREIGN KEY (id_curriculum) REFERENCES Curriculum(id);
ALTER TABLE Mensaje ADD CONSTRAINT fk_alumno FOREIGN KEY (id_alumno) REFERENCES Alumno(id);
ALTER TABLE Mensaje ADD CONSTRAINT fk_empresa FOREIGN KEY (id_empresa) REFERENCES Empresa(id);
ALTER TABLE Skill ADD CONSTRAINT fk_skillalumno FOREIGN KEY (id_alumno) REFERENCES Alumno(id);
ALTER TABLE Postulacion ADD CONSTRAINT fk_postulcionalumno FOREIGN KEY (id_alumno) REFERENCES Alumno(id);
ALTER TABLE Postulacion ADD CONSTRAINT fk_postulacionempresa FOREIGN KEY (id_empresa) REFERENCES Empresa(id);
#ALTER TABLE Curriculum ADD CONSTRAINT fk_curriculumalumno FOREIGN KEY (id_alumno) REFERENCES Alumno(id);

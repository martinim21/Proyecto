CREATE DATABASE Choose;

USE Choose;

CREATE TABLE IF NOT EXISTS Usuario
(
    id                  INT             NOT NULL AUTO_INCREMENT,
    nombre              VARCHAR(50)     NOT NULL,
    user_name           VARCHAR(50)     NOT NULL,
    password            VARCHAR(50)     NOT NULL,
    email               VARCHAR(50)     NOT NULL,
    carrera             VARCHAR(60),
    direccion           VARCHAR(70),
    fecha_ultimo_login  TIMESTAMP,
    descripcion         VARCHAR(200),
    giro                VARCHAR(60),
    tipo                VARCHAR(20)     NOT NULL DEFAULT'ALUMNO',
    foto                LONGBLOB,
    PRIMARY KEY         (id),
    UNIQUE(user_name),
    UNIQUE(email)
);

CREATE TABLE IF NOT EXISTS Mensaje (
    id                  INT             NOT NULL AUTO_INCREMENT,
    asunto           VARCHAR(200)    DEFAULT'',
    contenido           VARCHAR(200)    DEFAULT'',
    fecha_enviado       TIMESTAMP,
    fecha_visto         TIMESTAMP,
    id_emisor           INT             NOT NULL,
    id_receptor         INT             NOT NULL,
    PRIMARY KEY         (id)
);

CREATE TABLE IF NOT EXISTS Skill (
    id                  INT             NOT NULL AUTO_INCREMENT,
    id_usuario           INT            NOT NULL,
    nombre              VARCHAR(50),
    porcentaje          INT,
    PRIMARY KEY         (id),
    UNIQUE KEY `key_user_nombre` (`id_usuario`,`nombre`)
);

CREATE TABLE IF NOT EXISTS Postulacion (
    id                  INT             NOT NULL AUTO_INCREMENT,
    id_usuario_alumno           INT     NOT NULL,
    id_usuario_empresa          INT     NOT NULL,
    status              VARCHAR(50)     DEFAULT'EN PROCESO',
    fecha_inicio        TIMESTAMP,
    fecha_fin           TIMESTAMP,
    comentarios         VARCHAR(200),
    PRIMARY KEY         (id)
);

CREATE TABLE IF NOT EXISTS Curriculum (
    id                  INT             NOT NULL AUTO_INCREMENT,
    id_usuario           INT            NOT NULL,
    descripcion         VARCHAR(200),
    experiencia         VARCHAR(200),
    historial_academico VARCHAR(200),
    archivo             BLOB,
    PRIMARY KEY         (id),
    UNIQUE(id_usuario)
);

CREATE TABLE IF NOT EXISTS Visita(
    id                  INT             NOT NULL AUTO_INCREMENT,
    id_usuario_visitado INT             NOT NULL,
    id_usuario_visitante INT             NOT NULL,
    fecha_visita        TIMESTAMP,
    PRIMARY KEY         (id)
);



ALTER TABLE Curriculum ADD CONSTRAINT fk_usuario_id FOREIGN KEY (id_usuario) REFERENCES Usuario(id);
ALTER TABLE Mensaje ADD CONSTRAINT fk_emisor FOREIGN KEY (id_emisor) REFERENCES Usuario(id);
ALTER TABLE Mensaje ADD CONSTRAINT fk_receptor FOREIGN KEY (id_receptor) REFERENCES Usuario(id);
ALTER TABLE Skill ADD CONSTRAINT fk_skillalumno FOREIGN KEY (id_usuario) REFERENCES Usuario(id);
ALTER TABLE Postulacion ADD CONSTRAINT fk_postulcionalumno FOREIGN KEY (id_usuario_alumno) REFERENCES Usuario(id);
ALTER TABLE Postulacion ADD CONSTRAINT fk_postulacionempresa FOREIGN KEY (id_usuario_empresa) REFERENCES Usuario(id);
ALTER TABLE Visita ADD CONSTRAINT fk_usuario_visitante FOREIGN KEY (id_usuario_visitado) REFERENCES Usuario(id);
ALTER TABLE Visita ADD CONSTRAINT fk_usuario_visitado FOREIGN KEY (id_usuario_visitante) REFERENCES Usuario(id);

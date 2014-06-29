BEGIN TRANSACTION;

DROP TABLE IF EXISTS roles CASCADE;
CREATE TABLE roles (
    pk serial NOT NULL,
    rol varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (rol),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS usuarios CASCADE;
CREATE TABLE usuarios (
    pk serial NOT NULL,
    rut int NOT NULL,
    contrasena varchar(255) NOT NULL,
    UNIQUE (rut),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS roles_usuarios CASCADE;
CREATE TABLE roles_usuarios (
    pk serial NOT NULL,
    usuario_fk int NOT NULL REFERENCES usuarios(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    rol_fk int NOT NULL REFERENCES roles(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (usuario_fk, rol_fk),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS facultades CASCADE;
CREATE TABLE facultades (
    pk serial NOT NULL,
    nombre varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (nombre),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS departamentos CASCADE;
CREATE TABLE departamentos (
    pk serial NOT NULL,
    facultad_fk int NOT NULL REFERENCES facultades(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    nombre varchar(255) NOT NULL,
    descripcion text,
    UNIQUE(nombre, facultad_fk),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS escuelas CASCADE;
CREATE TABLE escuelas (
    pk serial NOT NULL,
    departamento_fk int NOT NULL REFERENCES departamentos(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    nombre varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (nombre),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS carreras CASCADE;
CREATE TABLE carreras (
    pk serial NOT NULL,
    codigo int NOT NULL,
    nombre varchar(255) NOT NULL,
    escuela_fk int NOT NULL REFERENCES escuelas(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (codigo,escuela_fk),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS asignaturas CASCADE;
CREATE TABLE asignaturas (
    pk bigserial NOT NULL,
    departamento_fk int NOT NULL REFERENCES departamentos(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    codigo varchar(10),
    nombre varchar(255) NOT NULL,
    UNIQUE (departamento_fk,codigo),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS tipos_evaluaciones CASCADE;
CREATE TABLE tipos_evaluaciones (
    pk serial NOT NULL,
    tipo varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (tipo),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS docentes CASCADE;
CREATE TABLE docentes (
    pk serial NOT NULL,
    rut int NOT NULL,
    nombres varchar(255) NOT NULL,
    apellidos varchar(255) NOT NULL,
    departamento_fk int NOT NULL REFERENCES departamentos(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (rut),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS cursos CASCADE;
CREATE TABLE cursos (
    pk bigserial NOT NULL,
    semestre int NOT NULL,
    anio int NOT NULL,
    seccion int NOT NULL,
    asignatura_fk bigint NOT NULL REFERENCES asignaturas(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    docente_fk int NOT NULL REFERENCES docentes(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (semestre,anio,seccion),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS periodos CASCADE;
CREATE TABLE periodos (
    pk serial NOT NULL,
    nombre varchar(255),
    inicio time NOT NULL,
    termino time NOT NULL,
    UNIQUE (nombre),
    UNIQUE (inicio,termino),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS evaluaciones CASCADE;
CREATE TABLE evaluaciones (
    pk bigserial NOT NULL,
    curso_fk bigint NOT NULL REFERENCES cursos(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    tipo_fk int NOT NULL REFERENCES tipos_evaluaciones(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    fecha date NOT NULL DEFAULT NOW(),
    periodo_fk int NOT NULL REFERENCES periodos(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    duracion int NOT NULL DEFAULT '1',
    titulo varchar(255),
    descripcion text,
    UNIQUE (curso_fk, fecha, periodo_fk),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS contenidos CASCADE;
CREATE TABLE contenidos (
    pk bigserial NOT NULL,
    evaluacion_fk bigint NOT NULL REFERENCES evaluaciones(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    tema varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (evaluacion_fk, tema),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS pautas CASCADE;
CREATE TABLE pautas (
    pk bigserial NOT NULL,
    evaluacion_fk bigint NOT NULL REFERENCES evaluaciones(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    fecha timestamp NOT NULL DEFAULT NOW(),
    ruta varchar(255) NOT NULL,
    UNIQUE (evaluacion_fk),
    PRIMARY KEY (pk)
);

COMMIT;

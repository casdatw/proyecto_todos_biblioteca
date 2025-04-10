-- Eliminar la base de datos si ya existe
DROP DATABASE IF EXISTS biblioteca;

-- Crear la base de datos
CREATE DATABASE biblioteca;

-- Usar la base de datos
USE biblioteca;

-- Eliminar la tabla libros si ya existiera (por si acaso)
DROP TABLE IF EXISTS libros;

-- Crear la tabla libros
CREATE TABLE libros (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255),
    disponible BOOLEAN DEFAULT TRUE
);

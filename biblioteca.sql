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
    disponible ENUM('Sí', 'No') DEFAULT 'Sí'
);

-- Insertar algunos libros de ejemplo
INSERT INTO libros (titulo, autor, disponible) VALUES ('Cien años de soledad', 'Gabriel García Márquez', 'Sí');
INSERT INTO libros (titulo, autor, disponible) VALUES ('Don Quijote de la Mancha', 'Miguel de Cervantes', 'No');
INSERT INTO libros (titulo, autor, disponible) VALUES ('El amor en los tiempos del cólera', 'Gabriel García Márquez', 'Sí');
INSERT INTO libros (titulo, autor, disponible) VALUES ('La sombra del viento', 'Carlos Ruiz Zafón', 'Sí');
INSERT INTO libros (titulo, autor, disponible) VALUES ('1984', 'George Orwell', 'No');

<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $titulo = htmlspecialchars(trim($_POST['titulo']));
    $autor = htmlspecialchars(trim($_POST['autor']));
    $disponible = $_POST['disponible'];

    if (empty($titulo) || empty($autor) || empty($disponible)) {
        echo "<script>alert('Todos los campos son obligatorios.')</script>";
    } else {
        $sql = "INSERT INTO libros (titulo, autor, disponible) VALUES ('$titulo', '$autor', '$disponible')";
        if (mysqli_query($conexion, $sql)) {
            echo "<script>alert('El libro $libro se ha insertado con éxito.');
                    window.location.href = 'index.php'; </script>";
        } else {
            echo "<script>alert('Error al conectarse con la base de datos.')" . mysqli_error($conexion) . "</script>";
        }
    }
}
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formularios.css">
    <title>Agregar Libro</title>
</head>
<body>
    <section id="contacto">
        <h2>Agregar nuevos libros</h2>
        <form method="post" action="agregarLibro.php">
            <label for="titulo">Título del libro:</label>
            <input type="text" name="titulo" id="titulo">

            <label for="autor">Autor del libro:</label>
            <input type="text" name="autor" id="autor"> 

            <label for="disponible">¿Está disponible?</label>
            <select name="disponible" id="disponible">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
            <button type="submit" name="submit">AGREGAR</button>
            <button type="button" onclick="window.location.href='index.php';">VOLVER A INICIO</button>
        </form>
    </section>
</body>
</html>


<?php
    require_once 'config.php' ;

    $sqlLibrosDisponibles = "SELECT * FROM libros";
    $resultLibrosDisponibles = mysqli_query($conexion , $sqlLibrosDisponibles);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/stilo.css">
</head>
<body>
    <h1>Tienda de Libros</h1>

    <a href="agregarLibro.php">
        <button class="btn-agregar">Agregar nuevo libro</button>
    </a>

    <?php
        // LIBROS DISPONIBLES:
        print ("<h2>Libros</h2>") ;
        echo '<table>';
        echo '<tr><th>Título</th><th>Autor</th><th>Disponible</th></tr>';

        while ($libroDisponible = mysqli_fetch_array($resultLibrosDisponibles, MYSQLI_ASSOC)) {
        
        echo '<tr>';
        echo '<td>' . $libroDisponible['titulo'] . '</td>';
        echo '<td>' . $libroDisponible['autor'] . '</td>';
        echo '<td>' . $libroDisponible['disponible'] . '</td>';
        echo '<td>';
       
        echo '<a href="update_libro.php?codigo=', $libroDisponible['codigo'],'" name="libro_id" >';
        echo '<button type="submit">Actualizar</button>';
        echo '</a>' ;

        echo '<form action="delete_libro.php" method="POST">';
        echo '<input type="hidden" name="libro_id" value="' . $libroDisponible['codigo'] . '">';
        echo '<button type="submit">Borrar</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>

</body>
</html>
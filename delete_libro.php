<?php

require_once(__DIR__ . '/config.php');

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Borrar Libro</title>
  </head>
  <body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['libro_id'])) {
      echo '<h1>Accesso Invalido a pagina</h1>';
    } else {
      $id = $_POST['libro_id'];
      $stmt = mysqli_prepare($conexion, 'DELETE FROM libros WHERE codigo=?');
      mysqli_stmt_bind_param($stmt, 'i', $id);
      if (!mysqli_stmt_execute($stmt)) {
        echo '<h1>Error al intentar borrar libro</h1>';
        echo '<p>', mysqli_stmt_error($stmt), '</p>';
      } else {
        echo '<h1>Libro Borrado</h1>';
      }
      mysqli_stmt_close($stmt);
    }
    ?>
    <script>setTimeout(() => { window.location.href = './'; }, 1_000)</script>
  </body>
</html>


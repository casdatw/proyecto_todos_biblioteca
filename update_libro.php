<?php

require_once(__DIR__ . '/config.php');

$titulo = '';
$autor = '';
$disponible = '1';
$id = '';

$updated = false;
$error = null;

function extract_values($arr, $keys) {
  $data = [];
  foreach($keys as $k) {
    if (!isset($arr[$k])) return false;
    $data[$k] = $arr[$k];
  }
  return $data;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  if (!isset($_GET['codigo'])) {
    header("Location: ./");
    die();
  }

  $codigo = $_GET['codigo'];
  $stmt = mysqli_prepare($conexion, 'SELECT * FROM libros WHERE codigo=?');
  mysqli_stmt_bind_param($stmt, 'i', $codigo);
  if (!mysqli_stmt_execute($stmt)) {
    $error = mysqli_stmt_error($stmt);
  } else {
    $id = $codigo;
    $q = mysqli_stmt_get_result($stmt);
    while ($libro = mysqli_fetch_array($q)) {
      $id = $libro['codigo'];
      $titulo = $libro['titulo'];
      $autor = $libro['autor'];
      $disponible = $libro['disponible'];
    }
  }
  mysqli_stmt_close($stmt);
  
} else {
  $data = extract_values($_POST, ['id', 'titulo', 'autor', 'disponible']);
  if ($data !== false) {
    $id = $data['id'];
    $titulo = $data['titulo'];
    $autor = $data['autor'];
    $disponible = $data['disponible'];

    $stmt = mysqli_prepare($conexion, 'UPDATE libros SET titulo=?, autor=?, disponible=? WHERE codigo=?');
    mysqli_stmt_bind_param($stmt, 'ssii', $titulo, $autor, $disponible, $id);
    $updated = mysqli_stmt_execute($stmt);
    if (!$updated) {
      $error = mysqli_stmt_error($stmt);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Actualizar Libro</title>
    <link rel="stylesheet" href="./css/formularios.css" />
  </head>
  <body>
    <?php
    if ($error != null) {
      echo '<p class="sql-error">', htmlespecialchars($error), '</p>';
    }
    ?>
    <?php
    if ($updated) {
      ?>

      <div class="actualizado">
        <p>
          Libro actualizado<br>
          <a href="./">Regresar a inicio</a>
        </p>
      </div>
      
      <?php
    } else {
    ?>
      <form method="POST" class="actualizar-form">
        <input type="hidden" name="id" value="<?= $id ?>" />

        <label>
          Nuevo Titulo de Libro:
        </label>
        <input type="text" name="titulo" value="<?= $titulo ?>" />

        <label>
          Nuevo Autor de Libro:
        </label>
        <input type="text" name="autor" value="<?= $autor ?>" />

        <label>
          Disponible:
        </label>
        <select name="disponible">
          <option value="0" <?= $disponible == false ? 'selected' : '' ?>>No</option>
          <option value="1" <?= $disponible == true ? 'selected' : '' ?>>Sí</option>
        </select>

        <button type="submit">Actualizar</button>
        <button type="button"><a href="./">Regresar a Inicio</a></button>
      </form>
    <?php
    }
    ?>
  </body>
</html>


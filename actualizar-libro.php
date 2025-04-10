<?php
$titulo = '';
$autor = '';
$disponible = '1';
$id = '';

$updated = false;

function extract($arr, $keys) {
  $data = [];
  foreach($keys as $k) {
    if (!isset($arr[$k])) return false;
    $data[$k] = $arr[$k];
  }
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  if (!isset($_GET['codigo'])) {
    header("Location: ./");
    die();
  }
} else {
  $data = extract($_POST, ['id', 'titulo', 'autor', 'disponible']);
  if ($data !== false) {
    $updated = true;
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
    <form class="actualizar-form">
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
      <select>
        <option value="0" <?= $disponible == false ? 'selected' : '' ?>>No</option>
        <option value="1" <?= $disponible == true ? 'selected' : '' ?>>Sí</option>
      </select>

      <button>Actualizar</button>
    </form>
  </body>
</html>


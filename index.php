<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Servicio de Emergencias</title>
  <style>
    body {
            background-color: #5EC29F;
        }

        .container div.card {
            background-color: #E9FEF5;
        }

        a {
            color: white;
        }
        .aire {
            padding: 10px 30px;
        }
    tr, td, th {
      padding: 5px;
    }
  </style>
</head>
<body>

<?php

  $conexion = mysqli_connect();

  if (!isset($_POST['action'])) {
    $_POST['action'] = "";
  }

  if ($_POST["action"] == "eliminar") {
    $dniABorrar = $_POST['dni'];
    $borra = "DELETE FROM usuario WHERE dni= '$dniABorrar'";
    mysqli_query($conexion, $borra);
  }

  if ($_POST["action"] == "insertar") {
    $inserta = "INSERT INTO usuario VALUES (\"". $_POST['dni'] . "\",\"" . $_POST['nombre'] . "\",\"" .  $_POST['apellido'] . "\",\"" .$_POST['emergencia'] . "\" )";
    mysqli_query($conexion, $inserta);
  }

  if ($_POST["action"] == "modificar") {
    $modifica = "UPDATE usuario SET dni=\"$_POST[dni]\" , nombre=\"$_POST[nombre]\" , apellido=\"$_POST[apellido]\" , emergencia=\"$_POST[emergencia]\" WHERE dni=\"$_POST[dniAntiguo]\"";
    mysqli_query($conexion, $modifica);
  }

  $consulta = mysqli_query($conexion, "SELECT * FROM usuario");
?>


  <div class="container">
    <div class="card">
    <h1 class="text-center">Servicio de Emergencias</h1>
    <br>

      <table class="table table-striped">
        <tr>
          <th>DNI</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Emergencia</th>
          <th></th><th></th>
        </tr>

        <?php
          while ($registro = mysqli_fetch_array($consulta)) {
        ?>
            <tr>
              <td><?= $registro['dni'] ?></td>
              <td><?= $registro['nombre'] ?></td>
              <td><?= $registro['apellido'] ?></td>
              <td><?= $registro['emergencia'] ?></td>
              <td>
                <form action="index.php" method="post">
                  <input type="hidden" name="action" value="eliminar">
                  <input type="hidden" name="dni" value="<?= $registro['dni'] ?>">
                  <button type="submit" class="btn btn-danger">
                  <i class="bi bi-trash"></i>
                    Eliminar
                  </button>
                </form>
              </td>
              <td>
                <form action="modifica-cliente.php" method="post">
                  <input type="hidden" name="dni" value="<?= $registro['dni'] ?>">
                  <input type="hidden" name="nombre" value="<?= $registro['nombre'] ?>">
                  <input type="hidden" name="apellido" value="<?= $registro['apellido'] ?>">
                  <input type="hidden" name="emergencia" value="<?= $registro['emergencia'] ?>">
                  <button type="submit" class="btn btn-primary">
                  <i class="bi bi-vector-pen"></i>
                    Modificar
                  </button>
                </form>
              </td>
            </tr>
        <?php
          }
        ?>
        <form action="index.php" method="post">
          <tr>
            <td><input type="text" name="dni" size="18"></td>
            <td><input type="text" name="nombre"></td>
            <td><input type="text" name="apellido"></td>
            <td><textarea name="emergencia" rows="1" cols="20"></textarea></td>
            <td><input type="hidden" name="action" value="insertar">
            <button type="submit" class="btn btn-success">
              <i class="bi bi-floppy"></i>
              Añadir
            </button>
          </td>
          <td></td>
        </tr>
        </form>
      </table>
      </div>
      </div>

      <script src="/js/bootstrap.min.js"></script>
</body>

</html>

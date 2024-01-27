<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Servicio de Emergencias - Modifica Usuario</title>
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

        div.btn-container {
            display: flex;
        }
    </style>
</head>
<body>

<?php

    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $emergencia = $_POST['emergencia'];
?>
<div class="container">
    <div class="card">
    <h1 class="text-center">MODIFICAR USUARIO</h1>
    <div class="text-center">Por favor, realice las modificaciones necesarias </div>
    <br>
    <form action="index.php" method="post">
        <div class="mb-3 aire">
            <input type="hidden" name="action" value="modificar">
            <input type="hidden" name="dniAntiguo" value="<?= $dni ?>">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" value ="<?= $dni ?>">
    </div>
    <div class="mb-3 aire">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value ="<?= $nombre ?>">
    </div>
    <div class="mb-3 aire">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value ="<?= $apellido ?>">
    </div>
    <div class="mb-3 aire">
        <label for="emergencia" class="form-label">Emergencia</label>
        <input type="text" class="form-control" id="emergencia" name="emergencia" value ="<?= $emergencia ?>">
    </div>
        <div class="btn-container">
        <div class="mb-3 aire">
            <button type="submit" class="btn btn-success">Modificar</button>
        </div>

        <div class="mb-3 aire">
            <button class="btn btn-danger"><a href="index.php">Cancelar</a></button>
        
        </div>
    </div>
    </form>

    </div>
</div>
    
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>
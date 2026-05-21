<?php

$titulo = $_GET['titulo'];

$categoria = $_GET['categoria'];

$comando = "swipl consulta_detalle.pl $titulo";

$resultado = trim(shell_exec($comando));

$datos = explode('|', $resultado);

?>

<!DOCTYPE html>
<html>

<head>

    <title><?php echo $datos[0]; ?></title>
    <link rel="stylesheet" href="estilos.css">

</head>

<body>

<div class="hero">

    <img src="img/<?php echo $datos[8]; ?>">

    <div class="overlay">

        <h1>
            <?php echo ucwords(str_replace('_', ' ', $datos[0])); ?>
        </h1>

        <p class="sinopsis">
            <?php echo $datos[2]; ?>
        </p>

        <a href="index.php?categoria=<?php echo $categoria; ?>"
        class="volver">

            ← Volver

        </a>

    </div>

</div>

<div class="detalle">

    <img src="img/<?php echo $datos[7]; ?>">

    <div>

        <h1>
            <?php echo ucwords(str_replace('_', ' ', $datos[0])); ?>
        </h1>

        <p><b>Categoría:</b>
        <?php echo ucwords(str_replace('_', ' ', $datos[1])); ?>
        </p>

        <p><b>Sinopsis:</b>
        <?php echo $datos[2]; ?>
        </p>

        <p><b>Actores:</b>
        <?php echo $datos[3]; ?>
        </p>

        <p><b>Duración:</b>
        <?php echo $datos[4]; ?> min
        </p>

        <p><b>Idioma:</b>
        <?php echo $datos[5]; ?>
        </p>

        <p><b>Año:</b>
        <?php echo $datos[6]; ?>
        </p>

        <br><br>

        <a
        href="index.php?categoria=<?php echo $categoria; ?>"
        class="volver">

            ← Volver al catálogo

        </a>

    </div>

</div>

<footer>

    Proyecto Prolog + PHP | Programación Lógica y Funcional | Luis Armando Santana Rojas | Jose Roman Santana Rojas | Brandon Cruz

</footer>

</body>
</html>
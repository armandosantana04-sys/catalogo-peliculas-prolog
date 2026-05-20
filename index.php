<?php

$categoria = $_GET['categoria'] ?? 'ciencia_ficcion';

$comando = "swipl consulta_categoria.pl $categoria";

$resultado = shell_exec($comando);

$peliculas = explode("\n", trim($resultado));

?>

<!DOCTYPE html>
<html>
<head>

    <title>Netflix V2</title>
    <link rel="stylesheet" href="estilos.css">

</head>

<body>

<h1>CATÁLOGO DE PELÍCULAS</h1>

<div class="menu">

    <a href="?categoria=ciencia_ficcion">Ciencia Ficción</a>

    <a href="?categoria=accion">Acción</a>

    <a href="?categoria=animacion">Animación</a>

</div>

<div class="catalogo">

<?php

foreach($peliculas as $pelicula){

    if(empty($pelicula)) continue;

    list($titulo, $imagen) = explode('|', $pelicula);

    echo "

    <div class='card'>

        <a href='detalle.php?titulo=$titulo&categoria=$categoria'>

            <img src='img/$imagen'>

            <h3>" . ucwords(str_replace('_', ' ', $titulo)) . "</h3>

        </a>

    </div>

    ";
}

?>

</div>

</body>
</html>
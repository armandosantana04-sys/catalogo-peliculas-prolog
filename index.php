<?php

$todasPeliculas = shell_exec(
    "swipl consulta_categoria.pl ciencia_ficcion"
);

$todasPeliculas .= shell_exec(
    "swipl consulta_categoria.pl accion"
);

$todasPeliculas .= shell_exec(
    "swipl consulta_categoria.pl animacion"
);

$todasPeliculas = explode(
    "\n",
    trim($todasPeliculas)
);

$buscar = $_GET['buscar'] ?? '';

$categoria = $_GET['categoria'] ?? '';

$anio = $_GET['anio'] ?? '';

if($buscar != ''){

    $comando =
    "swipl consulta_busqueda.pl $buscar";

}
else if($anio != ''){

    $comando =
    "swipl consulta_anio.pl $anio";

}
else if($categoria != ''){

    $comando =
    "swipl consulta_categoria.pl $categoria";

}
else{

    $resultado1 = shell_exec(
        "swipl consulta_categoria.pl ciencia_ficcion"
    );

    $resultado2 = shell_exec(
        "swipl consulta_categoria.pl accion"
    );

    $resultado3 = shell_exec(
        "swipl consulta_categoria.pl animacion"
    );

    $resultado =
        $resultado1 .
        $resultado2 .
        $resultado3;
}
if(isset($comando)){

    $resultado = shell_exec($comando);
}

$peliculas = explode("\n", trim($resultado));

?>

<!DOCTYPE html>
<html>
<head>

    <title>Netflix V2</title>
    <link rel="stylesheet" href="estilos.css">

</head>

<body>
<div class="hero">

    <div class="slide active">

        <img src="img/interstellar_banner.jpg">

        <div class="info">

            <h1>Interstellar</h1>

            <p>
                Un grupo de astronautas viaja por un agujero negro.
            </p>

        </div>

    </div>

    <div class="slide">

        <img src="img/matrix_banner.jpg">

        <div class="info">

            <h1>Matrix</h1>

            <p>
                Neo descubre la verdad sobre la realidad.
            </p>

        </div>

    </div>

     <div class="slide">

        <img src="img/madmax_banner.jpg">

        <div class="info">

            <h1>Mad Max</h1>

            <p>
                Max se enfrenta a un mundo post-apocalíptico.
            </p>

        </div>

    </div>

    <div class="slide">

        <img src="img/war_machine_banner.jpg">

        <div class="info">

            <h1>War Machine</h1>

            <p>
                Un soldado se enfrenta a las consecuencias de su misión.
            </p>

        </div>

    </div>

    <div class="slide">

        <img src="img/johnwick_banner.jpg">

        <div class="info">

            <h1>John Wick</h1>

            <p>
                Un exasesino se venga de los que mataron a su perro.
            </p>

        </div>

    </div>
    <div class="slide">

        <img src="img/predator_badland_banner.jpg">

        <div class="info">

            <h1>Predator Badlands</h1>

            <p>
                Un joven depredador repudiado por su clan encuentra una aliada inesperada, Thia, y emprende un peligroso viaje.
            </p>

        </div>

    </div>
</div>

<form method="GET" class="buscador">

    <input
        type="text"
        name="buscar"
        placeholder="Buscar película..."
    >
    <div id="sugerencias"></div>

    <select name="anio">

    <option value="">
        Todos los años
    </option>

    <?php

    for($i = 2026; $i >= 1985; $i--){

        echo "
        <option value='$i'>
            $i
        </option>
        ";
    }

    ?>

</select>
    <button type="submit">
        Buscar
    </button>

</form>

<h1>CATÁLOGO DE PELÍCULAS</h1>

<div class="menu">

    <a href="?categoria=ciencia_ficcion">Ciencia Ficción</a>

    <a href="?categoria=accion">Acción</a>

    <a href="?categoria=animacion">Animación</a>

</div>

<div class="catalogo">

<?php

if(empty($peliculas[0])){

   echo "<h2 class='sin-resultados'>
    No se encontraron películas.
    </h2>";

}else{

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
}

?>

</div>

<script>

const slides = document.querySelectorAll('.slide');

let actual = 0;

setInterval(() => {

    slides[actual].classList.remove('active');

    actual++;

    if(actual >= slides.length){

        actual = 0;
    }

    slides[actual].classList.add('active');

}, 5000);

</script>
<script>

const peliculas = [

<?php

foreach($todasPeliculas as $p){

    if(trim($p) != ''){

        $datos = explode('|', $p);

        if(isset($datos[0])){

            echo '"' . trim($datos[0]) . '",';
        }
    }
}

?>

];

console.log(peliculas);

const input = document.querySelector(
    'input[name="buscar"]'
);

const sugerencias = document.getElementById(
    'sugerencias'
);

input.addEventListener('input', () => {

    let texto = input.value.toLowerCase();

    sugerencias.innerHTML = '';

    if(texto.length < 1){

        return;
    }

    peliculas.forEach(pelicula => {

        if(
            pelicula.toLowerCase().includes(texto)
        ){

            sugerencias.innerHTML +=
            `
            <div class="item-sugerencia">
                ${pelicula}
            </div>
            `;
        }
    });

    document
    .querySelectorAll('.item-sugerencia')

    .forEach(item => {

        item.addEventListener('click', () => {

            input.value = item.textContent;

            sugerencias.innerHTML = '';
        });
    });

});

</script>

<footer>

    Proyecto Prolog + PHP | Programación Lógica y Funcional | Luis Armando Santana Rojas | Jose Roman Santana Rojas | Brandon Cruz

</footer>

</body>
</html>
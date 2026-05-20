:- consult('peliculas.pl').

inicio :-

    current_prolog_flag(argv, Argv),
    nth0(0, Argv, Titulo),

    detalle_pelicula(
        Titulo,
        Categoria,
        Sinopsis,
        Actores,
        Duracion,
        Idioma,
        Año,
        Imagen
    ),

    write(Titulo),
    write('|'),

    write(Categoria),
    write('|'),

    write(Sinopsis),
    write('|'),

    write(Actores),
    write('|'),

    write(Duracion),
    write('|'),

    write(Idioma),
    write('|'),

    write(Año),
    write('|'),

    write(Imagen),

    halt.

:- initialization(inicio).
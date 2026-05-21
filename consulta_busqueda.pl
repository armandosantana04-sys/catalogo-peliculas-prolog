:- consult('peliculas.pl').

inicio :-

    current_prolog_flag(argv, Argv),
    nth0(0, Argv, Busqueda),

    forall(

        buscar_pelicula(Busqueda, Titulo, Imagen),

        (
            write(Titulo),
            write('|'),
            write(Imagen),
            nl
        )
    ),

    halt.

:- initialization(inicio).
:- consult('peliculas.pl').

inicio :-

    current_prolog_flag(argv, Argv),
    nth0(0, Argv, Categoria),

    forall(
        peliculas_por_categoria(Categoria, Titulo, Imagen),

        (
            write(Titulo),
            write('|'),
            write(Imagen),
            nl
        )
    ),

    halt.

:- initialization(inicio).
:- consult('peliculas.pl').

inicio :-

    current_prolog_flag(argv, Argv),

    nth0(0, Argv, AnioAtom),

    atom_number(AnioAtom, Anio),

    forall(

        buscar_por_anio(
            Anio,
            Titulo,
            Imagen
        ),

        (
            write(Titulo),
            write('|'),
            write(Imagen),
            nl
        )
    ),

    halt.

:- initialization(inicio).
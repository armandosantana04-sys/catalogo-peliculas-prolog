% pelicula(
% Titulo,
% Categoria,
% Sinopsis,
% Actores,
% Duracion,
% Idioma,
% Año,
% Imagen
% ).

% CIENCIA FICCION

pelicula(
'interstellar',
'ciencia_ficcion',
'Un grupo de astronautas viaja por un agujero negro para salvar a la humanidad.',
'Matthew McConaughey, Anne Hathaway',
169,
'Ingles',
2014,
'interstellar.jpg'
).

pelicula(
'matrix',
'ciencia_ficcion',
'Neo descubre la verdad sobre la realidad y lucha contra las maquinas.',
'Keanu Reeves, Laurence Fishburne',
136,
'Ingles',
1999,
'matrix.jpg'
).

pelicula(
'inception',
'ciencia_ficcion',
'Un ladron roba informacion infiltrandose en los sueños.',
'Leonardo DiCaprio, Tom Hardy',
148,
'Ingles',
2010,
'inception.jpg'
).

pelicula(
'avatar',
'ciencia_ficcion',
'Un marine llega al planeta Pandora.',
'Sam Worthington, Zoe Saldana',
162,
'Ingles',
2009,
'avatar.jpg'
).

pelicula(
'gravity',
'ciencia_ficcion',
'Astronautas quedan atrapados en el espacio.',
'Sandra Bullock, George Clooney',
91,
'Ingles',
2013,
'gravity.jpg'
).

% ACCION

pelicula(
'john_wick',
'accion',
'Un asesino retirado busca venganza.',
'Keanu Reeves',
101,
'Ingles',
2014,
'johnwick.jpg'
).

pelicula(
'gladiator',
'accion',
'Un general romano busca justicia.',
'Russell Crowe',
155,
'Ingles',
2000,
'gladiator.jpg'
).

pelicula(
'mad_max',
'accion',
'Supervivientes luchan en un mundo postapocaliptico.',
'Tom Hardy, Charlize Theron',
120,
'Ingles',
2015,
'madmax.jpg'
).

pelicula(
'avengers',
'accion',
'Los heroes mas poderosos defienden la tierra.',
'Robert Downey Jr, Chris Evans',
143,
'Ingles',
2012,
'avengers.jpg'
).

pelicula(
'batman',
'accion',
'Batman combate el crimen en Gotham.',
'Christian Bale',
152,
'Ingles',
2008,
'batman.jpg'
).

% ANIMACION

pelicula(
'coco',
'animacion',
'Un niño viaja al mundo de los muertos.',
'Anthony Gonzalez',
105,
'Español',
2017,
'coco.jpg'
).

pelicula(
'shrek',
'animacion',
'Un ogro vive aventuras inesperadas.',
'Mike Myers, Eddie Murphy',
90,
'Ingles',
2001,
'shrek.jpg'
).

pelicula(
'frozen',
'animacion',
'Dos hermanas enfrentan poderes magicos.',
'Kristen Bell, Idina Menzel',
102,
'Ingles',
2013,
'frozen.jpg'
).

pelicula(
'cars',
'animacion',
'Un auto de carreras aprende sobre amistad.',
'Owen Wilson',
117,
'Ingles',
2006,
'cars.jpg'
).

pelicula(
'toy_story',
'animacion',
'Los juguetes cobran vida.',
'Tom Hanks, Tim Allen',
81,
'Ingles',
1995,
'toystory.jpg'
).

% REGLAS

peliculas_por_categoria(Categoria, Titulo, Imagen) :-
    pelicula(Titulo, Categoria, _, _, _, _, _, Imagen).

detalle_pelicula(
Titulo,
Categoria,
Sinopsis,
Actores,
Duracion,
Idioma,
Año,
Imagen
) :-
    pelicula(
        Titulo,
        Categoria,
        Sinopsis,
        Actores,
        Duracion,
        Idioma,
        Año,
        Imagen
    ).
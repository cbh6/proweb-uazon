<?php

use Illuminate\Database\Seeder;

class LibrosTableSeeder extends Seeder
{

    /**
     *
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('libros')->delete();
        
        \DB::table('libros')->insert(array (
            0 => 
            array (
                'id' => 1,
                'isbn' => 978848,
                'voto' => 3.0,
                'num_voto' => 25,
                'n_pags' => 1759,
                'precio' => '22.00',
                'titulo' => 'Anna Karenina',
                'editorial' => 'Juventud',
                'atributos_extra' => '{"color": "rojo", "premios": ["planeta2012", "Nacional2011"], "material": "papel", "dimensiones_cm": {"alto": 10, "ancho": 5, "fondo": 1}}',
                'categoria' => 'novelas',
                'portada' => 'https://imagessl2.casadellibro.com/a/l/t0/42/9788484288442.jpg',
            ),
            1 => 
            array (
                'id' => 2,
                'isbn' => 9788494512384,
                'voto' => 4.0,
                'num_voto' => 136,
                'n_pags' => 130,
                'precio' => '7.00',
                'titulo' => 'Alicia en el país de las maravillas',
                'editorial' => 'Dover Publications',
                'atributos_extra' => 'null',
                'categoria' => 'novelas',
                'portada' => 'https://imagessl4.casadellibro.com/a/l/t0/84/9788494512384.jpg',
            ),
            2 => 
            array (
                'id' => 3,
                'isbn' => 9788466785369,
                'voto' => 3.0,
                'num_voto' => 92,
                'n_pags' => 789,
                'precio' => '17.00',
                'titulo' => 'Oliver Twist',
                'editorial' => 'Anaya',
                'atributos_extra' => 'null',
                'categoria' => 'novelas',
                'portada' => 'https://imagessl6.casadellibro.com/a/l/t0/96/9788467828696.jpg',
            ),
            3 => 
            array (
                'id' => 4,
                'isbn' => 9788466785365,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 345,
                'precio' => '9.00',
                'titulo' => 'Frankenstein',
                'editorial' => 'Anaya',
                'atributos_extra' => 'null',
                'categoria' => 'novelas',
                'portada' => 'https://imagessl5.casadellibro.com/a/l/t0/65/9788466785365.jpg',
            ),
            4 => 
            array (
                'id' => 5,
                'isbn' => 9788483468913,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 152,
                'precio' => '9.95',
                'titulo' => 'La teoría del todo',
                'editorial' => 'DEBOLSILLO',
                'atributos_extra' => 'null',
                'categoria' => 'ciencia',
                'portada' => 'https://imagessl3.casadellibro.com/a/l/t0/13/9788483468913.jpg',
            ),
            5 => 
            array (
                'id' => 6,
                'isbn' => 9788498925142,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 248,
                'precio' => '17.00',
                'titulo' => 'Historia del tiempo',
                'editorial' => 'CRITICA',
                'atributos_extra' => 'null',
                'categoria' => 'ciencia',
                'portada' => 'https://imagessl2.casadellibro.com/a/l/t0/42/9788498925142.jpg',
            ),
            6 => 
            array (
                'id' => 7,
                'isbn' => 9788490607725,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 372,
                'precio' => '17.00',
                'titulo' => 'El boson de higgs',
                'editorial' => 'LA ESFERA DE LOS LIBROS',
                'atributos_extra' => 'null',
                'categoria' => 'ciencia',
                'portada' => 'https://imagessl5.casadellibro.com/a/l/t0/25/9788490607725.jpg',
            ),
            7 => 
            array (
                'id' => 8,
                'isbn' => 9788449331886,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 288,
                'precio' => '16.10',
                'titulo' => 'Todo es cuestión de química',
                'editorial' => 'PAIDOS IBERICA',
                'atributos_extra' => 'null',
                'categoria' => 'ciencia',
                'portada' => 'https://imagessl6.casadellibro.com/a/l/t0/86/9788449331886.jpg',
            ),
            8 => 
            array (
                'id' => 9,
                'isbn' => 9788408193296,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 448,
                'precio' => '19.50',
                'titulo' => 'Los Señores del tiempo',
                'editorial' => 'PLANETA',
                'atributos_extra' => 'null',
                'categoria' => 'historia',
                'portada' => 'https://imagessl6.casadellibro.com/a/l/t0/96/9788408193296.jpg',
            ),
            9 => 
            array (
                'id' => 10,
                'isbn' => 9788408154167,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 480,
                'precio' => '19.50',
                'titulo' => 'El Silencio de la Ciudad Blanca',
                'editorial' => 'PLANETA',
                'atributos_extra' => 'null',
                'categoria' => 'historia',
                'portada' => 'https://imagessl7.casadellibro.com/a/l/t0/67/9788408154167.jpg',
            ),
            10 => 
            array (
                'id' => 11,
                'isbn' => 9788408172178,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 560,
                'precio' => '19.90',
                'titulo' => 'Escrito en el Agua',
                'editorial' => 'PLANETA',
                'atributos_extra' => 'null',
                'categoria' => 'novelas',
                'portada' => 'https://imagessl8.casadellibro.com/a/l/t0/78/9788408172178.jpg',
            ),
            11 => 
            array (
                'id' => 12,
                'isbn' => 9788408193029,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 496,
                'precio' => '9.95',
                'titulo' => 'La chica del tren',
                'editorial' => 'PLANETA',
                'atributos_extra' => 'null',
                'categoria' => 'misterio',
                'portada' => 'https://imagessl9.casadellibro.com/a/l/t0/29/9788408193029.jpg',
            ),
            12 => 
            array (
                'id' => 13,
                'isbn' => 9788467052985,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 240,
                'precio' => '8.95',
                'titulo' => 'Asesinato en el Orient Express',
                'editorial' => 'S.L.U. ESPASA LIBROS',
                'atributos_extra' => 'null',
                'categoria' => 'misterio',
                'portada' => 'https://imagessl5.casadellibro.com/a/l/t0/85/9788467052985.jpg',
            ),
            13 => 
            array (
                'id' => 14,
                'isbn' => 9788467051643,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 240,
                'precio' => '8.95',
                'titulo' => 'La casa torcida',
                'editorial' => 'S.L.U. ESPASA LIBROS',
                'atributos_extra' => 'null',
                'categoria' => 'misterio',
                'portada' => 'https://imagessl3.casadellibro.com/a/l/t0/43/9788467051643.jpg',
            ),
            14 => 
            array (
                'id' => 15,
                'isbn' => 9788408193746,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 298,
                'precio' => '6.99',
                'titulo' => 'La muerte visita al dentista',
                'editorial' => 'S.L.U. ESPASA LIBROS',
                'atributos_extra' => 'null',
                'categoria' => 'misterio',
                'portada' => 'https://imagessl6.casadellibro.com/a/l/t0/46/9788408193746.jpg',
            ),
            15 => 
            array (
                'id' => 16,
                'isbn' => 9788467052381,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 198,
                'precio' => '6.99',
                'titulo' => 'El misterioso caso de styles',
                'editorial' => 'S.L.U. ESPASA LIBROS',
                'atributos_extra' => 'null',
                'categoria' => 'misterio',
                'portada' => 'https://imagessl1.casadellibro.com/a/l/t0/81/9788467052381.jpg',
            ),
            16 => 
            array (
                'id' => 17,
                'isbn' => 9788467053067,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 224,
                'precio' => '19.99',
                'titulo' => 'ESPAÑA: LA HISTORIA IMAGINADA: DE LOS ANTIGUOS MITOS A LAS LEYENDAS CONTEMPORANEAS',
                'editorial' => 'S.L.U. ESPASA LIBROS',
                'atributos_extra' => 'null',
                'categoria' => 'historia',
                'portada' => 'https://imagessl7.casadellibro.com/a/l/t0/67/9788467053067.jpg',
            ),
            17 => 
            array (
                'id' => 18,
                'isbn' => 9788491990246,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 400,
                'precio' => '27.99',
                'titulo' => 'ENTRE EL IMPERIO Y LA GLOBALIZACION: HISTORIA ECONOMICA DE LA ESPAÑA CONTEMPORANEA',
                'editorial' => 'CRITICA',
                'atributos_extra' => 'null',
                'categoria' => 'historia',
                'portada' => 'https://imagessl6.casadellibro.com/a/l/t0/46/9788491990246.jpg',
            ),
            18 => 
            array (
                'id' => 19,
                'isbn' => 9788491990246,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 192,
                'precio' => '9.99',
                'titulo' => 'Cuentos para pensar',
                'editorial' => 'RBA LIBROS',
                'atributos_extra' => 'null',
                'categoria' => 'cuentos',
                'portada' => 'https://imagessl6.casadellibro.com/a/l/t0/76/9788492966776.jpg',
            ),
            19 => 
            array (
                'id' => 20,
                'isbn' => 9788466345675,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 656,
                'precio' => '14.99',
                'titulo' => 'El resplandor',
                'editorial' => 'DEBOLSILLO',
                'atributos_extra' => 'null',
                'categoria' => 'misterio',
                'portada' => 'https://imagessl5.casadellibro.com/a/l/t0/75/9788466345675.jpg',
            ),
        ));
        
        
    }
}
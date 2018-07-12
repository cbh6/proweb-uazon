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
                'isbn' => 670894788,
                'voto' => 3.0,
                'num_voto' => 25,
                'n_pags' => 1759,
                'precio' => '22.00',
                'titulo' => 'Anna Karenina',
                'editorial' => 'Juventud',
                'atributos_extra' => '{"color": "rojo", "premios": ["planeta2012", "Nacional2011"], "material": "papel", "dimensiones_cm": {"alto": 10, "ancho": 5, "fondo": 1}}',
                'categoria' => 'novelas',
            ),
            1 => 
            array (
                'id' => 2,
                'isbn' => 393048470,
                'voto' => 4.0,
                'num_voto' => 136,
                'n_pags' => 130,
                'precio' => '7.00',
                'titulo' => 'Alice\'s Adventures in Wonderland',
                'editorial' => 'Dover Publications',
                'atributos_extra' => 'null',
                'categoria' => 'novelas',
            ),
            2 => 
            array (
                'id' => 3,
                'isbn' => 141439742,
                'voto' => 3.0,
                'num_voto' => 92,
                'n_pags' => 789,
                'precio' => '17.00',
                'titulo' => 'Oliver Twist',
                'editorial' => 'Anaya',
                'atributos_extra' => 'null',
                'categoria' => 'novelas',
            ),
            3 => 
            array (
                'id' => 4,
                'isbn' => 743487583,
                'voto' => 5.0,
                'num_voto' => 63,
                'n_pags' => 345,
                'precio' => '9.00',
                'titulo' => 'Frankenstein',
                'editorial' => 'Anaya',
                'atributos_extra' => 'null',
                'categoria' => 'novelas',
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
        ));
        
        
    }
}
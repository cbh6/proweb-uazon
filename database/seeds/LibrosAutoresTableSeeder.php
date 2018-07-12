<?php

use Illuminate\Database\Seeder;

class LibrosAutoresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('libros_autores')->delete();
        
        \DB::table('libros_autores')->insert(array (
            0 => 
            array (
                'fk_libros' => 1,
                'fk_autores' => 3,
                'fecha' => '2004-05-31',
            ),
            1 => 
            array (
                'fk_libros' => 2,
                'fk_autores' => 7,
                'fecha' => '2000-12-12',
            ),
            2 => 
            array (
                'fk_libros' => 3,
                'fk_autores' => 5,
                'fecha' => '2004-04-27',
            ),
            3 => 
            array (
                'fk_libros' => 4,
                'fk_autores' => 6,
                'fecha' => '2003-04-29',
            ),
            4 => 
            array (
                'fk_libros' => 5,
                'fk_autores' => 8,
                'fecha' => '2011-05-11',
            ),
            5 => 
            array (
                'fk_libros' => 6,
                'fk_autores' => 8,
                'fecha' => '2011-05-11',
            ),
            6 => 
            array (
                'fk_libros' => 7,
                'fk_autores' => 9,
                'fecha' => '2016-05-22',
            ),
            7 => 
            array (
                'fk_libros' => 8,
                'fk_autores' => 10,
                'fecha' => '2016-05-22',
            ),
        ));
        
        
    }
}
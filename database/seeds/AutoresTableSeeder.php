<?php

use Illuminate\Database\Seeder;

class AutoresTableSeeder extends Seeder
{

    /**
     *
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('autores')->delete();
        
        \DB::table('autores')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Stephen King',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Mario Vargas Llosa',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Leo Tolstoy',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Jorge Bucay',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Charles Dickens',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Mary Shelley',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Lewis Carrol',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Stephen Hawking',
                'foto' => 'https://www.premiosfronterasdelconocimiento.es/wp-content/uploads/sites/2/2017/05/FBBVA-15-ciencia-Stephen-Hawking.jpg',
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Javier Santaolalla',
                'foto' => 'https://www.plataformaeditorial.com/uploads/RESEG5511javiersantolalla.jpg',
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Deborah García Bellos',
                'foto' => 'https://www.lavanguardia.com/r/GODO/LV/p3/WebSite/2016/04/19/Recortada/img_njar_20160419-001158_imagenes_lv_otras_fuentes_foto_deborah_promo_2-kZRC--572x700@LaVanguardia-Web.JPG',
            ),
        ));
        
        
    }
}
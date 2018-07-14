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
                'foto' => 'https://upload.wikimedia.org/wikipedia/commons/e/e3/Stephen_King%2C_Comicon.jpg',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Mario Vargas Llosa',
                'foto' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Vargas_Losa_G%C3%B6teborg_Book_Fair_2011b.jpg/413px-Vargas_Losa_G%C3%B6teborg_Book_Fair_2011b.jpg',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Leon Tolstoy',
                'foto' => 'https://imagessl.casadellibro.com/img/autores/tolstoi_foto.jpg',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Jorge Bucay',
                'foto' => 'https://imagessl.casadellibro.com/img/autores/foto_jorge%20bucay0.jpg',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Charles Dickens',
                'foto' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Dickens_Gurney_head.jpg/330px-Dickens_Gurney_head.jpg',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Mary Shelley',
                'foto' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/RothwellMaryShelley.jpg/330px-RothwellMaryShelley.jpg',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Lewis Carrol',
                'foto' => 'https://imagessl.casadellibro.com/img/autores/LEWIS%20CARROLL.jpg',
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
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Eva García Saenz de Urturi',
                'foto' => 'https://imagessl.casadellibro.com/img/autores/20097157.jpg',
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Paula Hawkins',
                'foto' => 'https://imagessl.casadellibro.com/img/autores/PAULA-HAWKINGS.jpg',
            ),
            12 => 
            array (
                'id' => 13,
                'nombre' => 'Agatha Christie',
                'foto' => 'https://imagessl.casadellibro.com/img/autores/3303.jpg',
            ),
            13 => 
            array (
                'id' => 14,
                'nombre' => 'Mónica Arrizabalaga',
                'foto' => 'https://www.qualiscare.com/wp-content/uploads/2017/08/default-user.png',
            ),
            14 => 
            array (
                'id' => 15,
                'nombre' => 'Xavier Tafunell',
                'foto' => 'https://www.qualiscare.com/wp-content/uploads/2017/08/default-user.png',
            ),
        ));
        
        
    }
}
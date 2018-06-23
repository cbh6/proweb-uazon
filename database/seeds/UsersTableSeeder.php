<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     *
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Miguel Muñoz Martínez',
                'address' => 'Calle San Nicolás',
                'cp' => 30005,
                'email' => 'mke_mar72@ono.com',
                'role' => 'ROLE_USER',
                'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Francisco Rubio Blancas',
                'address' => 'Alfara del Patriarca',
                'cp' => 46025,
                'email' => 'framer@gmail.com',
                'role' => 'ROLE_USER',
                'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Rebeca Soler Sanchis',
                'address' => 'Calle de fuenlabrada',
                'cp' => 28019,
                'email' => 'rebsan19@hotmail.com',
                'role' => 'ROLE_USER',
                'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Merce Roig Navarro',
                'address' => 'Calle Santa Eulalia',
                'cp' => 8012,
                'email' => 'merce76@yahoo.es',
                'role' => 'ROLE_USER',
                'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Silvia Villacampa Martín',
                'address' => 'Calle del Coso',
                'cp' => 50004,
                'email' => 'silvia_villacampa@gmail.com',
                'role' => 'ROLE_USER',
                'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Patricia Lorca Cantó',
                'address' => 'Avenida de Andalucia ',
                'cp' => 3804,
                'email' => 'patdomar@ono.com',
                'role' => 'ROLE_USER',
                'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Manuel Hernandez Molina',
                'address' => 'Calle de Hernan Cortés',
                'cp' => 2005,
                'email' => 'manu72@hotmail.com',
                'role' => 'ROLE_USER',
                'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Pablo Sanchez García',
                'address' => 'Calle de Santander',
                'cp' => 9004,
                'email' => 'mnar_der@yahoo.es',
                'role' => 'ROLE_USER',
                'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Carlos López Blanes',
                'address' => 'Avenida de Jaime I',
                'cp' => 12560,
                'email' => 'lets@ozu.es',
                'role' => 'ROLE_USER',
                'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Vanesa Romero Gonzalez',
                'address' => 'Paseo de la Estación',
                'cp' => 23150,
                'email' => 'vaner_gon@gmail.com',
                'role' => 'ROLE_USER',
                'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Administrador',
                'address' => 'C/ Administracion',
                'cp' => 12345,
                'email' => 'admin@admin.com',
                'role' => 'ROLE_ADMIN',
                'password' => '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918',
            ),
        ));
        
        
    }
}
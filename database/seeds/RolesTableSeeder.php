<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
            'title' => 'Administrator (can create other users)',
                'created_at' => '2017-04-29 17:35:54',
                'updated_at' => '2017-04-29 17:35:54',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Simple user',
                'created_at' => '2017-04-29 17:35:54',
                'updated_at' => '2017-04-29 17:35:54',
            ),
        ));
        
        
    }
}
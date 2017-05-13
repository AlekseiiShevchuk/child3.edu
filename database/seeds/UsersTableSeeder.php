<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
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
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$D/E/XNjMg1upxS2o4CGYUePg8R/kqCUEbl8DGIyYMn4WZygUm4swe',
                'role_id' => 1,
                'remember_token' => '',
                'created_at' => '2017-04-29 17:35:54',
                'updated_at' => '2017-04-29 17:35:54',
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;

class LessonSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Изучаем птиц', 'description' => 'Изучаем разновидности птиц, голоса и отличительные особенности	', 'category_id' => 1,],

        ];

        foreach ($items as $item) {
            \App\Lesson::create($item);
        }
    }
}

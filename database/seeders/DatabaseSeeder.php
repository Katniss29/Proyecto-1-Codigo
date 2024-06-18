<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Asegúrate de usar la ruta correcta para tu modelo User
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();


        Post::factory()->create();

    /*

        $user = User::factory()->create();

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family' 
        ]);

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal' 
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work' 
        ]);


        Post::create([
            'user_id' =>  $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-first-post',
            'excerpt' => ' <p> Lorem ipsum dolar sit amet. </p>',
            'body' => ' <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi tempore earum id! Repellendus, laudantium itaque. Corrupti, vel similique. Expedita ratione voluptatibus id repudiandae natus ab inventore cupiditate iusto maxime eveniet.</p>'

        ]);

        
        Post::create([
            'user_id' =>  $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'Lorem ipsum dolar sit amet.',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi tempore earum id! Repellendus, laudantium itaque. Corrupti, vel similique. Expedita ratione voluptatibus id repudiandae natus ab inventore cupiditate iusto maxime eveniet.'

        ]); */
    }
}

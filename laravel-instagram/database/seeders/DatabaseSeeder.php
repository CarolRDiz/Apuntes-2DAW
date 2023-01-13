<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
                'name' => 'Pedro',
                'surname' => 'Ramírez',
                'nick' => 'pedro',
                'email' => 'pedro@gmail.com',
            ]);
            
        $this->call(ImageSeeder::class);
        $this->call(LikeSeeder::class);
        $this->call(CommentSeeder::class);
    }
}

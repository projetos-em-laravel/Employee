<?php

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'Mario',
                'year' => 1999,
                'category' => 'acarde',
                'description' => 'Super Mario',
                'user_id' => 1,
                'image' => 'mariopng'
            ],
        );

        Game::insert($data);

    }
}

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
                'image' => '222115202006035ed8225b31fa1webp'
            ],
            [
                'name' => 'Kibry',
                'year' => 1999,
                'category' => 'action',
                'description' => 'Eita Kirby',
                'user_id' => 1,
                'image' => '222218202006035ed8229a2fa89jpeg'
            ],
            [
                'name' => 'Zelda',
                'year' => 1999,
                'category' => 'rpg',
                'description' => 'Link and Zelda',
                'user_id' => 2,
                'image' => '201823202006025ed6b40f464c5jpeg'
            ],
        );

        Game::insert($data);

    }
}

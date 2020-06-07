<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    protected $fillable = ['title', 'subtitle', 'description', 'screenshot', 'game_id'];

    public function game()
    {
        $this->belongTo(Game::clas);
    }
}

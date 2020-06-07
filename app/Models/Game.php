<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['name', 'description', 'image', 'year', 'category', 'user_id'];

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function screenshot()
    {
        return $this->hasMany(Screenshot::class);
    }

}

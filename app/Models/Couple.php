<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game; 

class Couple extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable=['player_1',
                         'player_2',
                         'added_at'];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}

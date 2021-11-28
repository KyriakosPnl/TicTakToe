<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable=['couple_id',
                         'player_1',
                         'player_2',
                         'result',
                         'moves',
                         'added_at'
                        ];

    public $timestamps = false;
}

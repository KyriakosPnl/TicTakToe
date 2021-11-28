<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Couple; 

class CoupleController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            "player_1"=>'required',
            "player_2"=>'required',
        
        ]);

        $couple = new Couple;
        $couple->player_1 = $request->player_1;
        $couple->player_2 = $request->player_2;
        $couple->save();
        $last=$couple->id;//retrieve the id and return it to frontend to insert as foreign key to games table
        
        return response()->json(array('success' => true, 'last_insert_id' => $last), 200);
       
    }
}

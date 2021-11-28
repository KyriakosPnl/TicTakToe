<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Couple; 

class CoupleController extends Controller
{
    public function index()
    {
       return ('post');
    }

    public function store(Request $request)
    {
        $couple = new Couple;
        $couple->player_1 = $request->player_1;
        $couple->player_2 = $request->player_2;
        $couple->save();
        $last=$couple->id;
        
        return response()->json(array('success' => true, 'last_insert_id' => $last), 200);
       
    }
}

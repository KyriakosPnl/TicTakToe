<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game; 
use App\Models\Couple; 

class GameController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            "couple_id"=>'required',
            "result"=>'required',
        
        ]);

        $game = new Game;
        $game->couple_id = $request->couple_id;
        $game->result = $request->result;
        $game->moves =json_encode($request->moves);
        echo($game->couple_id);
        $game->save();//create new game row in DB
        
        
        
        return response()->json(array('success' => true), 200);
       
    }

//the courent function returns the last played game of a specific couple
    public function fetchLast($id){
        if($id){
            $couple = Couple::find($id);
            $cgames = Couple::find($id)->games;//use the one to many relationship to retrieve games-played by couple
            $max=0;

        foreach ($cgames as $game) {//find the max id (probably not the best solution for this)
            if($game->id > $max){
                $max=$game->id;//since id auto-increments
            }
        } 
        $toReturn=0;
        foreach ($cgames as $game) {//return the Game with max id
            if($game->id == $max){ 
                $toReturn=$game;
            }
        
        } 
        
        return $toReturn;                                        
        }else{

            return("something went wrong");
        }

        

    }
}

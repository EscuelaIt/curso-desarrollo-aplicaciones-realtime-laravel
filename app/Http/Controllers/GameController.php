<?php

namespace App\Http\Controllers;

class GameController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showGame()
    {
        return view('game.show');
    }
}

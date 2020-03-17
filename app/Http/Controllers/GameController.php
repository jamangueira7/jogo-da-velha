<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function home()
    {
        return view('sistem.home', []);
    }//home

    public function jogar()
    {
        return view('sistem.jogar', []);
    }//jogar

    public function jogo($id)
    {
        return view('sistem.jogo', []);
    }//jogo

    public function historico()
    {

        return view('sistem.historico', []);
    }//historico

    public function jogada(Request $request)
    {
        return json_encode(['request' => $request->all()]);
    }//jogada
}//GameController

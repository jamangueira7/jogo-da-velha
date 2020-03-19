<?php

namespace App\Http\Controllers;

use App\Repositories\GameRepository;
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

    public function criar(Request $request)
    {
        $game = new GameRepository();
        $res = $game->criarJogo($request->all());
        return json_encode(['game' => $res->id]);
    }//jogo

    public function historico()
    {

        return view('sistem.historico', []);
    }//historico

    public function jogada(Request $request)
    {
        $game = new GameRepository();

        $res = $game->montaJogada($request->all());
        return json_encode(['resposta' => $res]);
    }//jogada
}//GameController

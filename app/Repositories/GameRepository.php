<?php
namespace App\Repositories;

use App\Game;
use App\Play;
use Illuminate\Support\Facades\Log;

class GameRepository
{
    private  $arrayJogo = [];

    public function criarJogo($dados)
    {

        $res = Game::create([
            'level'=>$dados['level'],
            'result'=>false,
            'user_id'=> 1,
        ]);
        return $res;
    }//criarJogo

    public function montaJogada($dados)
    {
        $this->addJogada($dados['game_id'], $dados['posicao'], 1);
        $this->montaArrayJogo($dados['game_id']);
        $vendedor = $this->checarVencedor();

        if($vendedor['gameover']){
            return [
                'gameover' => $vendedor['gameover'],
                'vencedor' => "Jogador {$vendedor['vencedor']} venceu!",
                'jogador_vencedor' => $vendedor['vencedor'],
                'combinacao' => $vendedor['combinacao'],
                'jogador1msg' => 'Jogador 1 jogou na posição '.$dados['posicao'],
                'jogador2msg' => '',
                'jogador1' => $dados['posicao'],
                'jogador2' => '',
            ];
        }

        $maquina = $this->jogadaMaquina($dados['game_id']);

        $this->montaArrayJogo($dados['game_id']);
        $vendedor = $this->checarVencedor();


        return [
            'gameover' => $vendedor['gameover'],
            'vencedor' => "Jogador {$vendedor['vencedor']} venceu!",
            'combinacao' => $vendedor['combinacao'],
            'jogador1msg' => 'Jogador 1 jogou na posição '.$dados['posicao'],
            'jogador2msg' => 'Jogador 2 jogou na posição '.$maquina,
            'jogador1' => $dados['posicao'],
            'jogador2' => $maquina,
        ];

    }//montaJogada

    private function jogadaMaquina($game_id)
    {
        $level = Game::where('id', $game_id)->select('level')->first();
        $jogada = '';
        if($level->level == 1){
            $jogada = $this->maquinaFacil();
        }
        if($level->level == 2){
            $jogada = $this->maquinaFacil();
        }
        if($level->level == 3){
            $jogada = $this->maquinaFacil();
        }
        $this->addJogada($game_id, $jogada, 2);
        return $jogada;
    }

    private function maquinaFacil()
    {
        $posicao = rand(1, 9);
        if($this->arrayJogo[$posicao] == ''){
            return $posicao;
        }
        return $this->maquinaFacil();
    }//maquinaFacil

    private function checarVencedor()
    {
        $aux = ['X', 'O'];
        foreach ($aux as $value){
            if($this->arrayJogo[1] == $value && $this->arrayJogo[2] == $value && $this->arrayJogo[3] == $value){
                return ['gameover' => true, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [1,2,3]];
            }

            if($this->arrayJogo[1] == $value && $this->arrayJogo[4] == $value && $this->arrayJogo[7] == $value){
                return ['gameover' => true, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [1,4,7]];
            }

            if($this->arrayJogo[1] == $value && $this->arrayJogo[5] == $value && $this->arrayJogo[9] == $value){
                return ['gameover' => true, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [1,5,9]];
            }

            if($this->arrayJogo[2] == $value && $this->arrayJogo[5] == $value && $this->arrayJogo[8] == $value){
                return ['gameover' => true, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [2,5,8]];
            }

            if($this->arrayJogo[3] == $value && $this->arrayJogo[6] == $value && $this->arrayJogo[9] == $value){
                return ['gameover' => true, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [3,6,9]];
            }

            if($this->arrayJogo[3] == $value && $this->arrayJogo[5] == $value && $this->arrayJogo[7] == $value){
                return ['gameover' => true, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [1,5,7]];
            }

            if($this->arrayJogo[4] == $value && $this->arrayJogo[5] == $value && $this->arrayJogo[6] == $value){
                return ['gameover' => true, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [4,5,6]];
            }

            if($this->arrayJogo[7] == $value && $this->arrayJogo[8] == $value && $this->arrayJogo[9] == $value){
                return ['gameover' => true, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [7,8,9]];
            }
        }

        return ['gameover' => false, 'vencedor' => '' , 'combinacao' => ''];

    }//checarVencedor


    private function montaArrayJogo($game_id)
    {
        $jogadas = Play::where('game_id', $game_id)->orderBy('position')->get();
        for ($i = 1; $i <= 9; $i++) {
            $this->arrayJogo[$i] = '';
        }
        foreach ($jogadas as $jogada){
           $this->arrayJogo[$jogada->position] = $jogada->play == 1 ? 'X' : 'O';
        }
    }//montaArrayJogo

    private function addJogada($game_id, $posicao, $jogador)
    {
        $res = Play::create([
            'play'=>$jogador,
            'game_id'=>$game_id,
            'position'=>$posicao,
        ]);
        return $res;
    }//addJogada

}//GameRepository

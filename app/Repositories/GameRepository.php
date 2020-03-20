<?php
namespace App\Repositories;

use App\Game;
use App\Helpers\Helper;
use App\Play;
use Illuminate\Support\Facades\Log;

class GameRepository
{
    private  $arrayJogo = [];

    public function montarDetalhes($id)
    {
        $jogadas = Play::where('game_id', $id)->get();
        $game = Game::where('id', $id)->first();
        $this->montaArrayJogo($id);
        $vendedor = $this->checarVencedor();

        $play = $vendedor['vencedor'] == 1 ? 'Você venceu!' : 'A Maquina venceu!';
        $play = $vendedor['empate'] == true ? 'Empatou!' : $play;


        return [
            'id' => $id,
            'level' => Helper::formataLevel($game->level),
            'gameover' => $vendedor['gameover'],
            'empate' => $vendedor['empate'] ?? false ,
            'vencedor' => "{$play}",
            'jogador_vencedor' => $vendedor['vencedor'],
            'combinacao' => !empty($vendedor['combinacao']) ? $vendedor['combinacao'] : [11,12,13],
            'detalhe' => $this->montarJogadas($jogadas),
            'jogadas' => $this->arrayJogo,
        ];

    }//montarDetalhes

    private function montarJogadas($jogadas)
    {
        $msg = [];
        foreach ($jogadas as $jogada){
            $play = $jogada->play == 1 ? 'Você' : 'Maquina';
            $peca = $jogada->play == 1 ? 'X' : 'O';
            $msg [] = "{$play} ({$peca}) jogou na posição {$jogada->position}";
        }
        return $msg;
    }//montarJogadas

    public function criarJogo($dados)
    {

        $res = Game::create([
            'level'=>$dados['level'],
            'result'=>1,
            'user_id'=> session('login')['id'],
        ]);
        return $res;
    }//criarJogo

    public function montaJogada($dados)
    {
        $this->addJogada($dados['game_id'], $dados['posicao'], 1);
        $this->montaArrayJogo($dados['game_id']);
        $vendedor = $this->checarVencedor();

        if($vendedor['gameover'] && $vendedor['vencedor'] == 1  && $vendedor['empate'] == false){
            $this->atribuirVitoria($dados['game_id'], 2);
        }elseif($vendedor['gameover'] && $vendedor['empate']){
            $this->atribuirVitoria($dados['game_id'], 3);
        }

        $play = $vendedor['vencedor'] == 1 ? 'Você' : 'A Maquina';
        if($vendedor['gameover']){
            return [
                'gameover' => $vendedor['gameover'],
                'empate' => $vendedor['empate'],
                'vencedor' => "{$play} venceu!",
                'jogador_vencedor' => $vendedor['vencedor'],
                'combinacao' => $vendedor['combinacao'],
                'jogador1msg' => 'Você jogou na posição '.$dados['posicao'],
                'jogador2msg' => '',
                'jogador1' => $dados['posicao'],
                'jogador2' => '',
            ];
        }

        $maquina = $this->jogadaMaquina($dados['game_id']);

        $this->montaArrayJogo($dados['game_id']);
        $vendedor = $this->checarVencedor();

        if($vendedor['gameover'] && $vendedor['vencedor'] == 1){
            $this->atribuirVitoria($dados['game_id'], 2);
        }elseif($vendedor['gameover'] && $vendedor['empate']){
            $this->atribuirVitoria($dados['game_id'], 3);
        }

        $play = $vendedor['vencedor'] == 1 ? 'Você' : 'A Maquina';
        return [
            'gameover' => $vendedor['gameover'],
            'empate' => $vendedor['empate'],
            'vencedor' => "{$play} venceu!",
            'combinacao' => $vendedor['combinacao'],
            'jogador1msg' => 'Você jogou na posição '.$dados['posicao'],
            'jogador2msg' => 'A Maquina jogou na posição '.$maquina,
            'jogador1' => $dados['posicao'],
            'jogador2' => $maquina,
        ];

    }//montaJogada

    private function atribuirVitoria($id, $result)
    {
        $game = Game::where('id', $id)->first();
        $game->result = $result;
        $game->save();
    }//atribuirVitoria

    private function jogadaMaquina($game_id)
    {
        $level = Game::where('id', $game_id)->select('level')->first();
        Log::info("$$$$$$$$$$$$$$");
        Log::info($level);
        $jogada = '';
        if($level->level == 1){
            $jogada = $this->maquinaFacil();
        }
        if($level->level == 2){
            $jogada = $this->maquinaMedio();
        }
        if($level->level == 3){
            $jogada = $this->maquinaDificil();
        }
        $this->addJogada($game_id, $jogada, 2);
        return $jogada;
    }//jogadaMaquina

    private function maquinaDificil()
    {
        //primeira reta
        if($this->arrayJogo[1] == 'X' && $this->arrayJogo[2] == 'X' && $this->arrayJogo[3] == ''){
            return 3;
        }
        if($this->arrayJogo[1] == 'X' && $this->arrayJogo[2] == '' && $this->arrayJogo[3] == 'X'){
            return 2;
        }
        if($this->arrayJogo[1] == '' && $this->arrayJogo[2] == 'X' && $this->arrayJogo[3] == 'X'){
            return 1;
        }
        //segunda reta
        if($this->arrayJogo[1] == 'X' && $this->arrayJogo[4] == 'X' && $this->arrayJogo[7] == ''){
            return 7;
        }
        if($this->arrayJogo[1] == 'X' && $this->arrayJogo[4] == '' && $this->arrayJogo[7] == 'X'){
            return 4;
        }
        if($this->arrayJogo[1] == '' && $this->arrayJogo[4] == 'X' && $this->arrayJogo[7] == 'X'){
            return 1;
        }

        //terceira reta
        if($this->arrayJogo[3] == 'X' && $this->arrayJogo[6] == 'X' && $this->arrayJogo[9] == ''){
            return 9;
        }
        if($this->arrayJogo[3] == 'X' && $this->arrayJogo[6] == '' && $this->arrayJogo[9] == 'X'){
            return 6;
        }
        if($this->arrayJogo[3] == '' && $this->arrayJogo[6] == 'X' && $this->arrayJogo[9] == 'X'){
            return 3;
        }

        //quarta reta
        if($this->arrayJogo[7] == 'X' && $this->arrayJogo[8] == 'X' && $this->arrayJogo[9] == ''){
            return 9;
        }
        if($this->arrayJogo[7] == 'X' && $this->arrayJogo[8] == '' && $this->arrayJogo[9] == 'X'){
            return 8;
        }
        if($this->arrayJogo[7] == '' && $this->arrayJogo[8] == 'X' && $this->arrayJogo[9] == 'X'){
            return 7;
        }

        //quinta reta
        if($this->arrayJogo[2] == 'X' && $this->arrayJogo[5] == 'X' && $this->arrayJogo[8] == ''){
            return 8;
        }
        if($this->arrayJogo[2] == 'X' && $this->arrayJogo[5] == '' && $this->arrayJogo[8] == 'X'){
            return 5;
        }
        if($this->arrayJogo[2] == '' && $this->arrayJogo[5] == 'X' && $this->arrayJogo[8] == 'X'){
            return 2;
        }

        //sexta reta
        if($this->arrayJogo[4] == 'X' && $this->arrayJogo[5] == 'X' && $this->arrayJogo[6] == ''){
            return 6;
        }
        if($this->arrayJogo[4] == 'X' && $this->arrayJogo[5] == '' && $this->arrayJogo[6] == 'X'){
            return 5;
        }
        if($this->arrayJogo[4] == '' && $this->arrayJogo[5] == 'X' && $this->arrayJogo[6] == 'X'){
            return 4;
        }

        //primeira diagonal
        if($this->arrayJogo[1] == 'X' && $this->arrayJogo[5] == 'X' && $this->arrayJogo[9] == ''){
            return 9;
        }
        if($this->arrayJogo[1] == 'X' && $this->arrayJogo[5] == '' && $this->arrayJogo[9] == 'X'){
            return 5;
        }
        if($this->arrayJogo[1] == '' && $this->arrayJogo[5] == 'X' && $this->arrayJogo[9] == 'X'){
            return 1;
        }

        //segunda diagonal
        if($this->arrayJogo[3] == 'X' && $this->arrayJogo[5] == 'X' && $this->arrayJogo[7] == ''){
            return 7;
        }
        if($this->arrayJogo[3] == 'X' && $this->arrayJogo[5] == '' && $this->arrayJogo[7] == 'X'){
            return 5;
        }
        if($this->arrayJogo[3] == '' && $this->arrayJogo[5] == 'X' && $this->arrayJogo[7] == 'X'){
            return 3;
        }

        return $this->maquinaFacil();
    }//maquinaDificil

    private function maquinaMedio()
    {
        //primeira reta
        if($this->arrayJogo[1] == 'X' && $this->arrayJogo[2] == 'X' && $this->arrayJogo[3] == ''){
            return 3;
        }
        if($this->arrayJogo[1] == 'X' && $this->arrayJogo[2] == '' && $this->arrayJogo[3] == 'X'){
            return 2;
        }
        if($this->arrayJogo[1] == '' && $this->arrayJogo[2] == 'X' && $this->arrayJogo[3] == 'X'){
            return 1;
        }
        //segunda reta
        if($this->arrayJogo[1] == 'X' && $this->arrayJogo[4] == 'X' && $this->arrayJogo[7] == ''){
            return 7;
        }
        if($this->arrayJogo[1] == 'X' && $this->arrayJogo[4] == '' && $this->arrayJogo[7] == 'X'){
            return 4;
        }
        if($this->arrayJogo[1] == '' && $this->arrayJogo[4] == 'X' && $this->arrayJogo[7] == 'X'){
            return 1;
        }

        //terceira reta
        if($this->arrayJogo[3] == 'X' && $this->arrayJogo[6] == 'X' && $this->arrayJogo[9] == ''){
            return 9;
        }
        if($this->arrayJogo[3] == 'X' && $this->arrayJogo[6] == '' && $this->arrayJogo[9] == 'X'){
            return 6;
        }
        if($this->arrayJogo[3] == '' && $this->arrayJogo[6] == 'X' && $this->arrayJogo[9] == 'X'){
            return 3;
        }

        //quarta reta
        if($this->arrayJogo[7] == 'X' && $this->arrayJogo[8] == 'X' && $this->arrayJogo[9] == ''){
            return 9;
        }
        if($this->arrayJogo[7] == 'X' && $this->arrayJogo[8] == '' && $this->arrayJogo[9] == 'X'){
            return 8;
        }
        if($this->arrayJogo[7] == '' && $this->arrayJogo[8] == 'X' && $this->arrayJogo[9] == 'X'){
            return 7;
        }

        //quinta reta
        if($this->arrayJogo[2] == 'X' && $this->arrayJogo[5] == 'X' && $this->arrayJogo[8] == ''){
            return 8;
        }
        if($this->arrayJogo[2] == 'X' && $this->arrayJogo[5] == '' && $this->arrayJogo[8] == 'X'){
            return 5;
        }
        if($this->arrayJogo[2] == '' && $this->arrayJogo[5] == 'X' && $this->arrayJogo[8] == 'X'){
            return 2;
        }

        //sexta reta
        if($this->arrayJogo[4] == 'X' && $this->arrayJogo[5] == 'X' && $this->arrayJogo[6] == ''){
            return 6;
        }
        if($this->arrayJogo[4] == 'X' && $this->arrayJogo[5] == '' && $this->arrayJogo[6] == 'X'){
            return 5;
        }
        if($this->arrayJogo[4] == '' && $this->arrayJogo[5] == 'X' && $this->arrayJogo[6] == 'X'){
            return 4;
        }

        return $this->maquinaFacil();
    }//maquinaMedio

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
                return ['gameover' => true, 'empate' => false, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [1,2,3]];
            }

            if($this->arrayJogo[1] == $value && $this->arrayJogo[4] == $value && $this->arrayJogo[7] == $value){
                return ['gameover' => true, 'empate' => false, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [1,4,7]];
            }

            if($this->arrayJogo[1] == $value && $this->arrayJogo[5] == $value && $this->arrayJogo[9] == $value){
                return ['gameover' => true, 'empate' => false, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [1,5,9]];
            }

            if($this->arrayJogo[2] == $value && $this->arrayJogo[5] == $value && $this->arrayJogo[8] == $value){
                return ['gameover' => true, 'empate' => false, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [2,5,8]];
            }

            if($this->arrayJogo[3] == $value && $this->arrayJogo[6] == $value && $this->arrayJogo[9] == $value){
                return ['gameover' => true, 'empate' => false, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [3,6,9]];
            }

            if($this->arrayJogo[3] == $value && $this->arrayJogo[5] == $value && $this->arrayJogo[7] == $value){
                return ['gameover' => true, 'empate' => false, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [3,5,7]];
            }

            if($this->arrayJogo[4] == $value && $this->arrayJogo[5] == $value && $this->arrayJogo[6] == $value){
                return ['gameover' => true, 'empate' => false, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [4,5,6]];
            }

            if($this->arrayJogo[7] == $value && $this->arrayJogo[8] == $value && $this->arrayJogo[9] == $value){
                return ['gameover' => true, 'empate' => false, 'vencedor' => $value == 'X' ? 1 : 2, 'combinacao' => [7,8,9]];
            }
        }

        if($this->checarEmpate()){
            return ['gameover' => true, 'empate' => true, 'vencedor' => '' , 'combinacao' => ''];
        }

        return ['gameover' => false,  'empate' => false, 'vencedor' => '' , 'combinacao' => ''];

    }//checarVencedor

    private function checarEmpate()
    {
        $cont = 0;
        foreach ($this->arrayJogo as $jogada){
            if($jogada == ''){
                $cont += 1;
            }
        }
        return $cont < 1 ? true : false;
    }//checarEmpate

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

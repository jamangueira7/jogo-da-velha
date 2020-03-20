<?php


namespace App\Helpers;


use Carbon\Carbon;

class Helper
{
    static function formataDataBR($data)
    {
        return $data->format('d/m/Y');
    }//formataDataBR


    static function formataLevel($level)
    {
        if($level == 1){
            return 'Facil';
        }elseif($level == 2){
            return 'Médio';
        }elseif($level == 3){
            return 'Difícil';
        }
        return 'Desconhecido';
    }//formataDataBR

    static function formataResultado($resultado)
    {
        if($resultado == 1){
            return 'Derrota';
        }elseif($resultado == 2){
            return 'Vitoria';
        }elseif($resultado == 3){
            return 'Empate';
        }
        return 'Desconhecido';
    }//formataResultado

}//Helper

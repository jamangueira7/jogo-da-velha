@extends("templates.master")


@section('css-view')
    <style type="text/css">
        .botao {
            background-color: #F93;
            padding: 10px;
            color: #000;
            text-decoration: none;
        }
        .botao a {
            color: #FFF;
            text-decoration: none;
        }
        .botao a:hover {
            background-color: #C90;
            padding: 15px;
        }
        .botao a:visited  {
            color: #FFF;
            text-decoration: none;
        }

        .botao a:active  {
            color: #FFF;
            text-decoration: none;
        }
        .msg {
            font-family: Verdana, Geneva, sans-serif;
            font-size: 24px;
            color: #F93;
        }
        #fundo {
            background-repeat: no-repeat;
            height: 443px;
            width: 515px;
            margin-right: auto;
            margin-left: auto;
            padding-bottom: 60px;
            margin-bottom: 60px;
        }
        a:link {
            font-family: Verdana, Geneva, sans-serif;
            color: #000;
            text-decoration: none;
            padding: 5px;
        }
        a:visited {
            color: #000;
            text-decoration: none;
        }
        a:active {
            color: #000;
        }

    </style>
@stop

@section('conteudo-view')

<div id="fundo">
   <h1>Regras do jogo:</h1>

    <ol >
        <li>Escolha o level (fácil, médio, difícil).</li>
        <li>Escolha a posição que deseja jogar, a maquina será seu adversario.</li>
        <li>Você sempre será o X e maquina O.</li>
        <li>O primeiro a fazer uma das conbinações vencedoras vence.</li>
        <br>
        <li>Conbinações vencedoras:</li>
        <ul>
            <li>posição 1, posição 2, posição 3</li>
            <li>posição 1, posição 4, posição 7</li>
            <li>posição 1, posição 5, posição 9</li>
            <li>posição 2, posição 5, posição 8</li>
            <li>posição 3, posição 6, posição 9</li>
            <li>posição 3, posição 5, posição 7</li>
            <li>posição 4, posição 5, posição 6</li>
            <li>posição 7, posição 8, posição 9</li>
        </ul>
        <br>
        <li>Caso queira ver o historico dos seus jogos acesse o menu lateral historico.</li>
        <li>Nos detalhes do jogo você pode ver jogada a jogada do jogo desejado.</li>
    </ol>
</div>



@stop

@section('js-view')

@stop

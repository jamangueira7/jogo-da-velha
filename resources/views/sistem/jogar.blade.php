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
            background-image: url({{asset('images/fundo.png')}});
            background-repeat: no-repeat;
            height: 443px;
            width: 515px;
            margin-right: auto;
            margin-left: auto;
            padding-bottom: 60px;
            margin-bottom: 60px;
        }
        #interacao {
            background-repeat: no-repeat;
            overflow: scroll;
            height: 130px;
            width: 515px;
            margin-right: auto;
            margin-left: auto;
            padding-bottom: 60px;
            margin-bottom: 60px;
        }
         #novo_jogo {
             background-repeat: no-repeat;
             overflow: scroll;
             height: 130px;
             width: 515px;
             margin-right: auto;
             margin-left: auto;
             padding-bottom: 60px;
             margin-bottom: 60px;
         }
        #level {
            background-repeat: no-repeat;
            height: 100px;
            width: 515px;
            margin-right: auto;
            margin-left: auto;
            padding-bottom: 60px;
            margin-bottom: 60px;
        }
        #facil, #medio, #dificil {
            width: 100px;
            padding: 15px;
            margin: 15px;
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
<div id="level" style="display: block">
    <h1>Escolha a dificuldade do jogo.</h1>
    <button type="button" class="btn btn-primary btn-lg" id="facil">Fácil</button>
    <button type="button" class="btn btn-secondary btn-lg" id="medio">Médio</button>
    <button type="button" class="btn btn-warning btn-lg" id="dificil">Difícil</button>
</div>
<div id="interacao" class="alert-dark" style="display: none">

</div>
<div id="fundo" style="display: none">
    <table width="515" height="487" border="" align="center" cellspacing="0">
        <tr>
            <td width="121" height="145" align="center">
                <table width="161" height="126" border="0" >
                    <tr>
                        <td align="center" valign="middle" id="td-1">
                            <p id="posicao1" style="display: block"><a href="#" id="p1">Posição 1</a></p>
                            <p id="jogada1-x" style="display: none;font-size:50px;">X</p>
                            <p id="jogada1-o" style="display: none;font-size:50px;">O</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="112" align="center">
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle" id="td-2">
                            <p id="posicao2" style="display: block"><a href="#" id="p2">Posição 2</a></p>
                            <p id="jogada2-x" style="display: none;font-size:50px;">X</p>
                            <p id="jogada2-o" style="display: none;font-size:50px;">O</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="80" align="center">
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle" id="td-3">
                            <p id="posicao3" style="display: block"><a href="#" id="p3">Posição 3</a></p>
                            <p id="jogada3-x" style="display: none;font-size:50px;">X</p>
                            <p id="jogada3-o" style="display: none;font-size:50px;">O</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="165" align="center">
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle" id="td-4">
                            <p id="posicao4" style="display: block"><a href="#" id="p4">Posição 4</a></p>
                            <p id="jogada4-x" style="display: none;font-size:50px;">X</p>
                            <p id="jogada4-o" style="display: none;font-size:50px;">O</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center">
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle" id="td-5">
                            <p id="posicao5" style="display: block"><a href="#" id="p5">Posição 5</a></p>
                            <p id="jogada5-x" style="display: none;font-size:50px;">X</p>
                            <p id="jogada5-o" style="display: none;font-size:50px;">O</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center">
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle" id="td-6">
                            <p id="posicao6" style="display: block"><a href="#" id="p6">Posição 6</a></p>
                            <p id="jogada6-x" style="display: none;font-size:50px;">X</p>
                            <p id="jogada6-o" style="display: none;font-size:50px;">O</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="177" align="center" valign="top" >
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle" id="td-7">
                            <p id="posicao7" style="display: block"><a href="#" id="p7">Posição 7</a></p>
                            <p id="jogada7-x" style="display: none;font-size:50px;">X</p>
                            <p id="jogada7-o" style="display: none;font-size:50px;">O</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center" valign="top">
                <table width="110" height="120" border="0" >
                    <tr>
                        <td align="center" valign="middle" id="td-8">
                            <p id="posicao8" style="display: block"><a href="#" id="p8">Posição 8</a></p>
                            <p id="jogada8-x" style="display: none;font-size:50px;">X</p>
                            <p id="jogada8-o" style="display: none;font-size:50px;">O</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center" valign="top">
                <table width="161" height="126" border="0" >
                    <tr>
                        <td align="center" valign="middle" id="td-9">
                            <p id="posicao9" style="display: block"><a href="#" id="p9">Posição 9</a></p>
                            <p id="jogada9-x" style="display: none;font-size:50px;">X</p>
                            <p id="jogada9-o" style="display: none;font-size:50px;">O</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<div id="novo_jogo" style="display: none">
    <button type="button" class="btn btn-success btn-lg btn-block" id="jogar_de_novo">Novo Jogo</button>
</div>



@stop

@section('js-view')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function level() {
            if($("#facil").hasClass("btn btn-primary btn-lg")){
                return 1;
            }
            if($("#medio").hasClass("btn btn-secondary btn-lg")){
                return 2;
            }
            if($("#dificil").hasClass("btn btn-warning btn-lg")){
                return 3;
            }
        }
        function enviarJogada(posicao) {
            $.ajax({
                type:'POST',
                url:'/jogada',
                data:{posicao:posicao, game_id:$("#jogo_num").val()},
                success:function(data){
                    console.log(data);
                    const obj = JSON.parse(data);
                    //$("#interacao").append("<p> O jogador "+ obj.play.play +" jogou na posição"+ obj.play.position +"</p>");

                    mudarTelaJogada(obj.resposta.jogador1, 'x');
                    $("#interacao").append("<p id='mg_jogada' style='line-height: 2px;'>"+ obj.resposta.jogador1msg +"</p>");
                    if(obj.resposta.jogador2 != ''){
                        mudarTelaJogada(obj.resposta.jogador2, 'o');
                        $("#interacao").append("<p id='mg_jogada' style='line-height: 2px;'>"+ obj.resposta.jogador2msg +"</p>");
                        $("#interacao").scrollTop($("#interacao").prop("scrollHeight"));

                    }

                    if(obj.resposta.gameover == true){
                        $("#fundo")
                            .css({"pointer-events" : "none" , "opacity" :  "0.4"})
                            .attr("tabindex" , "-1");
                        if(obj.resposta.empate == true){
                            $("#interacao").append("<p id='mg_jogada' style='line-height: 2px; font-size: 26px;'>Jogo empatou!</p>");
                            $('#novo_jogo').css('display', 'block');
                            return;
                        }
                        jogador_vencedor =  obj.resposta.jogador_vencedor == 1 ? 'x': 'o';
                        $("#td-"+obj.resposta.combinacao[0]).attr("style", "color:red");
                        $("#td-"+obj.resposta.combinacao[1]).attr("style", "color:red");
                        $("#td-"+obj.resposta.combinacao[2]).attr("style", "color:red");
                        $("#interacao").append("<p id='mg_jogada' style='line-height: 2px; font-size: 26px;'>"+ obj.resposta.vencedor +"</p>");
                        $('#novo_jogo').css('display', 'block');
                    }else{

                    }
                }
            });
        }

        function mudarTelaJogada(posicao, jogador) {
            $('#posicao'+posicao).css('display', 'none');
            $('#jogada'+posicao+'-'+jogador).css('display', 'block');
        }
        function criarJogo() {
            $.ajax({
                type:'POST',
                url:'/criar',
                data:{level:level()},
                success:function(data){
                    const obj = JSON.parse(data);
                    $("#num_jogo").text("Jogo: "+ obj.game);
                    $("#jogo_num").val(obj.game);
                }
            });
        }

        function inicial(){
            $("#facil").removeClass("btn btn-primary btn-lg").removeClass("btn btn-light").addClass("btn btn-primary btn-lg");
            $("#medio").removeClass("btn btn-secondary btn-lg").removeClass("btn btn-light").addClass("btn btn-secondary btn-lg");
            $("#dificil").removeClass("btn btn-warning btn-lg").removeClass("btn btn-light").addClass("btn btn-warning btn-lg");
        }

        function setLevel(level){
            inicial();
            if(level == 'facil'){
                $("#medio").removeClass("btn btn-secondary btn-lg").addClass("btn btn-light");
                $("#dificil").removeClass("btn btn-warning btn-lg").addClass("btn btn-light");
            }

            if(level == 'medio'){
                $("#facil").removeClass("btn btn-primary btn-lg").addClass("btn btn-light");
                $("#dificil").removeClass("btn btn-warning btn-lg").addClass("btn btn-light");
            }

            if(level == 'dificil'){
                $("#facil").removeClass("btn btn-primary btn-lg").addClass("btn btn-light");
                $("#medio").removeClass("btn btn-secondary btn-lg").addClass("btn btn-lightm");
            }
            criarJogo();
            $('#fundo').css('display', 'block');
            $('#interacao').css('display', 'block');
            $("#level :input").attr("disabled", true);
            $('#interacao').append('<input type="hidden" id="jogo_num" value="">');
            $('#interacao').append('<h3><p id="num_jogo"></p></h3>');
        }



        $(document).ready(function(){
            //NOVO JOGO
            $( "#jogar_de_novo" ).click(function() {

                $("#fundo").css("pointer-events", "visible");
                $("#fundo").css("opacity", "unset");
                //style="display: block; pointer-events: none; opacity: 0.4;"
                $("#fundo :input").attr("disabled", false);
                $("#level :input").attr("disabled", false);
                inicial();
                $('#fundo').css('display', 'none');
                $('#interacao').css('display', 'none');
                $('#interacao').text('');
                $('#novo_jogo').css('display', 'none');
                for (i = 1; i <= 9; i++) {
                    $("#td-"+i).attr("style", "color:black");
                    $('#posicao'+i).css('display', 'block');
                    $('#jogada'+i+'-x').css('display', 'none');
                    $('#jogada'+i+'-o').css('display', 'none');
                }

            });

            //AÇÕES LEVEL
            $( "#facil" ).click(function() {
                setLevel('facil');
            });
            $( "#medio" ).click(function() {
                setLevel('medio');
            });
            $( "#dificil" ).click(function() {
                setLevel('dificil');
            });

            //POSIÇÕES JOGO
            $('#p1').click(function(event){
                event.preventDefault();
                enviarJogada(1);
            });
            $('#p2').click(function(event){
                event.preventDefault();
                enviarJogada(2);
            });
            $('#p3').click(function(event){
                event.preventDefault();
                enviarJogada(3);
            });
            $('#p4').click(function(event){
                event.preventDefault();
                enviarJogada(4);
            });
            $('#p5').click(function(event){
                event.preventDefault();
                enviarJogada(5);
            });
            $('#p6').click(function(event){
                event.preventDefault();
                enviarJogada(6);
            });
            $('#p7').click(function(event){
                event.preventDefault();
                enviarJogada(7);
            });
            $('#p8').click(function(event){
                event.preventDefault();
                enviarJogada(8);
            });
            $('#p9').click(function(event){
                event.preventDefault();
                enviarJogada(9);
            });
        });

    </script>
@stop

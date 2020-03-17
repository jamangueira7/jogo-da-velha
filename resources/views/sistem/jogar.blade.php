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
            background-image: url(images/fundo.png);
            background-repeat: no-repeat;
            height: 443px;
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
<div id="fundo" style="display: none">
    <table width="515" height="487" border="" align="center" cellspacing="0">
        <tr>
            <td width="121" height="145" align="center">
                <table width="161" height="126" border="0" >
                    <tr>
                        <td align="center" valign="middle">
                            <?php echo isset($_SESSION['lance1']) ? $_SESSION['lance1'] : '<p><a href="#" id="p1">Posição 1</a></p>';?>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="112" align="center">
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle">
                            <?php echo isset($_SESSION['lance1']) ? $_SESSION['lance1'] : '<p><a href="#" id="p2">Posição 2</a></p>';?>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="80" align="center">
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle">
                            <?php echo isset($_SESSION['lance1']) ? $_SESSION['lance1'] : '<p><a href="#" id="p3">Posição 3</a></p>';?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="165" align="center">
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle">
                            <?php echo isset($_SESSION['lance1']) ? $_SESSION['lance1'] : '<p><a href="#" id="p4">Posição 4</a></p>';?>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center">
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle">
                            <?php echo isset($_SESSION['lance1']) ? $_SESSION['lance1'] : '<p><a href="#" id="p5">Posição 5</a></p>';?>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center">
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle">
                            <?php echo isset($_SESSION['lance1']) ? $_SESSION['lance1'] : '<p><a href="#" id="p6">Posição 6</a></p>';?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="177" align="center" valign="top">
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle">
                            <?php echo isset($_SESSION['lance1']) ? $_SESSION['lance1'] : '<p><a href="#" id="p7">Posição 7</a></p>';?>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center" valign="top">
                <table width="162" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle">
                            <?php echo isset($_SESSION['lance1']) ? $_SESSION['lance1'] : '<p><a href="#" id="p8">Posição 8</a></p>';?>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center" valign="top">
                <table width="161" height="126" border="0">
                    <tr>
                        <td align="center" valign="middle">
                            <?php echo isset($_SESSION['lance1']) ? $_SESSION['lance1'] : '<p><a href="#" id="p9">Posição 9</a></p>';?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
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
                data:{posicao:posicao, level:level()},
                success:function(data){
                    alert(data);
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
            $('#fundo').css('display', 'block');
            $("#level :input").attr("disabled", true);
        }



        $(document).ready(function(){
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

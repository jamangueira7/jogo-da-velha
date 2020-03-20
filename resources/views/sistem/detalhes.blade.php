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
            height: 180px;
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

@if(empty($jogadas['gameover']))
    <h1>Jogo não teve interação</h1>
@else
<div id="interacao" class="alert-dark" style="display: block">
    <h3>Jogo: {{$jogadas['id']}} - Level {{$jogadas['level']}}</h3><br>
    @foreach($jogadas['detalhe'] as $jogada)
        <p style='line-height: 2px;'>{{$jogada}}</p>
    @endforeach
    <h3>{{$jogadas['vencedor']}}</h3>
</div>

<div id="fundo" style="display: block">
   <table width="515" height="487" border="" align="center" cellspacing="0" >
       <tr>
           <td width="121" height="145" align="center">
               <table width="161" height="126" border="0" >
                   <tr>
                       <td align="center" valign="middle" id="td-1">
                           @if($jogadas['jogadas'][1] == 'X')
                                <p id="jogada1-x" style="font-size:50px;">X</p>
                           @elseif($jogadas['jogadas'][1] == 'O')
                                <p id="jogada1-o" style="font-size:50px;">O</p>
                           @endif
                       </td>
                   </tr>
               </table>
           </td>
           <td width="112" align="center">
               <table width="161" height="126" border="0">
                   <tr>
                       <td align="center" valign="middle" id="td-2">
                           @if($jogadas['jogadas'][2] == 'X')
                                <p id="jogada2-x" style="font-size:50px;">X</p>
                           @elseif($jogadas['jogadas'][2] == 'O')
                                <p id="jogada2-o" style="font-size:50px;">O</p>
                           @endif
                       </td>
                   </tr>
               </table>
           </td>
           <td width="80" align="center">
               <table width="161" height="126" border="0">
                   <tr>
                       <td align="center" valign="middle" id="td-3">
                           @if($jogadas['jogadas'][3] == 'X')
                                <p id="jogada3-x" style="font-size:50px;">X</p>
                           @elseif($jogadas['jogadas'][3] == 'O')
                                <p id="jogada3-o" style="font-size:50px;">O</p>
                           @endif
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
                           @if($jogadas['jogadas'][4] == 'X')
                                <p id="jogada4-x" style="font-size:50px;">X</p>
                           @elseif($jogadas['jogadas'][4] == 'O')
                                <p id="jogada4-o" style="font-size:50px;">O</p>
                           @endif
                       </td>
                   </tr>
               </table>
           </td>
           <td align="center">
               <table width="161" height="126" border="0">
                   <tr>
                       <td align="center" valign="middle" id="td-5">
                           @if($jogadas['jogadas'][5] == 'X')
                                <p id="jogada5-x" style="font-size:50px;">X</p>
                           @elseif($jogadas['jogadas'][5] == 'O')
                                <p id="jogada5-o" style="font-size:50px;">O</p>
                           @endif
                       </td>
                   </tr>
               </table>
           </td>
           <td align="center">
               <table width="161" height="126" border="0">
                   <tr>
                       <td align="center" valign="middle" id="td-6">
                           @if($jogadas['jogadas'][6] == 'X')
                                <p id="jogada6-x" style="font-size:50px;">X</p>
                           @elseif($jogadas['jogadas'][6] == 'O')
                                <p id="jogada6-o" style="font-size:50px;">O</p>
                           @endif
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
                           @if($jogadas['jogadas'][7] == 'X')
                                <p id="jogada7-x" style="font-size:50px;">X</p>
                           @elseif($jogadas['jogadas'][7] == 'O')
                                <p id="jogada7-o" style="font-size:50px;">O</p>
                           @endif
                       </td>
                   </tr>
               </table>
           </td>
           <td align="center" valign="top">
               <table width="110" height="120" border="0" >
                   <tr>
                       <td align="center" valign="middle" id="td-8">
                           @if($jogadas['jogadas'][8] == 'X')
                                <p id="jogada8-x" style="font-size:50px;">X</p>
                           @elseif($jogadas['jogadas'][8] == 'O')
                                <p id="jogada8-o" style="font-size:50px;">O</p>
                           @endif
                       </td>
                   </tr>
               </table>
           </td>
           <td align="center" valign="top">
               <table width="161" height="126" border="0" >
                   <tr>
                       <td align="center" valign="middle" id="td-9">
                           @if($jogadas['jogadas'][9] == 'X')
                                <p id="jogada9-x" style="font-size:50px;">X</p>
                           @elseif($jogadas['jogadas'][9] == 'O')
                                <p id="jogada9-o" style="font-size:50px;">O</p>
                           @endif
                       </td>
                   </tr>
               </table>
           </td>
       </tr>
   </table>
</div>
@endif
@stop

@section('js-view')
<script>
    $(document).ready(function(){
        $("#interacao").scrollTop($("#interacao").prop("scrollHeight"));

            $("#td-"+<?=$jogadas['combinacao'][0]?>).attr("style", "color:red");
            $("#td-"+<?=$jogadas['combinacao'][1]?>).attr("style", "color:red");
            $("#td-"+<?=$jogadas['combinacao'][2]?>).attr("style", "color:red");

    });

</script>
@stop

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
    <form method="POST" action="{{url('update',[$user->id])}}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="form-group">
            <label for="fname">Nome:</label>
            <input type="text" id="name" name="name" value="{{$user->name}}"  class="form-control"><br>
        </div>
        <div class="form-group">
            <label >Senha:</label>
            <input type="password"  maxlength="10" id="password" name="password" value=""  class="form-control"><br>
        </div>
        <div class="form-group">
            <label for="fname">Confirme senha:</label>
            <input type="password" maxlength="10" id="conf" name="conf" value=""  class="form-control"><br>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>



@stop

@section('js-view')

@stop

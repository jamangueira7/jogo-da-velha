<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Loing | Investindo</title>
    <link rel="stylesheet" href="{{asset('/css/stylesheet.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/alerts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script type='text/javascript' src='{{ asset('js/app.js') }}'></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js'></script>

    <script type='text/javascript'>
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00', {reverse: true});
        });
    </script>
</head>
<body>
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

<div id="fundo">
    <h1>Cadastre-se</h1><br>
    <form method="POST" action="{{url('criar-user')}}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="form-group">
            <label for="fname">Nome:</label>
            <input type="text" maxlength="100" id="name" name="name" value=""  class="form-control"><br>
        </div>
        <div class="form-group">
            <label for="fname">E-mail:</label>
            <input type="email" id="email" name="email" value=""  class="form-control"><br>
        </div>
        <div class="form-group">
            <label for="fname">CPF:</label>
            <input type="text" maxlength="14" id="cpf" name="cpf" value=""  class="form-control"><br>
        </div>
        <div class="form-group">
            <label >Senha:</label>
            <input type="password" maxlength="10"  id="password" name="password" value=""  class="form-control"><br>
        </div>
        <div class="form-group">
            <label for="fname">Confirme senha:</label>
            <input type="password" maxlength="10"  id="conf" name="conf" value=""  class="form-control"><br>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>


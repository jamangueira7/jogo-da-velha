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
</head>
<body>

<div class="background"></div>
<section id="conteudo-view" class="login">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')['messages']}}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{session('error')['messages']}}
        </div>
    @endif
    <h2>Jogo da Velha</h2>

        <form action="{{url('logar')}}" method="POST">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <p>Acesse o sistema</p>
            <div class="form-group">
                <label for="fname">Email:</label>
                <input type="email" id="email" name="email" value=""  class="form-control"><br>
            </div>
            <div class="form-group">
                <label >Senha:</label>
                <input type="password" id="password" name="password" value=""  class="form-control"><br>
            </div>
            <p><a href="{{url('cadastro')}}">Cadastre-se</a></p>
            <button type="submit" class="btn btn-primary btn-lg">Logar</button>
        </form>

</section>
</body>
</html>

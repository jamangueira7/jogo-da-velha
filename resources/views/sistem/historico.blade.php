@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Level</th>
                <th>Resultado</th>
                <th>Data</th>
                <th>Jogadas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jogos as $jogo)
            <tr>
                <td>{{$jogo->id}}</td>
                <td>{{\App\Helpers\Helper::formataLevel($jogo->level)}}</td>
                <td>{{\App\Helpers\Helper::formataResultado($jogo->result)}}</td>
                <td>{{\App\Helpers\Helper::formataDataBR($jogo->created_at)}}</td>
                <td><a href="{{url('detalhes',[$jogo->id])}}">Ver Jogadas</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $jogos->links() }}



@stop

@section('js-view')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            $('#p1').click(function(event){
                event.preventDefault();
                alert('entrou 1.');
            });
            $('#p2').click(function(event){
                event.preventDefault();
                alert('entrou 2.');
            });
            $('#p3').click(function(event){
                event.preventDefault();
                alert('entrou 3.');
            });
            $('#p4').click(function(event){
                event.preventDefault();
                alert('entrou 4.');
            });
            $('#p5').click(function(event){
                event.preventDefault();
                alert('entrou 5.');
            });
            $('#p6').click(function(event){
                event.preventDefault();
                alert('entrou 6.');
            });
            $('#p7').click(function(event){
                event.preventDefault();
                alert('entrou 7.');
            });
            $('#p8').click(function(event){
                event.preventDefault();
                alert('entrou 8.');
            });
            $('#p9').click(function(event){
                event.preventDefault();
                alert('entrou 9.');
            });
        });

        /*$.ajax({

            type:'POST',
            url:'/ajaxRequest',
            data:{name:name, password:password, email:email},
            success:function(data){
                alert(data.success);
            }
        });*/
    </script>
@stop

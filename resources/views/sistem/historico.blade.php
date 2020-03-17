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

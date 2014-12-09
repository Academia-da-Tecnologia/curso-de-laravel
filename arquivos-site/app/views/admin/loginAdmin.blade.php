<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Painel administrativo</title>

    <!-- Core CSS - Include with every page -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="{{ URL::asset('css/admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="{{ URL::asset('css/admin/sb-admin.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">

                    <div class="panel-heading">
                           <div style="text-align:center;padding:5px;">   
                               @if(Session::has('mensagem'))
                                    {{ Session::get('mensagem') }}
                               @endif
                            </div>
                        <h3 class="panel-title">Área restrita, faça o login abaixo</h3>
                    </div>
                    <div class="panel-body">
                        @include('partials/admin/login/formLoginAdmin')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="{{ URL::asset('js/admin/jquery-1.10.2.js')}}"></script>
    <script src="{{ URL::asset('js/admin/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('js/admin/plugins/metisMenu/jquery.metisMenu.js')}}"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="{{ URL::asset('js/admin/sb-admin.js')}}"></script>

</body>

</html>

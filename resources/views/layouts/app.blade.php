<html lang="ja">
    <head>
        <title>明石高専学生食堂システム - @yield('title')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- jQuery読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
        <!--満足度の星--> 
        <link rel="stylesheet" href="{{asset('css/style.css')}}"> 

        <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
        </script>

        <style>
            /*div {
                border: 1px solid #000000;
            }*/

            /*table関連*/
            table {
                border-collapse: collapse;
            }
            th {
                border: solid 1px;
                padding: 0.1em;
                text-align: center;
                width: 100px;
            }
            td{
                border: solid 1px;
                padding: 0.1em;
                text-align: center;
            }

            .checked {
                color: orange;
            }
        </style> 
    </head>

    <body>
        @section('sidebar')
            <nav class="navbar fixed-top navbar-dark bg-dark">
                <a class="navbar-brand" href="/">明石高専学生食堂システム</a>
            </nav>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
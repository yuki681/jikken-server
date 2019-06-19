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


        <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
        </script>

        <style>
            /* div {
                <!--border: 1px solid #000000;-->
            } */
            table {
                border-collapse: collapse;
            }
            th {
                border: solid 1px;
                padding: 0.5em;
                text-align: center;
                width: 100px;
            }
            td{
                border: solid 1px;
                padding: 0.5em;
                text-align: center;
            }
        </style> 
    
    </head>
    <body>
        @section('sidebar')
            ここがメインのサイドバー
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>

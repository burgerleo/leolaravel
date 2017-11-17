<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="csrf-token" content="{{ csrf_token() }}" />
 <title>{{$title}}</title>
 <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
 <script src="//code.jquery.com/jquery-1.12.4.js"></script>

 <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

 <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
 <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

 <script src="{{ asset('js/jquery-2.2.3.min.js')}}"></script>
 <script src="{{ asset('js/bootstrap.min.js')}}"></script>
 <script src="{{ asset('js/vue.js')}}"></script>

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
<!-- Latest compiled and minified Locales -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/locale/bootstrap-table-zh-CN.min.js"></script>

</head>

<body>
    @yield('content')
</body>
</html>
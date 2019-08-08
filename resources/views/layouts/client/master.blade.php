<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{$setting['company_name']}}</title>


    <link rel="stylesheet" href="/css/app.css">

</head>
<body>
<div id="client">
    <header>
        @include('layouts.client.header')
    </header>





    @yield('content')




    <footer>
        @include('layouts.client.footer')
    </footer>
</div>
</body>


<script src="/js/client.js"></script>
</html>

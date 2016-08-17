<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="{{route('elasticSearch')}}" method="POST">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="text" name="name" value="">
        <input type="submit" value="Enviar">
    </form>

    <!--
    "cviebrock/laravel-elasticsearch": "^1.2",
    "elasticquent/elasticquent": "dev-master"
    -->
    <br>

    @if(isset($product))
        <h1>{{$product}}</h1>
    @endif
</body>
</html>
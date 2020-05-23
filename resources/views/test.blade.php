@extends('layoutBack')

@section('content')
    <div class="BackContainer">
        <div id="preview"></div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#preview').load('{{route('productPreview')}}', function(response, data, xhr){
            $('.prouductName').html('<h1>bienvenido</h1>');
        });
    </script>
@endsection
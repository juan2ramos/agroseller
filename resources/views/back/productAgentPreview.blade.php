@extends('layoutBack')
@section('content')
    <section class="BackContainer">
        <h2>Previsualización del producto</h2>
        <hr>
        <br>
        <article>
            <form  class="row" action="{{route('validateProduct', $product->id)}}" method="POST">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                <button class="Button small-12">
                    @if(!$product->isValidate)
                        Aprobar producto
                    @else
                        Desactivar producto
                    @endif
                </button>
            </form>
        </article>
        <article style="padding: 30px" id="preview"></article>
    </section>
@endsection
@section('scripts')
    <script>
        $('#preview').load('{{route('productDetail', ['slug' => $product->slug, 'id' => $product->id ])}}', function(response, error, thr){
            $('#buy').parent().prepend('<div class="Button">COMPRAR</div>');
            $('.BarInfo, .Header, .Comments, .Footer, #buy, .Provider-detail a, .social-share a').remove();
        });
    </script>
@endsection
@section('style')
    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.transitions.css')}}" rel="stylesheet">
@endsection
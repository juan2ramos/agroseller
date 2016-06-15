@extends('layoutBack')
@section('content')
    <section class="BackContainer">
        <article style="padding: 30px">
            caja paraprevisualizacion de producto
        </article>
        {{$product->isValidate}}
        <article>
            <form  class="row" action="{{route('validateProduct', $product->id)}}" method="POST">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                <button class="Button col-12">
                    @if(!$product->isValidate)
                    Aprobar producto
                    @else
                    Desactivar producto
                    @endif
                </button>
            </form>
        </article>
    </section>
@endsection
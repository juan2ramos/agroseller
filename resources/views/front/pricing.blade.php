@extends('layoutFront')

@section('content')
    @if (session('message'))
        <div class="MessagePlatform row middle center">
            <div class="MessagePlatform-content">
                <span class="MessagePlatform-close">X</span>
                <h2>!Tienes un nuevo mensaje!</h2>
                <p>{{session('message')}}</p>
                <p>Gracias</p>
                <p class="MessagePlatform-last">Centro de notificaciones <span>Agrosellers</span></p>
            </div>
        </div>
    @endif

    <section class="Pricing row middle">
        @foreach($plans as $plan)
        <article class="col-4">
            <h2>{{$plan->name}}</h2>
            <h3>{{$plan->description}}</h3>
            <div class="Pricing-price">
                <div class="Price"></div>
                <div class="row center" style="margin-top: 15px">
                    <select class="js-example-basic-single" id="select{{$plan->id}}" name="select">
                        @foreach($plan->planPrices()->get() as $planInfo)
                            <option value="{{$planInfo->id}}" price="{{$planInfo->price}}">{{$planInfo->period}} meses</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {!! $plan->features !!}
            <a href="{{route('payPlan', $plan->slug)}}" class="Button">¡OBTENLO AHORA!</a>
        </article>
        @endforeach
    </section>
@endsection

@section('scripts')
    <script src="{{asset('js/select2.js')}}"></script>
    <script>
        for(var i = 1; i <= 3; i++){
            var $select2 = $('#select' + i);
            $select2.parent().siblings('.Price').text('$' + thousand($select2.children('option:selected').attr('price')));
            $select2.select2({minimumResultsForSearch : -1, width: '176px'}).change(function(){$(this).parent().siblings('.Price').text('$' + thousand($(this).children('option:selected').attr('price')))});
        }
    </script>
@endsection

@section('styles')
    <link href='https://fonts.googleapis.com/css?family=Alegreya:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
@endsection
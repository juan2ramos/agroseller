@extends('layoutFront')

@section('content')
    <section class="Platform row middle">
        <figure class="col-4"><img src="{{url('images/Platform.jpg')}}" alt=""></figure>
        <div class="Platform-info col-8">
            <p> Obten gratis TODOS los servicios que  te ofrece agrosellers. ¡Suscribite AHORA!</p>
            <a href="{{route('planDetail')}}" class="Button">¡OBTENLO AHORA!</a>
        </div>
    </section>
    <section class="Pricing row middle">
        @foreach($plans as $plan)
        <article class="col-4">
            <h2>{{$plan->name}}</h2>
            <h3>{{$plan->description}}</h3>
            <div class="Pricing-price">
                <div id="Pricing"></div>
                <div class="row center" style="margin-top: 15px">
                    <select class="js-example-basic-single" id="period" name="period">
                        @foreach($plan->planPrices()->get() as $planInfo)
                            <option value="{{$planInfo->id}}" price="{{$planInfo->price}}">{{$planInfo->period}} meses</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {!! $plan->features !!}
            <a href="{{route('planDetail', $plan->slug)}}" class="Button">¡OBTENLO AHORA!</a>
        </article>
        @endforeach
    </section>
@endsection

@section('scripts')
    <script src="{{asset('js/select2.js')}}"></script>
    <script>
        $('#Pricing').text('$' + $('#period').children('option').eq(0).attr('price'));

        $(".js-example-basic-single").select2({minimumResultsForSearch : -1, width: '176px'}).change(function(){
            $('#Pricing').text('$' + $('#period').children('option:selected').attr('price'));
        });
    </script>
@endsection

@section('styles')
    <link href='https://fonts.googleapis.com/css?family=Alegreya:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
@endsection
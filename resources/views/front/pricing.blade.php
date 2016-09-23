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

    <section class="Pricing row middle center">
        @foreach($plans as $plan)
            <article class="smaller-12 col-4">
                <form action="{{route('payPlan', $plan->id)}}" method="POST">
                    <img style="    max-width: 135px;margin: 18px auto;" src="{{asset('images/'.$plan->image)}}" alt="">
                    <h2>{{$plan->name}}</h2>
                    <h3>{{$plan->description}}</h3>
                    <div class="Pricing-price">
                        <div class="Price"></div>
                        <div class="row center" style="margin-top: 15px">

                            <select class="js-example-basic-single" id="select{{$plan->id}}" name="period">
                                @foreach($plan->planPrices()->get() as $planInfo)

                                    <option value="{{$planInfo->period}}"
                                            price="{{$planInfo->price}}">{{$planInfo->period}} meses
                                    </option>
                                @endforeach
                            </select>

                            <input type="hidden" name="price" id="price{{$plan->id}}" value="">
                        </div>
                    </div>
                    {!! $plan->features !!}
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="name" value="{{$plan->name}}">
                    <input type="hidden" name="description" value="{{$plan->features}}">
                    <input style="border:none" type="submit" value="¡OBTENLO AHORA!" class="Button">
                </form>
            </article>
        @endforeach
    </section>
@endsection

@section('scripts')
    <script src="{{asset('js/select2.js')}}"></script>
    <script>
        for (var i = 1; i <= 3; i++) {
            var $select2 = $('#select' + i),
                    $priceInput = $('#price' + i),
                    price = $select2.children('option:selected').attr('price');
            if (price == 0) {
                price = "(57) 3178704270";
                $priceInput.val(price);
                $select2.parent().siblings('.Price').text(price);
                $select2.css('display', 'none');
            } else {
                $priceInput.val(price);
                $select2.parent().siblings('.Price').text('$' + thousand(price));
            }

            $select2.select2({minimumResultsForSearch: -1, width: '176px'}).change(function () {
                var priceChange = $(this).children('option:selected').attr('price');
                $(this).parent().siblings('.Price').text('$' + thousand(priceChange))
                $(this).siblings().val(priceChange);
            });
        }
    </script>
@endsection

@section('styles')
    <link href='https://fonts.googleapis.com/css?family=Alegreya:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
@endsection
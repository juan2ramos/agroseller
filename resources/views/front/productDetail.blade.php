@extends('layoutFront')
@section('openGraph')

    <meta property="og:url" content="{{route('productDetail', ['slug' => $product->product->slug, 'id' => $product->product->id])}}"/>

    <meta property="og:type" content="{{route('home')}}"/>
    <meta property="og:title" content="{{$product->product->name}}"/>
    <meta property="og:description" content="{{$product->product->description}}"/>


    @foreach($product->product->files as $file)
        @if($file->extension != 'pdf')
            <meta property="og:image" content="{{url('uploads/products/' . $file->name)}}"/>
            @break
        @endif
    @endforeach
@endsection
@section('content')

    <section class="row Header-product">
        <article class="ProductDetail-slider smaller-12 col-3 ">
            <div class="owl-carousel" id="sync1">
                @foreach($product->product->files as $file)
                    @if($file->extension != 'pdf')
                        <figure class="item"><img src="{{url('uploads/products/'. $file->name)}}" alt=""></figure>
                    @endif
                @endforeach
            </div>
        </article>
        <div class="col-6 row">
            <h1 class="col-12">{{$product->product->name}}</h1>
            <div class="col-6 small-12">
                <span>Valor unidad</span>
                <h4>${{number_format($product->price, 0, " ", ".")}}</h4>
            </div>
            <div class="col-6 small-12">
                <span>Cantidad</span>
                <input type="number" id="Value" value="1">
            </div>
            <div class="col-12 Header-productDescription">
                {!!$product->product->description!!}
            </div>
            <div class="col-12 row bottom">
                <div class="col-8">
                    <button class="Button">MÁS INFO</button>
                    <a href="" target="_blank" class="Button">FICHA TECNICA</a>
                </div>
                <div class="col-4">
                    <ul class=" row end ">
                        <li>Compartir en:</li>
                        <li>
                            <a href="">
                                <svg width="28px" height="28px" viewBox="887 240 28 28" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 40.3 (33839) - http://www.bohemiancoding.com/sketch -->
                                    <desc>Created with Sketch.</desc>
                                    <defs></defs>
                                    <g id="1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                       transform="translate(887.000000, 240.000000)">
                                        <g id="Created-with-Sketch.">
                                            <g id="iconos-terminados-09">
                                                <g id="Capa_1">
                                                    <path d="M7.10956521,23.244058 C8.54977599,23.3709618 9.80996045,23.208643 10.7012385,22.0901186 C11.2017085,21.3931679 11.6647263,20.6700721 12.0883267,19.9238998 C12.6785771,18.9824506 13.2009486,17.96722 13.9151515,17.1202108 C15.1694335,15.644585 16.8870619,14.9805534 18.799473,14.7975758 C20.9785111,14.5604976 23.1781214,14.9917735 25.1062977,16.0341502 C25.5162541,16.2885309 25.9104721,16.5674401 26.2867984,16.8693544 C25.8006496,17.0000132 25.321859,17.1566547 24.8524901,17.3386034 C23.6926483,17.860975 22.9430303,18.8378392 22.1963636,19.8088011 C21.4054282,20.8240316 20.6440053,21.8746772 19.7881423,22.8308828 C18.1679051,24.6488538 16.0400527,25.1918841 13.6967589,25.0177602 C13.0259156,24.9393275 12.3598941,24.8240545 11.7017127,24.6724638 C11.6060661,24.6434707 11.5132199,24.6059372 11.4242951,24.5603162 C12.1207905,24.4216074 12.7730171,24.3065085 13.4193413,24.1648485 C15.3993251,23.7420123 17.1803809,22.6675597 18.4777866,21.1132543 C19.0680369,20.4315152 19.6582873,19.7645322 20.2485375,19.0886956 C21.010431,18.1740823 21.9660636,17.440221 23.0463241,16.9401845 L23.0197629,16.8398419 C22.7039789,16.9431357 22.3822925,17.0257708 22.0783136,17.1556258 C21.1991332,17.5593809 20.4071752,18.1307936 19.7468248,18.8378392 C19.2628195,19.3306983 18.7611067,19.8058498 18.3036627,20.3134651 C16.7572068,22.0606061 14.7621608,22.9695915 12.5221608,23.4004743 C10.7748707,23.6999762 8.99588836,23.7694289 7.23056653,23.6070619 C7.00332016,23.5923057 6.77607378,23.5657444 6.76131752,23.2588142"
                                                          id="Shape" fill="#C0D24C"></path>
                                                    <path d="M15.5914625,13.41639 L12.9087747,13.41639 L12.9087747,22.9813966 L8.93343878,22.9813966 L8.93343878,13.41639 L7.04463768,13.41639 L7.04463768,10.0342556 L8.93638998,10.0342556 L8.93638998,7.85032938 C8.93638998,6.28616601 9.68010544,3.83957839 12.9471409,3.83957839 L15.8983926,3.83957839 L15.8983926,7.13317523 L13.7528327,7.13317523 C13.4016337,7.13317523 12.9087747,7.30729908 12.9087747,8.05396574 L12.9087747,10.0342556 L15.9367589,10.0342556 L15.5914625,13.41639 L15.5914625,13.41639 Z"
                                                          id="Shape" fill="#7B7F2A"></path>
                                                    <path d="M13.5757576,0.0413175231 L14.5172068,0.0855862976 C14.670672,0.0855862976 14.8418445,0.0855862976 15.0307246,0.118050066 L15.6416337,0.209538867 C15.8629776,0.244953887 16.102029,0.2685639 16.3499341,0.324637681 L17.1408695,0.525322793 C18.4781623,0.885647042 19.7515035,1.451134 20.9155204,2.20163373 C24.2893315,4.36125104 26.5345844,7.90308882 27.0482214,11.8758366 C27.0983926,12.1709618 27.0954413,12.4483794 27.1190514,12.7376021 L27.1485639,13.1743873 L27.1485639,13.39278 L27.1485639,13.6200263 C27.1392579,15.4513384 26.7712926,17.263091 26.0654545,18.9529381 L25.6758894,19.8117523 C25.5401318,20.1068775 25.3601054,20.3636364 25.203689,20.6440053 L24.9587352,21.0601318 C24.8672464,21.1929381 24.7728063,21.3227932 24.66361,21.4526483 C24.4717786,21.7123584 24.2917523,21.9838735 24.0733597,22.2317786 C23.2284938,23.244114 22.2506438,24.137581 21.1663768,24.8879051 C20.049103,25.6331335 18.8319243,26.2163857 17.5510936,26.6202898 L16.571278,26.8770487 L16.3263241,26.939025 L16.0754678,26.9773913 L15.5737549,27.0570751 C15.241494,27.1195506 14.9051652,27.1580163 14.5673782,27.1721739 L13.5314888,27.2252964 C12.1844159,27.201121 10.8465611,26.9976638 9.55320155,26.6202898 C8.27260528,26.2171232 7.05545953,25.6348805 5.93791831,24.8908564 C4.8532166,24.1399816 3.87446061,23.2465937 3.02798419,22.2347299 C2.82139657,21.9838735 2.64137023,21.7123584 2.43773386,21.4526483 C2.34329381,21.3227932 2.2459025,21.1929381 2.14260869,21.0601318 L1.89765481,20.6440053 C1.79731225,20.3636364 1.62023716,20.0980237 1.47562582,19.8117523 L1.07720685,18.9499868 C0.372856575,17.2578287 0.00689356099,15.4440558 0,13.6111726 L0,13.380975 L0,13.1655336 L0.0295125165,12.7376021 C0.0560737813,12.4424769 0.0531225297,12.1709618 0.100342556,11.8846904 C0.613554651,7.90713271 2.86252324,4.36130573 6.24189723,2.20163373 C7.40595953,1.45121795 8.67928727,0.885736982 10.0165481,0.525322793 L10.8074835,0.324637681 C11.0583399,0.271515152 11.2973913,0.247905138 11.5157839,0.209538867 L12.126693,0.118050066 C12.3126218,0.0914888011 12.4867457,0.0973913046 12.6402108,0.0855862976 L13.5757576,0.0413175231 L13.5757576,0.0413175231 Z M13.5757576,0.0413175231 L12.6343083,0.0914888011 C12.4808432,0.0914888011 12.3096706,0.0914888011 12.1207905,0.12690382 L11.5098814,0.221343873 C11.2914888,0.259710145 11.0524375,0.283320158 10.801581,0.339393939 L10.0135968,0.545981555 C8.68068973,0.908674217 7.41644777,1.48795226 6.27140975,2.26065876 C4.78532659,3.25468804 3.51628617,4.53979225 2.54102767,6.03826087 C1.41349296,7.80995465 0.713320902,9.81953942 0.495810277,11.9083004 C0.457444005,12.1798155 0.469249012,12.4719894 0.451541502,12.7553096 L0.436785244,13.1861924 L0.436785244,13.4016337 L0.436785244,13.6023188 C0.500807272,15.3633516 0.908863047,17.0948315 1.63794466,18.6991305 L2.06587615,19.5077733 C2.19573123,19.773386 2.36100132,20.0242424 2.52922267,20.2839526 L2.77417655,20.6587615 C2.86271409,20.7827141 2.9601054,20.9007642 3.05454545,21.0217655 C3.24637681,21.2608169 3.42050066,21.5146245 3.62413702,21.7448221 C4.44413841,22.6805238 5.38383455,23.5041222 6.41897233,24.194361 C7.48309469,24.8694544 8.63105795,25.4022601 9.83357047,25.7791831 C11.0618063,26.1287076 12.3312853,26.3123304 13.6082214,26.3251647 L14.5378656,26.2779447 C14.8547944,26.2670187 15.1704686,26.2324919 15.4822661,26.1746509 L15.9515152,26.1038208 L16.1876153,26.0684058 L16.4178129,26.0093807 L17.3386034,25.7762319 C17.6337286,25.6876943 17.9288538,25.566693 18.2239789,25.4633992 C18.3715415,25.4073254 18.5191041,25.3601054 18.6666667,25.2981291 L19.0916469,25.0944928 L19.5195784,24.8938076 C19.6637924,24.8320199 19.8029293,24.7589977 19.9357049,24.675415 L20.7443479,24.194361 C21.7788209,23.5032552 22.7184094,22.6797511 23.5391831,21.7448221 C23.7428195,21.5146245 23.9198946,21.2608169 24.1087747,21.0217655 C24.2002635,20.9007642 24.2976548,20.7797629 24.3891436,20.6587615 L24.6311462,20.2721476 C24.7875625,20.0124375 24.967589,19.7645322 25.1062977,19.4959684 L25.5106193,18.6873254 C26.2411152,17.0803889 26.6492104,15.3457334 26.7117786,13.5816601 L26.7117786,13.3780237 L26.7117786,13.1655336 L26.7117786,12.7435046 C26.6940712,12.4483794 26.7117786,12.1798155 26.6675099,11.9053491 C26.4511071,9.81221844 25.749834,7.798332 24.6193413,6.02350461 C23.6430291,4.52490092 22.3729993,3.23981143 20.8860079,2.2459025 C19.7408911,1.47333633 18.4766731,0.894069264 17.1438208,0.531225297 L16.3558366,0.324637681 C16.1079315,0.2685639 15.8688801,0.244953887 15.6475362,0.206587615 L15.0513834,0.129855072 C14.8654545,0.103293807 14.6913307,0.106245059 14.5378656,0.0944400528 L13.5757576,0.0413175231 L13.5757576,0.0413175231 Z"
                                                          id="Shape" fill="#A9ABAE"></path>
                                                    <path d="M9.922108,22.2022661 C9.40859029,22.2465349 8.96,22.2022661 8.6412648,21.7920422 C8.46236174,21.5433001 8.29685645,21.2851906 8.14545455,21.0188142 C7.95016728,20.6723566 7.73228745,20.3391286 7.49322793,20.0212911 C7.05099699,19.5183158 6.42387765,19.2159356 5.75494072,19.1831357 C4.97900411,19.097822 4.19550459,19.2512273 3.5090382,19.6228722 C3.36254902,19.7126617 3.22161615,19.8112162 3.08700922,19.9179974 C3.26008198,19.9649068 3.4305154,20.0210611 3.59757576,20.0862187 C3.98273162,20.298154 4.30926136,20.6023743 4.54787879,20.9715942 C4.84300396,21.3345981 5.09976284,21.7064559 5.40669301,22.0488011 C5.9591624,22.6471109 6.76896347,22.9379783 7.57586298,22.8279315 C7.81504228,22.7997003 8.05248559,22.7583201 8.28711462,22.7039789 C8.3217599,22.6933168 8.35534932,22.6794858 8.38745718,22.6626614 C8.13955204,22.6124901 7.90640316,22.5711726 7.67620553,22.5210013 C6.97059897,22.3708061 6.33570564,21.9884154 5.87299078,21.4349407 C5.66345191,21.1929381 5.4509618,20.9538867 5.23847167,20.7118841 C4.9666845,20.3863527 4.62596797,20.1252711 4.24094862,19.9475099 L4.25570487,19.9120949 C4.36785244,19.9504612 4.48295125,19.9770224 4.59214756,20.0242424 C4.90404923,20.1656883 5.18565332,20.3661183 5.42144928,20.6144928 C5.59262187,20.7886166 5.77264822,20.9597892 5.93496706,21.1427668 C6.4789107,21.7332613 7.2073489,22.1214148 8.00084322,22.2435837 C8.62354368,22.350396 9.25755091,22.3752007 9.88669301,22.317365 C9.96932805,22.317365 10.0490119,22.317365 10.0549144,22.1934124"
                                                          id="Shape" fill="#C0D24C"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a></li>
                        <li><a href="">

                                <svg width="28px" height="28px" viewBox="919 240 28 28" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 40.3 (33839) - http://www.bohemiancoding.com/sketch -->
                                    <desc>Created with Sketch.</desc>
                                    <defs></defs>
                                    <g id="1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                       transform="translate(919.000000, 240.000000)">
                                        <g id="Created-with-Sketch.">
                                            <g id="iconos-terminados-09">
                                                <g id="Capa_1">
                                                    <path d="M7.10956521,23.244058 C8.54977599,23.3709618 9.80996045,23.208643 10.7012385,22.0901186 C11.2017085,21.3931679 11.6647263,20.6700721 12.0883267,19.9238998 C12.6785771,18.9824506 13.2009486,17.96722 13.9151515,17.1202108 C15.1694335,15.644585 16.8870619,14.9805534 18.799473,14.7975758 C20.9785111,14.5604976 23.1781214,14.9917735 25.1062977,16.0341502 C25.5162541,16.2885309 25.9104721,16.5674401 26.2867984,16.8693544 C25.8006496,17.0000132 25.321859,17.1566547 24.8524901,17.3386034 C23.6926483,17.860975 22.9430303,18.8378392 22.1963636,19.8088011 C21.4054282,20.8240316 20.6440053,21.8746772 19.7881423,22.8308828 C18.1679051,24.6488538 16.0400527,25.1918841 13.6967589,25.0177602 C13.0259156,24.9393275 12.3598941,24.8240545 11.7017127,24.6724638 C11.6060661,24.6434707 11.5132199,24.6059372 11.4242951,24.5603162 C12.1207905,24.4216074 12.7730171,24.3065085 13.4193413,24.1648485 C15.3993251,23.7420123 17.1803809,22.6675597 18.4777866,21.1132543 C19.0680369,20.4315152 19.6582873,19.7645322 20.2485375,19.0886956 C21.010431,18.1740823 21.9660636,17.440221 23.0463241,16.9401845 L23.0197629,16.8398419 C22.7039789,16.9431357 22.3822925,17.0257708 22.0783136,17.1556258 C21.1991332,17.5593809 20.4071752,18.1307936 19.7468248,18.8378392 C19.2628195,19.3306983 18.7611067,19.8058498 18.3036627,20.3134651 C16.7572068,22.0606061 14.7621608,22.9695915 12.5221608,23.4004743 C10.7748707,23.6999762 8.99588836,23.7694289 7.23056653,23.6070619 C7.00332016,23.5923057 6.77607378,23.5657444 6.76131752,23.2588142"
                                                          id="Shape" fill="#C0D24C"></path>
                                                    <path d="M13.5757576,0.0413175231 L14.5172068,0.0855862976 C14.670672,0.0855862976 14.8418445,0.0855862976 15.0307246,0.118050066 L15.6416337,0.209538867 C15.8629776,0.244953887 16.102029,0.2685639 16.3499341,0.324637681 L17.1408695,0.525322793 C18.4781623,0.885647042 19.7515035,1.451134 20.9155204,2.20163373 C24.2893315,4.36125104 26.5345844,7.90308882 27.0482214,11.8758366 C27.0983926,12.1709618 27.0954413,12.4483794 27.1190514,12.7376021 L27.1485639,13.1743873 L27.1485639,13.39278 L27.1485639,13.6200263 C27.1392579,15.4513384 26.7712926,17.263091 26.0654545,18.9529381 L25.6758894,19.8117523 C25.5401318,20.1068775 25.3601054,20.3636364 25.203689,20.6440053 L24.9587352,21.0601318 C24.8672464,21.1929381 24.7728063,21.3227932 24.66361,21.4526483 C24.4717786,21.7123584 24.2917523,21.9838735 24.0733597,22.2317786 C23.2284938,23.244114 22.2506438,24.137581 21.1663768,24.8879051 C20.049103,25.6331335 18.8319243,26.2163857 17.5510936,26.6202898 L16.571278,26.8770487 L16.3263241,26.939025 L16.0754678,26.9773913 L15.5737549,27.0570751 C15.241494,27.1195506 14.9051652,27.1580163 14.5673782,27.1721739 L13.5314888,27.2252964 C12.1844159,27.201121 10.8465611,26.9976638 9.55320155,26.6202898 C8.27260528,26.2171232 7.05545953,25.6348805 5.93791831,24.8908564 C4.8532166,24.1399816 3.87446061,23.2465937 3.02798419,22.2347299 C2.82139657,21.9838735 2.64137023,21.7123584 2.43773386,21.4526483 C2.34329381,21.3227932 2.2459025,21.1929381 2.14260869,21.0601318 L1.89765481,20.6440053 C1.79731225,20.3636364 1.62023716,20.0980237 1.47562582,19.8117523 L1.07720685,18.9499868 C0.372856575,17.2578287 0.00689356099,15.4440558 0,13.6111726 L0,13.380975 L0,13.1655336 L0.0295125165,12.7376021 C0.0560737813,12.4424769 0.0531225297,12.1709618 0.100342556,11.8846904 C0.613554651,7.90713271 2.86252324,4.36130573 6.24189723,2.20163373 C7.40595953,1.45121795 8.67928727,0.885736982 10.0165481,0.525322793 L10.8074835,0.324637681 C11.0583399,0.271515152 11.2973913,0.247905138 11.5157839,0.209538867 L12.126693,0.118050066 C12.3126218,0.0914888011 12.4867457,0.0973913046 12.6402108,0.0855862976 L13.5757576,0.0413175231 L13.5757576,0.0413175231 Z M13.5757576,0.0413175231 L12.6343083,0.0914888011 C12.4808432,0.0914888011 12.3096706,0.0914888011 12.1207905,0.12690382 L11.5098814,0.221343873 C11.2914888,0.259710145 11.0524375,0.283320158 10.801581,0.339393939 L10.0135968,0.545981555 C8.68068973,0.908674217 7.41644777,1.48795226 6.27140975,2.26065876 C4.78532659,3.25468804 3.51628617,4.53979225 2.54102767,6.03826087 C1.41349296,7.80995465 0.713320902,9.81953942 0.495810277,11.9083004 C0.457444005,12.1798155 0.469249012,12.4719894 0.451541502,12.7553096 L0.436785244,13.1861924 L0.436785244,13.4016337 L0.436785244,13.6023188 C0.500807272,15.3633516 0.908863047,17.0948315 1.63794466,18.6991305 L2.06587615,19.5077733 C2.19573123,19.773386 2.36100132,20.0242424 2.52922267,20.2839526 L2.77417655,20.6587615 C2.86271409,20.7827141 2.9601054,20.9007642 3.05454545,21.0217655 C3.24637681,21.2608169 3.42050066,21.5146245 3.62413702,21.7448221 C4.44413841,22.6805238 5.38383455,23.5041222 6.41897233,24.194361 C7.48309469,24.8694544 8.63105795,25.4022601 9.83357047,25.7791831 C11.0618063,26.1287076 12.3312853,26.3123304 13.6082214,26.3251647 L14.5378656,26.2779447 C14.8547944,26.2670187 15.1704686,26.2324919 15.4822661,26.1746509 L15.9515152,26.1038208 L16.1876153,26.0684058 L16.4178129,26.0093807 L17.3386034,25.7762319 C17.6337286,25.6876943 17.9288538,25.566693 18.2239789,25.4633992 C18.3715415,25.4073254 18.5191041,25.3601054 18.6666667,25.2981291 L19.0916469,25.0944928 L19.5195784,24.8938076 C19.6637924,24.8320199 19.8029293,24.7589977 19.9357049,24.675415 L20.7443479,24.194361 C21.7788209,23.5032552 22.7184094,22.6797511 23.5391831,21.7448221 C23.7428195,21.5146245 23.9198946,21.2608169 24.1087747,21.0217655 C24.2002635,20.9007642 24.2976548,20.7797629 24.3891436,20.6587615 L24.6311462,20.2721476 C24.7875625,20.0124375 24.967589,19.7645322 25.1062977,19.4959684 L25.5106193,18.6873254 C26.2411152,17.0803889 26.6492104,15.3457334 26.7117786,13.5816601 L26.7117786,13.3780237 L26.7117786,13.1655336 L26.7117786,12.7435046 C26.6940712,12.4483794 26.7117786,12.1798155 26.6675099,11.9053491 C26.4511071,9.81221844 25.749834,7.798332 24.6193413,6.02350461 C23.6430291,4.52490092 22.3729993,3.23981143 20.8860079,2.2459025 C19.7408911,1.47333633 18.4766731,0.894069264 17.1438208,0.531225297 L16.3558366,0.324637681 C16.1079315,0.2685639 15.8688801,0.244953887 15.6475362,0.206587615 L15.0513834,0.129855072 C14.8654545,0.103293807 14.6913307,0.106245059 14.5378656,0.0944400528 L13.5757576,0.0413175231 L13.5757576,0.0413175231 Z"
                                                          id="Shape" fill="#A9ABAE"></path>
                                                    <path d="M9.922108,22.2022661 C9.40859029,22.2465349 8.96,22.2022661 8.6412648,21.7920422 C8.46236174,21.5433001 8.29685645,21.2851906 8.14545455,21.0188142 C7.95016728,20.6723566 7.73228745,20.3391286 7.49322793,20.0212911 C7.05099699,19.5183158 6.42387765,19.2159356 5.75494072,19.1831357 C4.97900411,19.097822 4.19550459,19.2512273 3.5090382,19.6228722 C3.36254902,19.7126617 3.22161615,19.8112162 3.08700922,19.9179974 C3.26008198,19.9649068 3.4305154,20.0210611 3.59757576,20.0862187 C3.98273162,20.298154 4.30926136,20.6023743 4.54787879,20.9715942 C4.84300396,21.3345981 5.09976284,21.7064559 5.40669301,22.0488011 C5.9591624,22.6471109 6.76896347,22.9379783 7.57586298,22.8279315 C7.81504228,22.7997003 8.05248559,22.7583201 8.28711462,22.7039789 C8.3217599,22.6933168 8.35534932,22.6794858 8.38745718,22.6626614 C8.13955204,22.6124901 7.90640316,22.5711726 7.67620553,22.5210013 C6.97059897,22.3708061 6.33570564,21.9884154 5.87299078,21.4349407 C5.66345191,21.1929381 5.4509618,20.9538867 5.23847167,20.7118841 C4.9666845,20.3863527 4.62596797,20.1252711 4.24094862,19.9475099 L4.25570487,19.9120949 C4.36785244,19.9504612 4.48295125,19.9770224 4.59214756,20.0242424 C4.90404923,20.1656883 5.18565332,20.3661183 5.42144928,20.6144928 C5.59262187,20.7886166 5.77264822,20.9597892 5.93496706,21.1427668 C6.4789107,21.7332613 7.2073489,22.1214148 8.00084322,22.2435837 C8.62354368,22.350396 9.25755091,22.3752007 9.88669301,22.317365 C9.96932805,22.317365 10.0490119,22.317365 10.0549144,22.1934124"
                                                          id="Shape" fill="#C0D24C"></path>
                                                    <path d="M21.0540821,10.0199302 C21.5213038,14.8892119 17.5948096,21.6742654 9.94921038,21.7235305 C7.86299968,21.7370388 5.91107543,21.148244 4.24242424,20.1486417 C4.28771614,20.1494358 7.12680656,20.3468935 9.75930174,18.4124505 C8.03939928,18.3282227 6.59840049,17.185993 6.0727751,15.6226255 C6.40213481,15.7080445 7.25751699,15.8617992 7.97106405,15.6615605 C6.19116961,15.2789629 4.83956261,13.7434069 4.73785454,11.8749148 C5.21898219,12.0854829 5.74897754,12.2050691 6.30519435,12.2142072 C5.34730918,11.4633145 3.9492181,9.35644434 5.28374159,6.92657038 C7.14706824,9.33498994 10.0409858,10.9055079 13.3043904,10.9758304 C13.2916771,10.9404706 13.2205604,10.3179051 13.2205604,10.1673294 C13.2205604,8.23487261 14.7167843,6.24242424 17.1454655,6.24242424 C18.2948488,6.24242424 19.3282196,6.73626543 20.0461365,7.52450441 C21.1466517,7.31870429 22.2737848,6.68302761 22.5081906,6.53960307 C22.201874,7.43948279 21.5777194,8.19117036 20.7708067,8.66355712 C21.5499102,8.61111194 22.2785543,8.41007904 22.9575362,8.11528421 C22.5673903,8.95239086 21.891188,9.62978362 21.0540821,10.0199302 Z"
                                                          id="Fill-2" fill="#7B7F2A"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-3 Header-productInfo row">
            <div class="Header-productInfoContent row middle">
                <h3>Información de pedido</h3>
                <ul>
                    <li>Unidad de lotes: 45 g / envases</li>
                    <li>Formato: envases 45 g</li>
                    <li> Distribuidor: Alejandra</li>
                    <li>Calificación: <b>★★★★★</b></li>
                </ul>
                <div class="col-12 row end" style="margin: 10px 0">
                    <p>Total ${{number_format($product->product->price, 0, " ", ".")}}</p>
                    <span class="col-12" style="font-size: 12px">IVA incluido</span>
                </div>
                <div class="row col-12 center">
                    <a href="#" data-url="{{url('/')}}" id="buy" class="Button">AÑADIR AL CARRITO</a>
                </div>
            </div>
        </div>
    </section>

    <section class="ProductInfo-table col-12">
        <table>
            <thead>
            <tr>
                <th></th>
                <th>Distribuidor</th>
                <th>Valor unidad</th>
                <th>Valor de envío</th>
                <th>Valor + envío</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="center">
                        <input type="checkbox">
                    </td>
                    <td>
                        <p>Alejandra</p>
                        <b class="ranking">★★★★★</b>
                    </td>
                    <td>
                        $135.000.000
                    </td>
                    <td>
                        $1.000.000
                    </td>
                    <td>
                        $136.000.000
                    </td>
                </tr>
                <tr>
                    <td class="center">
                        <input type="checkbox">
                    </td>
                    <td>
                        <p>Alejandra</p>
                        <b class="ranking">★★★★★</b>
                    </td>
                    <td>
                        $135.000.000
                    </td>
                    <td>
                        $1.000.000
                    </td>
                    <td>
                        $136.000.000
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="ProductInfo">
        <h2>Descripción</h2>
        {!!$product->description!!}
        <h2>Características </h2>
        <article class="row bottom">
            <?php $j = 0 ?>
            @for($i = 0; $i < 2; $i++)
                <ul class="smaller-12 medium-3 col-2 self-start">
                    @while($j < count($featuresTranslate))
                        <li>{{$featuresTranslate[$j]['name']}}: <b>{{ $featuresTranslate[$j]['value'] }}</b></li>
                        <?php $j++ ?>
                        @if($j == count($featuresTranslate) /2)
                            @break
                        @endif
                    @endwhile
                </ul>
            @endfor
            <div class="smaller-12 medium-6 col-8 AlignRight DownloadPDF">
                @foreach($product->product->files as $file)
                    @if($file->extension == 'pdf')
                        <a href="/uploads/products/{{$file->name}}" style="color : black" download>
                            Descarga Ficha Técnica
                            <svg width="32px" height="38px" viewBox="0 0 32 38" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Product-detail" transform="translate(-1243.000000, -1928.000000)"
                                       fill="#C5D257">
                                        <g id="Page-1" transform="translate(1243.000000, 1928.000000)">
                                            <path d="M30.3275527,37.0132591 L1.66925731,37.0132591 C0.771177354,37.0132591 0.0423008675,36.2784171 0.0423008675,35.3738293 L0.0423008675,25.9933408 C0.0423008675,25.088753 0.771177354,24.3533687 1.66925731,24.3533687 C2.56733727,24.3533687 3.29621375,25.088753 3.29621375,25.9933408 L3.29621375,33.7338572 L28.7005963,33.7338572 L28.7005963,25.9933408 C28.7005963,25.088753 29.4294728,24.3533687 30.3275527,24.3533687 C31.2256327,24.3533687 31.9545092,25.088753 31.9545092,25.9933408 L31.9545092,35.3738293 C31.9545092,36.2784171 31.2256327,37.0132591 30.3275527,37.0132591 L30.3275527,37.0132591 Z"
                                                  id="Fill-1"></path>
                                            <path d="M24.0567203,17.4751391 L17.1464939,24.4363434 C16.9642748,24.6201895 16.7354163,24.7644463 16.4794418,24.8430826 C16.4262946,24.8598944 16.3731473,24.8723678 16.3205424,24.8832141 C16.2185865,24.9043646 16.1084957,24.9168379 15.9940665,24.9168379 C15.7207378,24.9168379 15.4647633,24.8512173 15.2418703,24.7286533 C15.1936039,24.7031643 15.1491338,24.675506 15.1046636,24.6456785 C15.0601935,24.6185626 15.0157233,24.5843965 14.9707109,24.5486034 C14.9262407,24.5144374 14.8861091,24.4786443 14.8481468,24.4379704 L7.93792048,17.4773084 C7.30232283,16.8373722 7.30232283,15.7972047 7.93792048,15.1572685 C8.57514509,14.5178747 9.60500852,14.5178747 10.2406062,15.1572685 L14.3692793,19.322277 L14.3692793,2.04616889 C14.3692793,1.13995415 15.1024943,0.406739111 15.9962357,0.406739111 C16.8943157,0.406739111 17.6231922,1.13995415 17.6231922,2.04616889 L17.6231922,19.3201078 L21.7562039,15.1550993 C22.3918015,14.5157054 23.4194957,14.5157054 24.0588895,15.1550993 C24.6923179,15.7950355 24.6923179,16.8373722 24.0567203,17.4751391 L24.0567203,17.4751391 Z"
                                                  id="Fill-2"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        @break
                    @endif
                @endforeach
            </div>
        </article>
    </section>
    <aside class="Comments">
        <h2>Comentarios y preguntas</h2>

        <?php isset(Auth::user()->role_id) ? $login = true : $login = false ?>
        <form action="" class="row">
            @if($login)
                <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                <figure>
                    @if(Auth::user()->photo)
                        <img src="{{url('uploads/users/' . Auth::user()->photo)}}" alt="">
                    @else
                        <img src="{{url('images/user.png')}}" alt="">
                    @endif
                </figure>
                <div class="commentBox">
                    <textarea name="comment" id="commentBox"></textarea>
                    <button class="commentButton" id="commentButton"
                            onClick="addComment($('#commentBox').val(), '{{$product->product->id}}', '{{Auth::user()->id}}','{{route("addQuestion")}}', '{{url("/")}}'); return false;">
                        Enviar
                    </button>
                </div>
            @else
                <b>Para comentar debes estar registrado</b>
            @endif
        </form>
        <ul>
            <div id="reload">
                @foreach($questions as $question)
                    <li class="row">
                        <figure>
                            @if($question->texts->first()->user->photo)
                                <img src="{{url('uploads/users/' . $question->texts->first()->user->photo)}}">
                            @else
                                <img src="{{url('images/user.png')}}">
                            @endif
                        </figure>
                        <div class="Comments-user">
                            <h5>{{$question->texts->first()->user->name}} {{$question->texts->first()->user->second_name}} {{$question->texts->first()->user->last_name}} {{$question->texts->first()->user->second_last_name}}
                                <time> • {{$question->texts->first()->date}}</time>
                            </h5>
                            <p>
                                {{$question->texts->first()->description}}
                            </p>
                        </div>
                        @for($i = 1; $i < count($question->texts); $i++)
                            <ul class="smaller-12" style="padding-left:3.8rem; margin-bottom: 5px">
                                <li class="row" style="margin-bottom: 0">
                                    <figure style="">
                                        @if($question->texts[$i]->user->photo)
                                            <img src="{{url('images/' . $question->texts[$i]->user->photo)}}">
                                        @else
                                            <img src="{{url('images/user.png')}}">
                                        @endif
                                    </figure>
                                    <div class="Comments-user">
                                        <h5>{{$question->texts[$i]->user->name}} {{$question->texts[$i]->user->second_name}} {{$question->texts[$i]->user->last_name}} {{$question->texts[$i]->user->second_last_name}}
                                            <time> • {{$question->texts[$i]->date}}</time>
                                        </h5>
                                        <p>
                                            {{$question->texts[$i]->description}}
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        @endfor
                    </li>
                @endforeach
            </div>
        </ul>
    </aside>

    @endsection
    @section('scripts')
            <!-- ******* Slider ******* -->
    <script src="{{asset('js/owl.carousel.js')}}"></script>
    <script src="{{asset('js/front/slide.js')}}"></script>

    <!-- ******* Maps ******* -->
    <script src="{{asset('js/maps.js')}}"></script>
    <script>getPosition('{!!$product->product->location!!}')</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap"
            async defer></script>

    <!-- ******* Comments ******* -->
    <script src="{{asset('js/comments.js')}}"></script>

    @if($offer)
    <?php
    $fecha = explode('-', $product->product->offers->offer_off);
    $day = explode(' ', $fecha[2]);
    $time = explode(':', $day[1]);

    $year = $fecha[0];
    $month = $fecha[1];
    $day = $day[0];
    $hour = $time[0];
    $minute = $time[1];
    ?>

            <!-- ******* Timer ******* -->
    <script src="{{asset('js/front/product.js')}}"></script>
    <script>
        countDown({
            'year': {!! $year !!},
            'month': {!! $month !!},
            'day': {!! $day !!},
            'hour': {!! $hour !!},
            'minute': {!! $minute !!}
        });
    </script>
    @endif
    <script>
        $('#buy').on('click', function (e) {
            e.preventDefault();
            window.location.href = $(this).data('url') + '/compras/{{ $product->product->id }}/' + $('#quantity').val()
        });
    </script>
@endsection

@section('styles')
    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
    <!--<link href="{{asset('css/owl.transitions.css')}}" rel="stylesheet">-->
@endsection
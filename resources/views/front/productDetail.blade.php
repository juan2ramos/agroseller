@extends('layoutFront')
@section('openGraph')
    <meta property="og:url"           content="{{route('productDetail', ['slug' => $product->slug, 'id' => $product->id])}}" />
    <meta property="og:type"          content="{{route('home')}}" />
    <meta property="og:title"         content="{{$product->name}}" />
    <meta property="og:description"   content="{{$product->description}}"/>
    @foreach($product->productFiles as $file)
        @if($file->extension != 'pdf')
            <meta property="og:image"         content="{{url('uploads/products/' . $file->name)}}" />
            @break
        @endif
    @endforeach
@endsection
@section('content')
    <svg style="display: none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs></defs>
        <g id="StarsSvg" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Product-detail"  transform="translate(-1186.000000, -345.000000)" fill="#C5D257">
                <g id="price"  transform="translate(744.000000, 342.000000)">
                    <g id="leaves" transform="translate(436.000000, 2.000000)" >
                        <g id="Page-1" transform="translate(14.500000, 14.000000) rotate(-35.000000) translate(-14.500000, -14.000000) translate(4.500000, 4.000000)">
                            <path d="M13.7751613,5.51032258 L18.9741935,0.312580645 C18.0606452,0.452258065 17.0967742,0.466129032 16.2248387,0.574516129 C15.4812903,0.66516129 14.7303226,0.77 14.0109677,0.982903226 C13.9451613,1.05483871 13.9867742,1.44903226 13.9819355,1.54096774 C13.9125806,2.86419355 13.8432258,4.18709677 13.7751613,5.51032258 L13.7751613,5.51032258 Z" id="Fill-1"></path>
                            <path d="M12.8616129,1.22612903 C12.36,1.29903226 9.42548387,1.78677419 9.41032258,2.36516129 C9.38870968,3.24483871 9.36612903,4.12419355 9.34354839,5.00516129 C9.31064516,6.26645161 9.27677419,7.52774194 9.24032258,8.78903226 C9.23516129,8.95548387 9.12806452,9.66870968 9.10903226,10.1790323 L12.6474194,6.64064516 C12.7193548,4.83483871 12.7896774,3.03064516 12.8616129,1.22612903 L12.8616129,1.22612903 Z" id="Fill-2"></path>
                            <path d="M7.95870968,10.3290323 C7.99387097,7.81612903 8.04193548,5.30354839 8.08967742,2.79225806 C7.21645161,3.24967742 5.11967742,3.97064516 5.07064516,5.10580645 C5.02,6.23483871 4.98612903,7.36258065 4.9483871,8.4916129 C4.8816129,10.503871 4.81870968,12.5151613 4.75677419,14.5274194 L7.96483871,11.3180645 C7.98516129,11.0419355 7.95354839,10.7296774 7.95870968,10.3290323 L7.95870968,10.3290323 Z" id="Fill-3"></path>
                            <path d="M3.69967742,13.5054839 C3.77032258,10.9096774 3.84064516,8.31387097 3.91129032,5.71709677 C0.560645161,8.95806452 -0.976451613,13.9403226 0.971612903,18.3151613 L3.74870968,15.5380645 C3.81290323,14.8967742 3.69193548,13.7877419 3.69967742,13.5054839 L3.69967742,13.5054839 Z" id="Fill-4"></path>
                            <path d="M14.5325806,6.26903226 C15.8554839,6.19967742 17.1787097,6.1316129 18.5029032,6.06225806 C18.5951613,6.0583871 18.9880645,6.09870968 19.0612903,6.03322581 C19.2741935,5.31387097 19.3787097,4.56290323 19.4693548,3.81935484 C19.5767742,2.94741935 19.5903226,1.98322581 19.7316129,1.06967742 L14.5325806,6.26903226 Z" id="Fill-5"></path>
                            <path d="M9.86645161,10.9348387 C10.3780645,10.9148387 11.0912903,10.8077419 11.2564516,10.8025806 C12.5177419,10.766129 13.7777419,10.7322581 15.0390323,10.6993548 C15.9187097,10.6767742 16.7980645,10.653871 17.6790323,10.633871 C18.2574194,10.62 18.7448387,7.68387097 18.8180645,7.18258065 C17.0135484,7.25290323 15.2090323,7.32483871 13.4035484,7.39677419 L9.86645161,10.9348387 Z" id="Fill-6"></path>
                            <path d="M8.72483871,12.0777419 L5.51419355,15.286129 C7.52645161,15.2241935 9.53741935,15.1612903 11.55,15.0945161 C12.6790323,15.0567742 13.8080645,15.0225806 14.9358065,14.9735484 C16.0722581,14.9245161 16.7932258,12.8264516 17.2506452,11.9545161 C14.7380645,12.0035484 12.2264516,12.05 9.71387097,12.0854839 C9.31451613,12.0903226 9.00064516,12.0590323 8.72483871,12.0777419 L8.72483871,12.0777419 Z" id="Fill-7"></path>
                            <path d="M4.24129032,16.4906452 L1.69483871,19.0374194 C5.70677419,20.8241935 10.2758065,19.4141935 13.2470968,16.3406452 C10.8670968,16.406129 8.48548387,16.4706452 6.10516129,16.5348387 C5.84677419,16.5422581 4.83,16.4325806 4.24129032,16.4906452 L4.24129032,16.4906452 Z" id="Fill-8"></path>
                        </g>
                    </g>
                </g>
            </g>
        </g>
    </svg>
    <section class="ProductDetail row">
        <article class="ProductDetail-slider col-6 ">
            <div class="owl-carousel" id="sync1">
                @foreach($product->productFiles as $file)
                    @if($file->extension != 'pdf')
                        <figure class="item"><img src="{{url('uploads/products/'. $file->name)}}" alt=""></figure>
                    @endif
                @endforeach
            </div>
        </article>
        <article class="col-6">
            <h1 style="text-transform:uppercase">{{$product->name}}</h1>
            <div class="ProductDetail-price row middle">
                <div class="col-6">
                    <svg width="27px" height="36px" viewBox="0 0 27 36" version="1.1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink">

                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Product-detail" transform="translate(-709.000000, -336.000000)" fill="#253A1B">
                                <g id="Page-1" transform="translate(709.000000, 336.000000)">
                                    <path d="M26.2265984,13.7974121 L25.8190109,12.1822161 C25.7623345,11.9629128 25.5904965,11.7949993 25.374041,11.738829 C25.5507025,11.3886607 25.6634523,11.1621867 25.6990258,11.0946627 C25.7647463,10.9637978 25.7816286,10.8144086 25.7460551,10.6721901 L23.8262935,3.06469451 C23.7840877,2.89439082 23.6689261,2.74978208 23.5109558,2.67030703 L18.7742577,0.233470408 C18.6283461,0.158775809 18.4565082,0.145032002 18.3009496,0.19403166 L10.8654912,2.56991748 C10.7099326,2.61891714 10.5833152,2.72647736 10.5079476,2.87108611 L0.698110734,21.544736 C0.533508062,21.77121 0.0222147796,22.5695459 0.217567402,23.5919656 C0.347199543,24.2618268 0.745140069,24.8731274 1.40234488,25.4175016 C1.32215383,25.5131107 1.27030098,25.6320245 1.26125687,25.7628894 C1.19734521,26.5958836 1.5271535,27.8119117 3.45595917,28.8600263 L4.89035389,29.6398379 C4.80775108,30.1489563 4.70645713,31.3858989 5.41310303,32.4340135 C5.97624917,33.2670077 6.89452708,33.7809065 8.1474368,33.9583809 L19.3494626,35.5592356 C19.3771979,35.564016 19.4079478,35.5664063 19.4386978,35.5664063 C19.4905506,35.5664063 19.5399917,35.5592356 19.5894328,35.547882 C19.6720356,35.5269675 21.624356,35.0106784 22.1332375,32.2774536 C22.3852665,30.9281704 23.1292947,24.3879113 23.7159555,19.0941556 C25.112365,16.341809 26.1723338,14.2431895 26.1819809,14.222275 C26.2452896,14.0896174 26.261569,13.9402282 26.2265984,13.7974121 L26.2265984,13.7974121 Z M1.69899145,22.2612066 C1.72732964,22.2289385 1.75084431,22.1912925 1.76953545,22.1542439 L11.4877255,3.65986108 L18.4354053,1.44053514 L22.6957807,3.63237347 L24.4907336,10.7516651 C23.5181911,12.6793834 15.9410417,27.667303 14.7821907,29.5812774 C14.5024264,30.0461766 14.0502213,30.5989166 13.498531,30.5989166 C13.2513255,30.5989166 13.0656199,30.4895637 13.0372818,30.4710394 C13.0137671,30.4519176 13.0017083,30.4453445 12.9709583,30.4286129 L3.01822459,25.0207239 C2.09934374,24.5211664 1.55307993,23.9534875 1.43550659,23.3750525 C1.31069797,22.7583739 1.68753559,22.2779382 1.69899145,22.2612066 L1.69899145,22.2612066 Z M20.9128865,32.0509796 C20.6090047,33.6829072 19.6834915,34.1938183 19.375389,34.322293 L8.32228945,32.7417553 C7.43657031,32.6162683 6.80288017,32.2822341 6.4447337,31.7545914 C5.85144055,30.8839512 6.13180774,29.7121423 6.1342195,29.7025814 C6.14085184,29.677484 6.14567536,29.6517891 6.14808712,29.6260941 L6.17883707,29.3787056 C6.19511646,29.24067 6.16436651,29.1032319 6.09623427,28.988501 L12.6507971,32.5505371 C12.7900763,32.6413657 13.216355,32.8845713 13.7981923,32.8845713 C14.4222354,32.8845713 15.333278,32.6043172 16.1388061,31.2735582 C16.8641431,30.076652 19.9355205,24.0891329 22.4630458,19.1240334 C21.6430471,26.5492742 21.1064303,31.0172064 20.9128865,32.0509796 L20.9128865,32.0509796 Z"
                                          id="Fill-1"></path>
                                    <path d="M20.1266525,7.37845703 C20.1266525,10.5484958 15.3290574,10.5484958 15.3290574,7.37845703 C15.3290574,4.20841822 20.1266525,4.20841822 20.1266525,7.37845703"
                                          id="Fill-2"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    @if($offer)
                    <b>${{number_format($offer, 0, " ", ".")}}
                        <del>${{number_format($product->price, 0, " ", ".")}}</del>
                    </b>
                    @else
                        <b>${{number_format($product->price, 0, " ", ".")}}</b>
                    @endif
                </div>
                <div class="col-6 AlignRight">
                    @for($i = 0; $i < 5; $i++)
                        <svg width="16px" height="26px" viewBox="0 0 16 26">
                            <use xlink:href="#StarsSvg"/>
                        </svg>
                    @endfor
                </div>
            </div>

            @if($offer)
            <time class="ProductDetail-offer">
                <h3>¡ Oferta por tiempo limitado !</h3>
                <svg width="28px" height="28px" viewBox="0 0 28 28" version="1.1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Product-detail" transform="translate(-710.000000, -437.000000)" fill="#D25757">
                            <path d="M723.735318,438.12 C724.816118,438.12 725.892065,438.26 726.934785,438.53552 C728.009612,438.82 729.048225,439.24896 730.022252,439.810453 C731.495052,440.660533 732.758038,441.77456 733.774625,443.119307 C734.756118,444.418507 735.469185,445.879733 735.892172,447.4608 C736.314785,449.041493 736.428652,450.663253 736.227425,452.280533 C736.020225,453.953067 735.483745,455.548693 734.632172,457.022987 C734.060225,458.01456 733.360225,458.918773 732.552332,459.7136 C731.769452,460.483787 730.886892,461.148693 729.928918,461.689653 C728.034625,462.76 725.883478,463.325973 723.707692,463.325973 C722.626892,463.325973 721.549452,463.185973 720.508225,462.910453 C719.433398,462.625973 718.393665,462.197013 717.420758,461.6344 C715.947958,460.783947 714.684972,459.66992 713.668385,458.325173 C712.686892,457.025973 711.973825,455.564747 711.549718,453.98368 C711.128225,452.402987 711.014358,450.781227 711.215585,449.16544 C711.422785,447.492907 711.959265,445.895787 712.810838,444.422987 C713.382785,443.432907 714.082785,442.5272 714.890678,441.732373 C715.673558,440.962187 716.556118,440.29728 717.514092,439.75632 C719.408385,438.685973 721.559532,438.12 723.735318,438.12 L723.735318,438.12 Z M723.735318,437 C718.994358,437.001493 714.381452,439.46176 711.839798,443.862987 C708.052332,450.42544 710.299798,458.816853 716.862252,462.60544 C719.023478,463.852373 721.381452,464.445973 723.709185,464.445973 C728.451638,464.445973 733.063052,461.985707 735.603212,457.582987 C739.392172,451.020533 737.143212,442.62912 730.580758,438.840533 C728.421025,437.5936 726.063052,437 723.735318,437 L723.735318,437 Z M711.107692,450.302987 C711.358572,450.302987 712.507692,450.491147 712.507692,450.722987 C712.507692,450.954827 711.880492,451.142987 711.107692,451.142987 L711.107692,450.302987 Z M724.155318,463.337547 C724.155318,462.563253 723.967158,461.936053 723.735318,461.936053 C723.503478,461.936053 723.315318,462.563253 723.315318,463.337547 L724.155318,463.337547 Z M713.000492,457.42544 C713.669878,457.03904 714.118998,456.562293 714.004012,456.361067 C713.887158,456.159467 712.797772,456.572373 712.580492,456.697813 L713.000492,457.42544 Z M717.801558,461.906933 C718.187958,461.236053 718.338038,460.598773 718.138305,460.482293 C717.937078,460.36544 717.198998,461.26816 717.075052,461.48544 L717.801558,461.906933 Z M736.336812,450.330613 C736.085932,450.330613 734.936812,450.518773 734.936812,450.750613 C734.936812,450.982453 735.564012,451.170613 736.336812,451.170613 L736.336812,450.330613 Z M734.864012,456.641067 C734.646732,456.515627 733.557345,456.10272 733.441985,456.303947 C733.326998,456.505173 733.774625,456.982293 734.444012,457.368693 L734.864012,456.641067 Z M730.398572,461.459307 C730.273132,461.242027 729.535052,460.339307 729.335318,460.455787 C729.134092,460.57264 729.284172,461.20992 729.672438,461.8808 L730.398572,461.459307 Z M723.315318,438.108427 C723.315318,438.88272 723.503478,439.50992 723.735318,439.50992 C723.967158,439.50992 724.155318,438.88272 724.155318,438.108427 L723.315318,438.108427 Z M712.580492,444.77728 C712.797772,444.90272 713.887158,445.315627 714.004012,445.1144 C714.118998,444.913173 713.671372,444.436053 713.000492,444.049653 L712.580492,444.77728 Z M717.045932,439.986667 C717.171372,440.203947 717.909452,441.106667 718.109185,440.990187 C718.310412,440.873333 718.160332,440.236053 717.772065,439.565173 L717.045932,439.986667 Z M734.444012,444.07728 C733.774625,444.46368 733.325505,444.9408 733.441985,445.142027 C733.557345,445.343253 734.648225,444.930347 734.864012,444.804907 L734.444012,444.07728 Z M729.700065,439.594293 C729.313665,440.265173 729.163212,440.902453 729.362945,441.019307 C729.564172,441.135787 730.302252,440.233067 730.426198,440.015787 L729.700065,439.594293 Z M723.162252,450.23728 L723.162252,442.407733 C723.162252,442.216587 723.367958,441.482987 723.620332,441.482987 L723.824172,441.482987 C724.076545,441.482987 724.282252,442.216587 724.282252,442.407733 L724.282252,449.591413 L723.162252,450.23728 Z M722.959532,450.355627 C722.853132,450.416853 722.895318,450.687893 723.052865,450.962293 L723.181292,451.182187 C723.338838,451.456587 723.553132,451.628693 723.661025,451.567467 L728.409452,448.825707 C728.515852,448.76448 728.797345,448.3064 728.638305,448.032373 L728.509878,447.812107 C728.352332,447.53808 727.815852,447.55264 727.707958,447.613867 L722.959532,450.355627 Z"
                                      id="Page-1"></path>
                        </g>
                    </g>
                </svg>

                <span class="timer">
                    <span id="dayNumber"></span>
                    <span id="hourNumber"></span>
                    <span id="minNumber"> </span>
                    <span id="secNumber"></span>
                </span>
            </time>
            @endif

            <div class="ProductDetail-quantity">
                <h4>Cantidad</h4>
                <div class="row bottom">
                    <input type="number" id="quantity" class="col-4" value="1" maxlength="3">
                    <span class="col-8 AlignRight"><a href="#" data-url="{{url('/')}}" id="buy" class="Button">COMPRAR</a></span>
                </div>
            </div>
            <nav class="ProductDetail-network row between">
                <div class="social-share">
                    <svg width="138px" height="32px" viewBox="0 0 138 32" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Product-detail" transform="translate(-711.000000, -676.000000)">
                                <g id="facebook" transform="translate(711.000000, 676.000000)">
                                    <rect id="Rectangle-59" fill="#3B5998" x="0" y="0" width="138" height="32"></rect>
                                    <path d="M19.9853154,9.72353122 C19.9666707,9.61017179 19.888629,9.51543949 19.7815547,9.4760564 C19.127123,9.23683074 18.2614727,9.00106441 17.3332292,9 C16.6050175,9 15.8331237,9.14848489 15.1160989,9.56653107 C14.7551893,9.77648551 14.4699242,10.0415231 14.2536448,10.3398234 C13.9268285,10.7879391 13.7542312,11.304443 13.6564793,11.8283977 C13.5773721,12.2522981 13.5480732,12.6836494 13.5315593,13.10276 C13.3443124,13.1067515 13.1330938,13.1088803 12.9394544,13.1088803 C12.7708524,13.1088803 12.6158344,13.1078159 12.5036994,13.1067515 C12.4474987,13.1056871 12.4016858,13.1056871 12.3705224,13.1056871 C12.3390926,13.1048888 12.3225787,13.1048888 12.3215133,13.1048888 C12.2373454,13.1038244 12.1539766,13.1370871 12.0935143,13.1961618 C12.0333183,13.2555025 11.9989586,13.3385263 12.0000241,13.4239451 L12.0125427,15.5320048 C12.0125427,15.7055032 12.1550421,15.8603746 12.3297703,15.8603746 L12.5513767,15.8603746 C12.8624782,15.8603746 13.4420643,15.8468034 13.8874081,15.856117 C13.9529312,17.3042438 13.9686461,19.473507 13.9686461,21.1574002 C13.9686461,21.8673602 13.9654499,22.4857811 13.963319,22.9307036 C13.9611882,23.1531649 13.9601228,23.3298566 13.9590574,23.4525296 C13.9579919,23.5752026 13.9571929,23.6406636 13.9571929,23.6406636 C13.9561275,23.725018 13.9894217,23.8069774 14.0496177,23.8673825 C14.11008,23.9275216 14.1910516,23.9607843 14.2765513,23.959986 L17.1001695,23.9453504 C17.1856691,23.9453504 17.2647762,23.9110232 17.3249722,23.8506181 C17.3843691,23.790479 17.4176634,23.7103824 17.416598,23.6252297 C17.416598,23.6252297 17.4019485,21.890245 17.3843691,20.0192821 C17.3697197,18.4101636 17.3532057,16.7023212 17.343617,15.9072085 C17.5175461,15.9040153 17.7202415,15.9029509 17.9181425,15.9029509 C18.1490713,15.9029509 18.3738741,15.9040153 18.5403453,15.9061441 C18.6234477,15.9072085 18.692167,15.9072085 18.7401107,15.9082729 C18.7877881,15.9093373 18.8149562,15.9093373 18.8149562,15.9093373 C18.9001895,15.9104018 18.9814274,15.8768729 19.0416234,15.8177983 C19.1020858,15.7584575 19.1364454,15.6772964 19.1364454,15.5921438 L19.1396417,13.6400198 C19.1396417,13.5548672 19.1063474,13.4468298 19.0458851,13.3864247 C18.9854227,13.3270839 18.9055165,13.2658805 18.8200169,13.2658805 L18.7150735,13.2658805 C18.6474196,13.2658805 18.5517985,13.2948856 18.4362009,13.2948856 C18.0824828,13.2948856 17.5465787,13.3073924 17.1220105,13.3002076 C17.1294684,13.0838668 17.1491786,12.8989259 17.1814074,12.7358054 C17.2125708,12.5766764 17.2541221,12.4478831 17.3041966,12.3417084 C17.3417525,12.2626761 17.3833037,12.1993438 17.4280512,12.147454 C17.4957051,12.0684217 17.5694851,12.0154674 17.6643071,11.9758182 C17.7588628,11.9364351 17.8773903,11.9135503 18.0294784,11.9135503 C18.2998277,11.9124859 18.6713914,11.9925826 19.13538,12.1724675 C19.1385762,12.173532 19.1425716,12.1743303 19.1457678,12.1753947 C19.1500295,12.1764591 19.1529594,12.1785879 19.1561556,12.1796523 C19.1633472,12.1817811 19.1697397,12.1817811 19.1769312,12.1839099 C19.187319,12.1857726 19.1987722,12.1889659 19.20916,12.1900303 C19.2195478,12.1910947 19.2299357,12.1921591 19.2395244,12.1921591 L19.2706878,12.1921591 C19.2810756,12.1910947 19.2914634,12.1900303 19.3007858,12.1879015 C19.3111736,12.1857726 19.3215614,12.1849743 19.3308838,12.1817811 C19.3402062,12.1796523 19.3497949,12.1753947 19.3591173,12.1724675 C19.3684397,12.1692743 19.3788275,12.1650167 19.3870845,12.1610252 C19.3964069,12.1567675 19.4049302,12.1514455 19.4131872,12.1463896 C19.4214441,12.1410675 19.4307665,12.1349472 19.4392899,12.1288268 C19.4475468,12.1224404 19.4547384,12.11632 19.4621963,12.1099336 C19.4704533,12.1027488 19.4776448,12.0955641 19.4848364,12.0881132 C19.4922943,12.0809285 19.497355,12.0726793 19.5037475,12.064164 C19.5098737,12.0559149 19.5162661,12.0476657 19.5213269,12.0383522 C19.5266539,12.0298369 19.5306493,12.0194589 19.5359763,12.0101454 C19.5391726,12.004025 19.5431679,11.9976386 19.5452987,11.9915182 C19.5474296,11.988325 19.5474296,11.9843335 19.548495,11.9800758 C19.5495604,11.9768826 19.5514249,11.9739555 19.5524903,11.9696979 C19.6172143,11.758679 19.7264194,11.4042312 19.8209751,11.0311562 C19.8678534,10.8438205 19.9115354,10.6516949 19.9437642,10.4656896 C19.9759931,10.2794182 19.9978341,10.1027265 19.9978341,9.9374772 C20.0010303,9.86483136 19.9967687,9.79404824 19.9853154,9.72353122 Z"
                                          id="Page-1" fill="#FFFFFF"></path>
                                    <text id="Comparte-en-facebook" font-family="Roboto" font-size="10"
                                          font-weight="420" fill="#FFFFFF">
                                        <tspan x="26" y="20">Comparte en facebook</tspan>
                                    </text>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <div class="fb-share-button" data-href="{{route('productDetail', ['slug' => $product->slug, 'id' => $product->id])}}" data-layout="button"></div>
                </div>
                <div class="social-share">
                    <svg width="138px" height="32px" viewBox="0 0 138 32" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>twitter</title>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Product-detail"
                               transform="translate(-853.000000, -676.000000)">
                                <g id="twitter"
                                   transform="translate(853.000000, 676.000000)">
                                    <rect id="Rectangle-59-Copy" fill="#00ACED" x="0" y="0"
                                          width="138" height="32"></rect>
                                    <path d="M25.9402,13.3652676 C25.87885,13.2875999 25.7819076,13.2492339 25.6840285,13.2630363 C25.626425,13.2712241 25.5531328,13.2859623 25.4580637,13.3058471 C25.3702535,13.325264 25.2623055,13.3507634 25.1426495,13.3800058 C25.1883108,13.2749672 25.2276498,13.1652498 25.2623055,13.0510876 C25.3189723,12.8637025 25.3658044,12.6634508 25.4142756,12.4515021 C25.4388625,12.3455278 25.3985869,12.2348747 25.3117134,12.1691378 C25.2248398,12.103401 25.106823,12.0952131 25.0108172,12.1480833 C24.5799619,12.3857653 24.2579913,12.536422 23.9800428,12.6342084 C23.7449457,12.7174907 23.5391187,12.7640445 23.3131538,12.7960942 C23.04785,12.5455456 22.7497637,12.3537157 22.430603,12.222242 C22.0699959,12.0732229 21.6831628,12 21.2888366,12 C20.8170033,12 20.3329936,12.103401 19.8602236,12.302483 C19.6305122,12.3995677 19.4164895,12.5429723 19.2235413,12.7184265 C18.9336507,12.9825435 18.6894213,13.317778 18.5147376,13.6925482 C18.3400539,14.0670844 18.2349158,14.4802205 18.2349158,14.899673 C18.2349158,14.9434196 18.236555,14.9883359 18.2384282,15.0320825 C18.2311693,15.0304449 18.2239103,15.0285734 18.2173538,15.0267019 C17.7153138,14.8933567 16.9423501,14.6301754 16.1750062,14.2883906 C15.8602946,14.1484951 15.4249903,13.8698739 15.0004573,13.5107776 C14.5752219,13.1514474 14.1563089,12.7111743 13.8535394,12.2531219 C13.8076439,12.183876 13.7336492,12.1389597 13.6512248,12.1307719 C13.5690344,12.122584 13.4866099,12.1518264 13.4280698,12.2103111 C13.2964717,12.341083 13.1847771,12.4624973 13.089708,12.5832098 C12.9471042,12.7640445 12.8407954,12.9476866 12.768674,13.1470026 C12.6963184,13.3460846 12.6588527,13.5573315 12.635905,13.7985225 C12.6204504,13.9611101 12.6103815,14.1356285 12.6103815,14.3166972 C12.6113181,14.7150952 12.6597894,15.1427356 12.8307265,15.5292027 C12.7010016,15.5448766 12.596566,15.6499152 12.5874338,15.7832604 C12.5801748,15.8875971 12.5764282,15.9888927 12.5764282,16.0885507 C12.5757257,16.9878119 12.8628065,17.7188711 13.3128629,18.2269865 C13.3568851,18.2770494 13.4025463,18.3229014 13.4491443,18.3685195 C13.4491443,18.370391 13.4482076,18.3722625 13.4482076,18.3748359 C13.447271,18.393317 13.447271,18.4106285 13.447271,18.4288758 C13.447271,18.7715963 13.5360178,19.0941981 13.6870513,19.3784339 C13.912782,19.8060742 14.2715158,20.1532396 14.684809,20.4063615 C14.8377158,20.4994692 14.9976474,20.5799442 15.1631989,20.6475526 C14.467274,20.8697946 13.8935808,20.9198575 13.4217475,20.9207932 C13.2121739,20.9207932 13.0210989,20.9097981 12.8473519,20.8997387 C12.6736048,20.8889775 12.516249,20.8779824 12.3680254,20.8779824 C12.3321989,20.8779824 12.2984798,20.8789182 12.263824,20.8798539 C12.1804629,20.883363 12.1045949,20.9236005 12.055187,20.9902731 C12.0057792,21.0569457 11.9884513,21.1411637 12.0076525,21.2214048 C12.0889061,21.5540659 12.2874742,21.856549 12.5609736,22.124409 C12.9726277,22.5256143 13.5599022,22.8554682 14.2649593,23.0912786 C14.9683774,23.3287267 15.7926222,23.4676864 16.6770463,23.4676864 C17.9668021,23.4676864 19.386517,23.1715197 20.7401986,22.4360157 C21.9768,21.7625055 23.0066378,20.6585477 23.6250555,19.4294326 C23.8381416,19.0045995 24.072302,18.4543751 24.2544789,17.8704635 C24.4364215,17.286552 24.5680197,16.669655 24.5680197,16.1004816 C24.5680197,15.9077159 24.5525651,15.7193951 24.5169727,15.5392621 C24.6733919,15.4269714 24.8131857,15.317254 24.9393982,15.2068349 C25.1901841,14.9874001 25.3875814,14.7597776 25.5524303,14.5050181 C25.7170451,14.2500246 25.8486433,13.9692979 25.9804756,13.6385083 C26.0170047,13.5463363 26.0015501,13.4429353 25.9402,13.3652676 Z"
                                          id="Page-1" fill="#FFFFFF"></path>
                                    <text id="Comparte-en-twitter" font-family="Roboto"
                                          font-size="10" font-weight="420" fill="#FFFFFF">
                                        <tspan x="34" y="20">Comparte en twitter</tspan>
                                    </text>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="{{route('productDetail', ['slug' => $product->slug, 'id' => $product->id])}}" data-text="{!!$product->name!!}" data-via="twitter-agroseller" data-lang="es" data-size="large" data-dnt="true">Twittear</a>
                </div>
            </nav>
        </article>
        <article class="col-6 ProductDetail-thumbnail">
            <div class="row between owl-carousel" id="sync2">
                @foreach($product->productFiles as $file)
                    @if($file->extension != 'pdf')
                        <figure class="item" class="col-3"><img src="{{url('uploads/products/'. $file->name)}}" alt=""></figure>
                    @endif
                @endforeach
            </div>
        </article>
        <article class="col-6 ProductDetail-data row middle">
            <p>
                <b>Código de producto:</b> {{$product->id}} <br>
                <b>Subcategoría:</b> {{$product->subcategory->name}}
        </article>
    </section>
    <section class="Provider-detail row middle">
        <div class="col-8 row middle">
            <figure>
                <svg  width="30px" xmlns="http://www.w3.org/2000/svg" viewBox="-255 347 100 100"><path style="fill: #27383F" d="M-227 383.6c-2-7 .1-8 1.9-7.9-1.3-3.7-1.3-7.3-.5-10.6.9-3.9 3-7.1 5.4-9.5 1.5-1.6 3.2-3 5-4.2 1.5-1 3.1-1.9 4.9-2.5 1.4-.5 2.9-.8 4.4-.8 4.8-.4 8.5.8 11.1 2.4 3.9 2.2 5.4 5 5.4 5s9.9.7 5.6 21.4c1.3.5 2.3 2.3.7 7.7-1.9 6.7-3.6 7.1-4.7 6.4-1.3 7.2-5.2 16.5-17.7 17-12.7-1-16.8-10.5-17.9-17.9-.8.1-2.2-1.4-3.6-6.5zm56.7 30.7c-10.7-2.7-19.4-8.9-19.4-8.9l-6.8 21.5-1.3 4v-.1l-1.1 3.4-3.6-10.2c9.1-12.6-2.4-12.2-2.4-12.2s-11.5-.5-2.4 12.2l-3.6 10.3-1.1-3.5-8.1-25.5s-8.7 6.1-19.4 8.9c-5.3 1.4-7.3 5.9-7.9 10.2 9.6 13.2 25.1 21.5 42.4 21.5 4 0 7.9-.5 11.8-1.3 12.5-2.9 23.4-10.1 30.8-20.4-.7-4.2-2.7-8.6-7.9-9.9z"/></svg>
            </figure>
            <h4>{{$product->user->name}}</h4>
            <div class="Provider-star col-2">
                @for($i = 0; $i < 5; $i++)
                    <svg width="16px" height="26px" viewBox="0 0 16 26">
                        <use xlink:href="#StarsSvg"/>
                    </svg>
                @endfor
            </div>
        </div>
        <a href="" class="col-4">Mas Información</a>
    </section>
    <div id="Map" class="col-12 Limited"></div>
    <section class="ProductInfo">
        <h2>Descripción</h2>
        {!!$product->description!!}
        <h2>Características </h2>
        <article class="row bottom">
            <?php $j = 0 ?>
            @for($i = 0; $i < 2; $i++)
                <ul class="col-2 self-start">
                    @while($j < count($featuresTranslate))
                        <li>{{$featuresTranslate[$j]['name']}}: <b>{{ $featuresTranslate[$j]['value'] }}</b></li>
                        <?php $j++ ?>
                        @if($j == count($featuresTranslate) /2)
                            @break
                        @endif
                    @endwhile
                </ul>
            @endfor
            <div class="col-8 AlignRight">
                @foreach($product->productFiles as $file)
                    @if($file->extension == 'pdf')
                        <a href="/uploads/products/{{$file->name}}" style="color : black" download>
                            Descarga Ficha Técnica
                            <svg width="32px" height="38px" viewBox="0 0 32 38" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Product-detail" transform="translate(-1243.000000, -1928.000000)" fill="#C5D257">
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
                    <button class="commentButton" id="commentButton" onClick="addComment($('#commentBox').val(), '{{$product->id}}', '{{Auth::user()->id}}','{{route("addQuestion")}}', '{{url("/")}}'); return false;">Enviar</button>
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
                        <ul class="col-12" style="padding-left:3.8rem; margin-bottom: 5px">
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
    <script src="{{asset('js/maps.js')}}"></script>
    <script>getPosition('{!!$product->location!!}')</script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap"
            async defer></script>
    <script src="{{asset('js/front/slide.js')}}"></script>
    <script src="http://owlgraphic.com/owlcarousel/owl-carousel/owl.carousel.js"></script>
    <script src="{{asset('js/comments.js')}}"></script>
    <script src="{{asset('js/front/product.js')}}"></script>
    @if($offer)
        <?php
            $fecha = explode('-', $product->offers->offer_off);
            $day = explode(' ', $fecha[2]);
            $time = explode(':', $day[1]);

            $year = $fecha[0];
            $month = $fecha[1];
            $day = $day[0];
            $hour = $time[0];
            $minute = $time[1];
        ?>
    <script>
        countDown({
            'year'   : {!! $year !!},
            'month'  : {!! $month !!},
            'day'    : {!! $day !!},
            'hour'   : {!! $hour !!},
            'minute' : {!! $minute !!}
        });
    </script>
    @endif
    <script>
        $('#buy').on('click',function(e){
            e.preventDefault();
            window.location.href = $(this).data('url') + '/compras/{{ $product->id }}/'+$('#quantity').val()
        });
    </script>
@endsection

@section('styles')
    <link href="http://owlgraphic.com/owlcarousel/owl-carousel/owl.carousel.css" rel="stylesheet">
@endsection
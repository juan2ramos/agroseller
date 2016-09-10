<?php

namespace Agrosellers\Http\Controllers;
use Agrosellers\Entities\ProductFile;
use Agrosellers\Entities\Subcategory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Agrosellers\Entities\Product;
use Elasticsearch\ClientBuilder;

class HomeController extends Controller
{
    function landing(){

        return view('landing');
    }
    function index(){



        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 'my_id',
            'body' => ['testField' => 'abc']
        ];



        $d = Product::searchByQuery([
            "bool" => [
                "must" => [
                    'match' => [
                        'farms' => [
                            "query" => 'cacao',
                            "type" => "phrase"
                        ]
                    ]
                ],
                'must' => [
                    'multi_match' => [
                        'query' => 'Fertilizante',
                        'fields' => ["name^2", "description"]
                    ],
                ],

            ],


            /*  ["_geo_distance" => [
                  "location" => [
                      "lat" => "40.715",
                      "lon" => "-73.998"
                  ]
              ],
                  "order" => "asc",
                  "unit" => "km",
                  "distance_type" => "plane"
              ]*/

            /* 'multi_match' => [
                 'query' => 'Fertilizante',
                 'fields' => ["name^5", "description"]
             ]*/
        ], [], [], [], [],
            [
                "_geo_distance" => [
                    "location" => [
                        "lat" => "3.4516467",
                        "lon" => "-76.5319854"
                    ],
                    "order" => "asc",
                    "unit" => "km",
                    "distance_type" => "sloppy_arc"
                ]
            ]);
        $products = $d->paginate(8);


        /*$products = Product::whereRaw('isValidate = 1 and isActive = 1')
            ->with(['offers', 'productFiles', 'subcategory'])
            ->paginate(8);*/
        return view('front.home',compact('products'));
    }
    

    function indexContact(){
        return view('front.contactForm');
    }

    function postContact(Request $request){
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'subject' => 'max:100',
            'message' => 'required|min:50'
        ]);

        $data = $request->all();

        Mail::send('emails.contact',$data, function($msg) use($data){
            $msg->from('luza.231@hotmail.com');
            $msg->to($data['email'], $data['name'])->subject($data['subject']);
        });

        $answer = "El mensaje se ha enviado satisfactoriamente, pronto nos contactaremos contigo";
        return view('front.contactForm', ['mensaje' => $answer]);
    }

    public function indexFaqs(){
        return view('front.faqs');
    }

    function searchBar(Request $request){

        return ['products' => Product::whereRaw('isValidate = 1 and isActive = 1')->with(['productFiles' => function($file){
            $file->whereRaw('extension = "jpeg" or extension = "jpg" or extension = "png" or extension = "svg"')->get();
        }])->where("name", "like", "%{$request->value}%")->limit(10)->get(['slug', 'name', 'id'])];

    }
}
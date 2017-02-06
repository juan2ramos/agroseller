<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\City;
use Agrosellers\Entities\Packing;
use Agrosellers\Entities\ProductProvider;
use Agrosellers\Entities\Provider;
use Agrosellers\Entities\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Product;
use Agrosellers\Entities\Question;
use Agrosellers\Entities\Feature;
use Agrosellers\Entities\Text;
use Agrosellers\User;
use Agrosellers\Entities\ProductFile;
use Illuminate\Http\Response;
use Jenssegers\Date\Date;

class ProductController extends Controller
{

    public function callProducts(Request $request)
    {
        if ($request->ajax())
            $products = Product::where('subcategory_id', $request->get('subcategory_id'))->get();
        return ['products' => $products];
    }

    function productFront(Request $request, $subcategoriesName = null)
    {
        /*if ($subcategoriesName) {
            $products = Subcategory::where('slug', $subcategoriesName)->firstOrFail()->products()->whereRaw('isValidate = 1 and isActive = 1')->paginate(8);
            return view('front.home', compact('products'));
        }
        return redirect()->route('home');*/
        $subcategory = Subcategory::where('slug', $subcategoriesName)->first();
        $subcategoryId = $subcategory->id;
        return view('front.home', compact('subcategoryId'));
    }

    function checkout(Request $request)
    {
        return view('front.checkout');
    }

    function addQuestion(Request $request)
    {
        $question = new Question;
        $question->fill($request->all())->save();

        $text = new Text;
        $text->fill(['description' => $request->description, 'question_id' => $question->id]);
        $text->user_id = $request->user_id;
        $text->save();

        $questions = $this->reloadQuestions($request->product_id);
        return ['questions' => $questions];
    }

    function productDetailFront(Request $request, $slug, $id)
    {
        $ids = [];
        $product = Product::with(['subcategory', 'files', 'providers.user'])->find($id);

        foreach ($product->providers as $provider ){
            $ids[] = $provider->pivot->id;
        }
        $productProvider = ProductProvider::with('packing')->whereIn('id',$ids)->where('isActive', 1)->get()->toJson();



        $questions = $this->reloadQuestions($id);
        $featuresTranslate = $this->setFeaturesTranslate($product);
        $cities = City::lists('nombre_ciudad', 'id_ciudad');

        $offer = false;
        return view('front.productDetail', compact('questions', 'product', 'featuresTranslate', 'offer', 'cities','productProvider'));


        /* Versión anterior al cambio de productos con muchos proveedores*/
        $product = Product::find($id);
        if (($product->isActive && $product->isValidate) || $request->ajax()) {
            $offer = ($offerModel = $product->offers()->first()) ?
                (Carbon::now()->between(new Carbon($offerModel->offer_on), new Carbon($offerModel->offer_off)))
                    ? $offerModel->offer_price : null : null;
            //$description = $offerModel->offer_description;
            $questions = $this->reloadQuestions($id);
            $featuresTranslate = $this->setFeaturesTranslate($product);
            return view('front.productDetail', compact('questions', 'product', 'featuresTranslate', 'offer', 'description'));
        }
        return redirect()->route('home');
    }

    private function reloadQuestions($id)
    {

        $questions = Question::where('product_id', $id)->orderBy('created_at', 'DESC')->get();

        foreach ($questions as $question) {
            $question['texts'] = Text::with('user')->where('question_id', $question->id)->get();
            foreach ($question->texts as $text) {
                $text['date'] = Date::parse($text->created_at)->diffForHumans();
            }
        }
        return $questions;
    }

    public function setFeaturesTranslate(Product $product)
    {
        $features = $product->subcategory->features;
        $featuresTranslate =
            [[
                'id' => 1,
                'name' => 'Presentación',
                'value' => $product->presentation
            ],
                [
                    'id' => 2,
                    'name' => 'Tamaño',
                    'value' => $product->size
                ],
                [
                    'id' => 3,
                    'name' => 'Peso',
                    'value' => $product->weight
                ],
                [
                    'id' => 4,
                    'name' => 'Medida',
                    'value' => $product->measure
                ],
                [
                    'id' => 5,
                    'name' => 'Material',
                    'value' => $product->material
                ],
                [
                    'id' => 6,
                    'name' => 'Description',
                    'value' => null
                ],
                [
                    'id' => 7,
                    'name' => 'Composición',
                    'value' => null
                ],
                /*[
                    'id' => 8,
                    'name' => 'Precio',
                    'value' => '$' . number_format($product->price, 0, ',', '.')
                ],
                [
                    'id' => 9,
                    'name' => 'Impuestos',
                    'value' => $product->taxes
                ],*/
                [
                    'id' => 10,
                    'name' => 'Cantidad disponible',
                    'value' => $product->available_quantity
                ],
                [
                    'id' => 11,
                    'name' => 'Tamaño imagen',
                    'value' => $product->image_scale
                ],
                [
                    'id' => 12,
                    'name' => 'Ubicación',
                    'value' => null
                ],
                [
                    'id' => 13,
                    'name' => 'Descripción de uso',
                    'value' => $product->forms_employment
                ]];

        foreach ($featuresTranslate as $key => $translate) {
            if (!isset($features[$key]) || !$featuresTranslate[$key]['value']) {
                unset($featuresTranslate[$key]);
            }
        }

        return array_values($featuresTranslate);
    }
}

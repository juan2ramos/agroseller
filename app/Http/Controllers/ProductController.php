<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Subcategory;
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

    function productFront(Request $request, $subcategoriesName = null)
    {
        if ($subcategoriesName) {

            $products = Subcategory::where('slug', $subcategoriesName)->firstOrFail()->products()->get();
            $subcategories = Subcategory::all();
            $images = ProductFile::whereRaw('extension = "jpg" or extension = "png"')->get();
            return view('front.home', compact('categories', 'products', 'subcategories', 'images'));

        }
        return redirect()->route('home');

    }

    function checkout(Request $request)
    {
        return view('front.checkout');
    }

    function addQuestion(Request $request)
    {
        $question = new Question;
        $question->user_id = $request->user_id;
        $question->product_id = $request->product_id;
        $question->save();

        $text = new Text;
        $text->description = $request->comment;
        $text->question_id = $question->id;
        $text->save();

        $questions = Question::where('product_id', '=', $request->product_id)->orderBy('id', 'desc')->get();
        $users = [];
        $texts = [];
        $dates = [];

        foreach ($questions as $question) {
            $text = Text::where('question_id', '=', $question->id)->first();
            $users[] = User::find($question->user_id);
            $texts[] = $text;
            $dates[] = Date::parse($text->created_at)->diffForHumans();
        }

        if ($request->ajax()) {
            return response()->json(['texts' => $texts, 'users' => $users, 'dates' => $dates]);
        }

        return response()->json(['texts' => $texts, 'users' => $users, 'dates' => $dates]);
    }

    private function setFeaturesTranslate(Product $product)
    {
        return
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
                    'value' => "",
                ],
                [
                    'id' => 7,
                    'name' => 'Composición',
                    'value' => $product->composition
                ],
                [
                    'id' => 8,
                    'name' => 'Precio',
                    'value' => '$' . number_format($product->price, 0, ',', '.')
                ],
                [
                    'id' => 9,
                    'name' => 'Impuestos',
                    'value' => $product->taxes
                ],
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
                    'value' => $product->location
                ],
                [
                    'id' => 13,
                    'name' => 'Descripción de uso',
                    'value' => $product->forms_employment
                ]];
    }

    function productDetailFront($slug, $id)
    {
        $product = Product::find($id);
        $featuresTranslate = $this->setFeaturesTranslate($product);

        $questions = Question::where('product_id', '=', $product->id)->orderBy('id', 'desc')->get();
        $features = $product->subcategory->features;

        foreach ($featuresTranslate as $key => $translate) {
            if (!isset($features[$key]) || $featuresTranslate[$key]['value'] == "") {
                unset($featuresTranslate[$key]);
            }
        }

        $users = [];
        $texts = [];
        $dates = [];
        foreach ($questions as $question) {
            $text = Text::where('question_id', '=', $question->id)->first();
            $users[] = User::find($question->user_id);
            $texts[] = $text;
            $dates[] = Date::parse($text->created_at)->diffForHumans();
        }

        $images = ProductFile::whereRaw('extension = "jpg" or extension = "png" or extension = "svg"')->get();
        return view('front.productDetail', compact('questions', 'product', 'images', 'users', 'texts', 'features', 'dates', 'features', 'featuresTranslate'));
    }
}

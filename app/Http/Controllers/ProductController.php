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

class ProductController extends Controller
{

    function productFront(Request $request)
    {
        $products = Product::take(10)->get();
        return view('front.products', compact('products'));
    }
    function checkout(Request $request)
    {
        return view('front.checkout');
    }

    function addQuestion(Request $request){
        $question = new Question;
        $question->user_id = $request->user_id;
        $question->product_id = $request->product_id;
        $question->save();

        $text = new Text;
        $text->description = $request->comment;
        $text->question_id = $question->id;
        $text->save();

        $questions = Question::where('product_id' , '=', $request->product_id)->orderBy('id','desc')->get();
        $users = [];
        $texts = [];

        foreach($questions as $question){
            $users[] = User::find($question->user_id);
            $texts[] = Text::where('question_id', '=', $question->id)->first();
        }

        if ($request->ajax()) {
            return response()->json(['texts' => $texts, 'users' => $users]);
        }

        return response()->json(['texts' => $texts, 'users' => $users]);
    }
    function productDetailFront($id){
        $questions = Question::where('product_id' , '=', $id)->orderBy('id','desc')->get();
        $products = Product::all();
        $product = $products->find($id);
        $subcategory = Subcategory::find($product->subcategory_id);
        $features = Feature::all();
        
        $users = [];
        $texts = [];

        foreach($questions as $question){
            $users[] = User::find($question->user_id);
            $texts[] = Text::where('question_id', '=', $question->id)->first();
        }

        $images = ProductFile::whereRaw('extension = "jpg" or extension = "png" or extension = "svg"')->get();
        return view('front.productDetail', compact('questions', 'product', 'subcategory','images', 'users', 'texts', 'features'));
    }
}

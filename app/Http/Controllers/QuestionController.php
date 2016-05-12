<?php

namespace Agrosellers\Http\Controllers;

use Illuminate\Http\Request;
use Agrosellers\Entities\Question;
use Agrosellers\Entities\Product;
use Agrosellers\Entities\Text;
use Agrosellers\User;
use Jenssegers\Date\Date;

use Agrosellers\Http\Requests;

class QuestionController extends Controller
{
    function index(){
        if(auth()->user()->role_id == 3){
            $questions = Question::whereIn('product_id', function($query){
                $query->select('id')
                      ->from('products')
                      ->where('user_id', auth()->user()->id)
                      ->get();
            })->orderBy('created_at', 'DESC')->get();
        }
        else{
            $questions = Question::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        }

        return view('back.questions', compact('questions'));
    }

    function questionDetail(Request $request){
        return $this->showText($request);
    }

    function questionNew(Request $request){
        $text = new Text;
        $text->question_id = $request->question_id;
        $text->description = $request->description;
        $text->user_id = auth()->user()->id;
        $text->save();

        $question = $text->question()->firstOrFail();
        auth()->user()->role_id == 3 ? $question->isResponded = 1 : $question->isResponded = 0 ;
        $question->save();

        return $this->showText($request);
    }

    private function showText($request){
        $texts = Text::with('user', 'question')->where('question_id', $request->question_id)->get(['created_at', 'user_id', 'description', 'question_id']);
        foreach($texts as $text){
            $text['date'] = Date::parse($text->created_at)->diffForHumans();
        }

        return ['text'  =>  $texts];
    }
}

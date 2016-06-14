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
    
    public function prueba()
    {
        $questions = Question::all();
        echo "<h3>Notificaciones:</h3><br>";
        $table = "<table border='1'>
                    <thead>
                        <tr>
                            <th>id pregunta</th>
                            <th>id usuario</th>
                            <th>fecha creacion</th>
                            <th>texto</th>
                        </tr>
                    </thead>
                    <tbody>";
        foreach ($questions as $question){
            $table .= "<tr>
                          <th>{$question->id}</th>
                          <th>{$question->user_id}</th>
                          <th>{$question->texts()->first()->created_at}</th>
                          <th>{$question->texts()->first()->description}</th>
                       </tr>";
        }
        $table .= "</tbody>
                 </table>";

        echo $table;
    }

    public function pruebaCreate(){
        $question = Question::create(['user_id' => '1', 'product_id' => '1']);
        $text = Text::create(['description' => 'mensaje' . $question->id, 'question_id' => $question->id, 'user_id' => '1']);
        echo "<h3>El mensaje ha sido credo:</h3><br><p>ID Pregunta : {$question->id}</p><p>User_id : {$question->user_id}</p><p>Texto : {$text->description}</p>";
    }
}

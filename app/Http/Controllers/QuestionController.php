<?php

namespace Agrosellers\Http\Controllers;

use Illuminate\Http\Request;

use Agrosellers\Http\Requests;

class QuestionController extends Controller
{
    function index(){
        return view('back.questions');
    }
}

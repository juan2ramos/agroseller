<?php

namespace Agrosellers\Http\Controllers;

use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Category;

class CategoryController extends Controller
{
    function index()
    {
        dd(Category::all());

        echo 'd';
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Agrosellers\Entities\Category;

class CategoryController extends Controller
{
    function index()
    {

        dd(Category::all());
        echo 'd';
    }
}

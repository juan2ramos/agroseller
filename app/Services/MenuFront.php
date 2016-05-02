<?php

namespace Agrosellers\Services;

use Agrosellers\Entities\Category;
use Gate;
use Illuminate\Support\Facades\Auth;



class MenuFront
{

    public function getCategory(){
        return Category::has('subcategories')->get();
    }


}


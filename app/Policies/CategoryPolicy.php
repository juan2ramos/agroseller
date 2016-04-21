<?php

namespace Agrosellers\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function view(){
        return true;
    }
}

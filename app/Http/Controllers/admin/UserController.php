<?php

namespace Agrosellers\Http\Controllers\admin;

use Agrosellers\Entities\Agent;
use Agrosellers\Entities\Role;
use DB;
use Agrosellers\User;
use Gbrock\Table\Facades\Table;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Provider;
use Illuminate\Support\Facades\View;
use Agrosellers\Http\Controllers\Controller;

class UserController extends Controller
{
    function agentsGet(){

        return Agent::with('user');
    }
}

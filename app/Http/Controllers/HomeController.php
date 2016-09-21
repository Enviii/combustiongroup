<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;

class HomeController extends Controller
{
    public function home() {
        return view::make("home");
    }
}

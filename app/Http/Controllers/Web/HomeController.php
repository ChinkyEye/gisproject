<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page_name = "Welcome";
        return view('web.home', compact(['page_name']));
    }
}

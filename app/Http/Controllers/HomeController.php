<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['nav_item'] = 'home';

        return view('home', $data);
    }
}

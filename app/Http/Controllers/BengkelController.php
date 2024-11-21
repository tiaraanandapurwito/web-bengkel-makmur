<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BengkelController extends Controller
{
    public function index()
    {
        return view('lebihlanjut');
    }
}

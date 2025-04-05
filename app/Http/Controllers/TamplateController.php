<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TamplateController extends Controller
{
    public function index()
    {
        return view('welcome'); // Jo bhi view return karwana ho
    }
}

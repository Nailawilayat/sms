<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


 // Agar books database se fetch karni hai

class WelcomeController extends Controller
{
    public function index()
    {
        // Books ko database se fetch karna (Agar required ho)
        $home = Home::all(); 

        // "index" view ko return karna, aur books ka data pass karna
        return view('index', compact('home'));
    }
}

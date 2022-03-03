<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $message = 'foo bar baz';

        return view('main.index', [
            'message' => $message,
        ]);
    }
}

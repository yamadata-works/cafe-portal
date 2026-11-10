<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function hello()
    {
        $name = '木漏れ日';
        return view('hello', ['name' => $name]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Cafe;

class CafeController extends Controller
{
    public function hello()
    {
        $name = '木漏れ日';

        return view('hello', ['name' => $name]);
    }

    public function index()
    {
        $query = Cafe::query();

        if (request('keyword')) {
            $query->where('name', 'like', '%'.request('keyword').'%');
        }

        $cafes = $query->paginate(10)->withQueryString();

        return view('cafes.index', compact('cafes'));
    }

    public function show(Cafe $cafe)
    {
        return view('cafes.show', compact('cafe'));
    }
}

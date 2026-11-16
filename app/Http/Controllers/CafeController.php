<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Cafe;
use App\Models\Tag;

class CafeController extends Controller
{
    public function hello()
    {
        $name = '木漏れ日';

        return view('hello', ['name' => $name]);
    }

    public function index()
    {
        // エリアもまとめて読み込む（問い合わせの回数を減らす）
        $query = Cafe::with('area');

        if (request('keyword')) {
            $query->where('name', 'like', '%'.request('keyword').'%');
        }

        if (request('area_id')) {
            $query->where('area_id', request('area_id'));
        }

        if (request('tag_id')) {
            $query->whereHas('tags', function ($q) {
                $q->where('tags.id', request('tag_id'));
            });
        }

        $cafes = $query->paginate(10)->withQueryString();
        $areas = Area::all();
        $tags = Tag::all();

        return view('cafes.index', compact('cafes', 'areas', 'tags'));
    }

    public function show(Cafe $cafe)
    {
        return view('cafes.show', compact('cafe'));
    }
}

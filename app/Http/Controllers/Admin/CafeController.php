<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Cafe;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CafeController extends Controller
{
    // 管理用の一覧
    public function index()
    {
        $cafes = Cafe::with('area')->latest()->paginate(20);

        return view('admin.cafes.index', compact('cafes'));
    }

    // 登録画面
    public function create()
    {
        $areas = Area::all();
        $tags = Tag::all();

        return view('admin.cafes.create', compact('areas', 'tags'));
    }

    // 登録する
    public function store(Request $request)
    {
        $data = $this->validateCafe($request);

        $cafe = Cafe::create(Arr::except($data, ['tags']));
        $cafe->tags()->sync($data['tags'] ?? []);

        return redirect()->route('admin.cafes.index')->with('status', 'カフェを登録しました。');
    }

    // 編集画面
    public function edit(Cafe $cafe)
    {
        $areas = Area::all();
        $tags = Tag::all();

        return view('admin.cafes.edit', compact('cafe', 'areas', 'tags'));
    }

    // 更新する
    public function update(Request $request, Cafe $cafe)
    {
        $data = $this->validateCafe($request);

        $cafe->update(Arr::except($data, ['tags']));
        $cafe->tags()->sync($data['tags'] ?? []);

        return redirect()->route('admin.cafes.index')->with('status', 'カフェを更新しました。');
    }

    // 削除する
    public function destroy(Cafe $cafe)
    {
        $cafe->tags()->detach();
        $cafe->delete();

        return redirect()->route('admin.cafes.index')->with('status', 'カフェを削除しました。');
    }

    // 入力のチェック（登録と更新で共通）
    private function validateCafe(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'area_id' => ['required', 'exists:areas,id'],
            'address' => ['required', 'string', 'max:255'],
            'open_hours' => ['required', 'string', 'max:100'],
            'budget' => ['required', 'integer', 'min:0'],
            'seats' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);
    }
}

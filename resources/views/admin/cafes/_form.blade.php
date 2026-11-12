@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<p>
    <label>店名<br>
        <input type="text" name="name" value="{{ old('name', $cafe->name ?? '') }}" required>
    </label>
</p>

<p>
    <label>エリア<br>
        <select name="area_id" required>
            <option value="">選んでください</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}" @selected(old('area_id', $cafe->area_id ?? '') == $area->id)>{{ $area->name }}</option>
            @endforeach
        </select>
    </label>
</p>

<p>
    <label>住所<br>
        <input type="text" name="address" value="{{ old('address', $cafe->address ?? '') }}" required>
    </label>
</p>

<p>
    <label>営業時間<br>
        <input type="text" name="open_hours" value="{{ old('open_hours', $cafe->open_hours ?? '') }}" placeholder="10:00〜20:00" required>
    </label>
</p>

<p>
    <label>予算（円）<br>
        <input type="number" name="budget" value="{{ old('budget', $cafe->budget ?? '') }}" min="0" required>
    </label>
</p>

<p>
    <label>席数<br>
        <input type="number" name="seats" value="{{ old('seats', $cafe->seats ?? '') }}" min="0" required>
    </label>
</p>

<p>
    <label>紹介文<br>
        <textarea name="description" rows="4" required>{{ old('description', $cafe->description ?? '') }}</textarea>
    </label>
</p>

@php
    $checkedTags = old('tags', isset($cafe) ? $cafe->tags->pluck('id')->all() : []);
@endphp

<p>タグ<br>
    @foreach ($tags as $tag)
        <label>
            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @checked(in_array($tag->id, $checkedTags))>
            {{ $tag->name }}
        </label>
    @endforeach
</p>
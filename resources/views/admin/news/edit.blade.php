@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-xl rounded-lg mt-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Berita</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-4">
            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
        </div>

        {{-- Content --}}
        <div class="mb-4">
            <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">Isi Berita</label>
            <textarea name="content" id="content" rows="6" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ old('content', $news->content) }}</textarea>
        </div>

        {{-- Category --}}
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
            <select name="category_id" id="category_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $news->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Current Image --}}
        @if ($news->image)
            <div class="mb-4">
                <p class="text-sm font-semibold text-gray-700 mb-2">Gambar Saat Ini:</p>
                <img src="{{ asset('storage/' . $news->image) }}" alt="Current Image" class="w-64 rounded shadow">
            </div>
        @endif

        {{-- Upload New Image --}}
        <div class="mb-4">
            <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Ganti Gambar (Opsional)</label>
            <input type="file" name="image" id="image" class="w-full px-3 py-2 border rounded-lg">
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.news.index') }}" class="mr-3 px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Update</button>
        </div>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-6">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Berita Baru</h1>

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block font-semibold text-gray-700">Judul</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label for="content" class="block font-semibold text-gray-700">Konten</label>
                <textarea name="content" id="content" rows="6"
                          class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('content') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="category_id" class="block font-semibold text-gray-700">Kategori</label>
                <select name="category_id" id="category_id"
                    class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block font-semibold text-gray-700">Gambar</label>
                <input type="file" name="image" id="image"
                       class="w-full mt-2 p-2 border rounded-lg focus:outline-none">
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('admin.news.index') }}"
                   class="text-gray-600 hover:underline">← Kembali</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                    Simpan Berita
                </button>
            </div>
        </form>
    </div>
</div
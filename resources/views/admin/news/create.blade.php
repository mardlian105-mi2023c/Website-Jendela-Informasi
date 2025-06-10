@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header with animated gradient -->
        <div class="mb-8 p-6 bg-gradient-to-br from-slate-900 to-slate-800 rounded-xl shadow-lg">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-white/20 backdrop-blur-sm rounded-full">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-white">Tambah Berita Baru</h1>
                    <p class="text-blue-100">Isi formulir berikut untuk membuat berita baru</p>
                </div>
            </div>
        </div>

        <!-- Form container -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-8">
                @csrf

                <!-- Title field -->
                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Judul Berita
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                           class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:border-gray-300 placeholder-gray-400"
                           placeholder="Masukkan judul berita yang menarik">
                </div>

                <!-- Content field -->
                <div class="space-y-2">
                    <label for="content" class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Konten Berita
                    </label>
                    <textarea name="content" id="content" rows="8"
                              class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:border-gray-300 placeholder-gray-400"
                              placeholder="Tulis konten berita Anda disini...">{{ old('content') }}</textarea>
                </div>

                <!-- Category and Image in grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Category field -->
                    <div class="space-y-2">
                        <label for="category_id" class="block text-sm font-medium text-gray-700 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                            </svg>
                            Kategori
                        </label>
                        <select name="category_id" id="category_id"
                                class="mt-1 block w-full px-4 py-3 border border-gray-200 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:border-gray-300">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Image field -->
                    <div class="space-y-2">
                        <label for="image" class="block text-sm font-medium text-gray-700 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Gambar Berita
                        </label>
                        <div class="mt-1 flex items-center">
                            <label for="image" class="cursor-pointer">
                                <div class="px-4 py-3 border-2 border-dashed border-gray-200 rounded-lg w-full hover:border-blue-400 transition duration-200 ease-in-out group">
                                    <div class="flex flex-col items-center justify-center space-y-1 text-center">
                                        <svg class="mx-auto h-10 w-10 text-gray-400 group-hover:text-blue-500 transition duration-200" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <p class="text-sm text-gray-600 group-hover:text-blue-600 transition duration-200">
                                            <span class="font-medium text-blue-600">Upload gambar</span> atau drag & drop
                                        </p>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF (Max. 5MB)</p>
                                    </div>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Form actions -->
                <div class="flex flex-col-reverse sm:flex-row justify-between items-center pt-8 border-t border-gray-100 gap-4">
                    <a href="{{ route('admin.news.index') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition duration-200 ease-in-out">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Daftar
                    </a>
                    <button type="submit"
                            class="inline-flex items-center px-6 py-3 bg-amber-400 border border-transparent rounded-lg text-white font-medium shadow-sm hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 ease-in-out transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                        </svg>
                        Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
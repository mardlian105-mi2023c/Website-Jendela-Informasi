@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-6">
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Daftar Berita</h1>

        <div class="flex justify-between mb-4">
            <a href="{{ route('admin.news.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Tambah Berita
            </a>
        </div>

        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 text-left">Judul</th>
                    <th class="py-2 px-4 text-left">Kategori</th>
                    <th class="py-2 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $item->title }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $item->category->name ?? 'Tanpa Kategori' }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a> |
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
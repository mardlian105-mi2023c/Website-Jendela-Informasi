@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Berita Terbaru</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($news as $item)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            @if ($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
            @else
                <img src="https://picsum.photos/600/400?random={{ $item->id }}" alt="Default Image" class="w-full h-48 object-cover">
            @endif

            <div class="p-5">
                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mb-2">
                    {{ $item->category->name ?? 'Tanpa Kategori' }}
                </span>
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $item->title }}</h2>
                <p class="text-gray-600 text-sm mb-4">
                    {{ Str::limit(strip_tags($item->content), 120, '...') }}
                </p>
                <a href="{{ route('news.show', $item->id) }}" class="inline-block text-blue-600 font-semibold hover:underline">
                    Baca Selengkapnya →
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

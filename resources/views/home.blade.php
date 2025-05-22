@extends('layouts.app')

@section('content')
@include('components.banner', ['news' => $news])

<div class="bg-gradient-to-b from-slate-50 to-white">
    <div class="container mx-auto px-4 py-12 sm:py-16 lg:py-20">
        <!-- Section Header -->
        <div class="text-center mb-12 sm:mb-16 lg:mb-20">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-800 mb-4">
                <span class="bg-gradient-to-r from-amber-500 to-amber-600 bg-clip-text text-transparent">Portal</span> Berita
            </h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Temukan berita terkini dan terpercaya dari berbagai kategori
            </p>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($news as $item)
            <div class="group relative bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <!-- Image with overlay -->
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 to-transparent"></div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <div class="flex items-center text-sm text-slate-500 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $item->created_at->format('d M Y') }}
                    </div>
                    
                    <h2 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-amber-600 transition-colors">
                        {{ $item->title }}
                    </h2>
                    
                    <p class="text-slate-600 mb-4">
                        {{ \Illuminate\Support\Str::limit($item->content, 120) }}
                    </p>
                    
                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.news.show', $item) }}" 
                           class="inline-flex items-center text-amber-600 font-medium hover:text-amber-700 transition-colors">
                            Baca Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Load More Button (Optional) -->
        <div class="mt-12 text-center">
            <a href="{{ route('berita') }}" class="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-lg shadow-md transition-colors duration-300">
                Muat Lebih Banyak
            </a>
        </div>
    </div>
</div>
@endsection
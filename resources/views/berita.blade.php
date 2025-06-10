@extends('layouts.app')

@section('content')
@php
    $categories = \App\Models\Category::all();
@endphp

<div class="bg-gradient-to-b from-slate-50 to-white min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
        <!-- Header Section -->
        <div class="text-center mb-12 sm:mb-16 lg:mb-20">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-800 mb-4">
                <span class="text-amber-400">Jendela</span> Informasi
            </h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Temukan informasi terbaru dan terpercaya dari berbagai kategori
            </p>
        </div>

        <!-- Category Filter -->
        <div class="mb-12 flex justify-center">
            <div class="relative w-full max-w-md">
                <select onchange="if (this.value) window.location.href=this.value"
                    class="block appearance-none w-full bg-white border-2 border-slate-200 text-slate-700 py-3 px-6 pr-10 rounded-xl shadow-sm leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-slate-300">
                    <option disabled selected class="text-slate-400">Pilih Kategori</option>
                    <option value="{{ route('berita') }}" class="text-slate-700">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ route('berita.kategori', $category->id) }}" class="text-slate-700">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                    <svg class="fill-current h-5 w-5" viewBox="0 0 20 20">
                        <path d="M7 10l5 5 5-5H7z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($news as $item)
            <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <!-- Image with overlay -->
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <span class="inline-block px-3 py-1 bg-blue-500 text-white text-xs font-semibold rounded-full tracking-wider">
                            {{ $item->category->name ?? 'Uncategorized' }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <div class="flex items-center text-sm text-slate-500 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $item->created_at->translatedFormat('d F Y') }}
                    </div>
                    
                    <h2 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                        {{ $item->title }}
                    </h2>
                    
                    <p class="text-slate-600 mb-5 text-sm leading-relaxed">
                        {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 120) }}
                    </p>
                    
                    <div class="flex justify-between items-center">
                        <a href="{{ route('admin.news.show', $item->id) }}"
                           class="inline-flex items-center text-blue-600 font-medium hover:text-blue-700 transition-colors duration-200">
                            Baca Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        
                        <span class="text-xs text-slate-500">
                            {{ $item->views }}x dilihat
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-slate-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-xl font-medium text-slate-600 mb-2">Tidak ada berita tersedia</h3>
                <p class="text-slate-500 max-w-md mx-auto">Silakan coba kategori lain atau kunjungi kembali nanti</p>
            </div>
            @endforelse
        </div>

              <!-- Pagination -->
      @if ($news->hasPages())
      <div class="mt-12 flex items-center justify-center">
          <nav class="flex items-center space-x-2">
              {{-- Previous Page Link --}}
              @if ($news->onFirstPage())
                  <span class="px-3 py-1 rounded-md text-gray-400 cursor-not-allowed">
                      &laquo;
                  </span>
              @else
                  <a href="{{ $news->previousPageUrl() }}" class="px-3 py-1 rounded-md bg-white text-blue-600 hover:bg-blue-50 transition-colors">
                      &laquo;
                  </a>
              @endif

              {{-- Pagination Elements --}}
              @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                  @if ($page == $news->currentPage())
                      <span class="px-3 py-1 rounded-md bg-blue-600 text-white font-medium">
                          {{ $page }}
                      </span>
                  @else
                      <a href="{{ $url }}" class="px-3 py-1 rounded-md bg-white text-blue-600 hover:bg-blue-50 transition-colors">
                          {{ $page }}
                      </a>
                  @endif
              @endforeach

              {{-- Next Page Link --}}
              @if ($news->hasMorePages())
                  <a href="{{ $news->nextPageUrl() }}" class="px-3 py-1 rounded-md bg-white text-blue-600 hover:bg-blue-50 transition-colors">
                      &raquo;
                  </a>
              @else
                  <span class="px-3 py-1 rounded-md text-gray-400 cursor-not-allowed">
                      &raquo;
                  </span>
              @endif
          </nav>
      </div>
      @endif
    </div>
</div>
@endsection
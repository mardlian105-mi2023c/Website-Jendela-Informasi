@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        @if ($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-96 object-cover">
        @else
            <img src="https://picsum.photos/800/400?random={{ $news->id }}" alt="Default Image" class="w-full h-96 object-cover">
        @endif

        <div class="p-6">
            <span class="text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded-full inline-block mb-3">
                {{ $news->category->name ?? 'Tanpa Kategori' }}
            </span>
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $news->title }}</h1>
            <div class="text-gray-700 leading-relaxed">
                {!! nl2br(e($news->content)) !!}
            </div>
            <div class="mt-6 text-sm text-gray-500">
                Diposting oleh: <strong>{{ $news->user->name ?? 'Admin' }}</strong> pada {{ $news->created_at->format('d M Y') }}
            </div>

            <!-- Bagian Share -->
            @php
                $shareUrl = urlencode(request()->fullUrl());
                $shareText = urlencode($news->title);
            @endphp

            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-3">🔗 Bagikan Berita:</h3>
                <div class="flex flex-wrap gap-3">

                    <!-- WhatsApp -->
                    <a href="https://api.whatsapp.com/send?text={{ $shareText }}%0A{{ $shareUrl }}"
                       target="_blank"
                       class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                        WhatsApp
                    </a>

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
                       target="_blank"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Facebook
                    </a>

                    <!-- Twitter / X -->
                    <a href="https://twitter.com/intent/tweet?text={{ $shareText }}&url={{ $shareUrl }}"
                       target="_blank"
                       class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-500 transition">
                        Twitter
                    </a>

                    <!-- Telegram -->
                    <a href="https://t.me/share/url?url={{ $shareUrl }}&text={{ $shareText }}"
                       target="_blank"
                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                        Telegram
                    </a>

                    <!-- Copy Link -->
                    <button onclick="navigator.clipboard.writeText('{{ request()->fullUrl() }}'); alert('Link berhasil disalin!')"
                       class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 transition">
                        📋 Salin Link
                    </button>
                </div>
            </div>
            <!-- End Share -->

            <!-- Komentar -->
            <div class="mt-10 border-t pt-6">
                <h3 class="text-xl font-semibold mb-4">Komentar ({{ $news->comments->count() }})</h3>

                @auth
                <form action="{{ route('comments.store', $news) }}" method="POST" class="mb-6">
                    @csrf
                    <textarea name="content" rows="3" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis komentar Anda..." required></textarea>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-2 hover:bg-blue-700 transition">
                        Kirim Komentar
                    </button>
                </form>
                @else
                <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded mb-6">
                    Silakan <a href="{{ route('login') }}" class="text-blue-600 hover:underline">login</a> untuk memberikan komentar.
                </div>
                @endauth

                <div class="space-y-4">
                    @forelse($news->comments as $comment)
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="font-semibold">{{ $comment->user->name }}</span>
                                <span class="text-gray-500 text-sm ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            @if(auth()->id() === $comment->user_id || (auth()->check() && auth()->user()->isAdmin()))
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')">
                                    Hapus
                                </button>
                            </form>
                            @endif
                        </div>
                        <p class="mt-2 text-gray-700">{{ $comment->content }}</p>
                    </div>
                    @empty
                    <div class="text-center text-gray-500 py-4">
                        Belum ada komentar. Jadilah yang pertama berkomentar!
                    </div>
                    @endforelse
                </div>
            </div>
            <!-- End Komentar -->

            <a href="{{ route('news.index') }}" class="mt-6 inline-block text-blue-600 hover:underline">
                ← Kembali ke Daftar Berita
            </a>
        </div>
    </div>
</div>
@endsection

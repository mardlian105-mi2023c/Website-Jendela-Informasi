@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Tentang Kami</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Menghadirkan informasi terkini, akurat, dan mendalam untuk masyarakat modern</p>
        </div>

        <!-- Mission Section -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden mb-16">
            <div class="grid md:grid-cols-2">
                <div class="p-10 md:p-12 lg:p-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Misi Kami</h2>
                    <p class="text-lg text-gray-600 mb-6">Jendela Informasi hadir dengan komitmen untuk menyajikan informasi yang dapat dipercaya, disajikan dengan integritas dan profesionalisme.</p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <p class="ml-3 text-gray-700">Menyampaikan berita dengan akurat dan tepat waktu</p>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <p class="ml-3 text-gray-700">Memberikan analisis mendalam dari berbagai perspektif</p>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <p class="ml-3 text-gray-700">Menjaga independensi dan netralitas dalam pemberitaan</p>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1585829365295-ab7cd400c7e9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Tim Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-2">
                    <img src="https://i.pinimg.com/736x/60/69/b7/6069b78da06830800beacd39e503e269.jpg" alt="Editor in Chief" class="w-full h-72 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900">M. Mardlian Nurofiq</h3>
                        <p class="text-blue-600 mb-3">Admin</p>
                        <p class="text-gray-600">Memimpin redaksi dengan pengalaman 15 tahun di dunia jurnalistik.</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-2">
                    <img src="https://i.pinimg.com/736x/f5/8e/a9/f58ea97fe51761b90aa6897a8b02d031.jpg" alt="Senior Reporter" class="w-full h-72 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900">Ika Cahya</h3>
                        <p class="text-blue-600 mb-3">Senior Reporter</p>
                        <p class="text-gray-600">Spesialis di bidang politik dan hubungan internasional.</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-2">
                    <img src="https://i.pinimg.com/736x/e6/af/29/e6af29443b3536ce95cdf842fc1e4f81.jpg" alt="Tech Editor" class="w-full h-72 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900">Dicky Dippos Sihite</h3>
                        <p class="text-blue-600 mb-3">Tech Editor</p>
                        <p class="text-gray-600">Ahli dalam dunia teknologi dan inovasi digital.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <div class="bg-white rounded-3xl shadow-xl p-10 md:p-12 lg:p-16 mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Nilai-Nilai Kami</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition duration-300">
                    <div class="mx-auto h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Kecepatan</h3>
                    <p class="text-gray-600">Menghadirkan berita terbaru dengan update real-time</p>
                </div>
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition duration-300">
                    <div class="mx-auto h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Akurasi</h3>
                    <p class="text-gray-600">Fakta diverifikasi oleh tim editor sebelum dipublikasikan</p>
                </div>
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition duration-300">
                    <div class="mx-auto h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Kedalaman</h3>
                    <p class="text-gray-600">Analisis mendalam dari berbagai sudut pandang ahli</p>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-slate-900 to-slate-800 shadow-xl rounded-3xl overflow-hidden">
            <div class="grid md:grid-cols-2">
                <div class="p-10 md:p-12 lg:p-16">
                    <h2 class="text-3xl font-bold text-white mb-6">Hubungi Kami</h2>
                    <p class="text-blue-100 mb-6">Kami selalu terbuka untuk masukan, kerjasama, dan informasi dari masyarakat</p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <svg class="h-6 w-6 text-blue-300 flex-shrink-0 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <p class="ml-3 text-blue-100">jendelainformasi@gmail.com</p>
                        </div>
                        <div class="flex items-start">
                            <svg class="h-6 w-6 text-blue-300 flex-shrink-0 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <p class="ml-3 text-blue-100">(021) 1234-5678</p>
                        </div>
                        <div class="flex items-start">
                            <svg class="h-6 w-6 text-blue-300 flex-shrink-0 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <p class="ml-3 text-blue-100">Jl. Nganjuk - Medan Raya No. 27, Nganjuk</p>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
            </div>
        </div>
    </div>
</div>
@endsection
<section class="relative bg-gradient-to-br from-slate-900 to-slate-800 overflow-hidden lg:h-screen lg:flex lg:items-center">
  <!-- Background decorative elements -->
  <div class="absolute inset-0 opacity-20">
    <div class="absolute inset-y-0 left-0 w-1/3 bg-gradient-to-r from-slate-900 to-transparent z-10"></div>
    <div class="absolute top-0 right-0 h-full w-1/2 bg-[url('https://images.unsplash.com/photo-1586339949916-3e9457bef6d3?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center mix-blend-overlay"></div>
  </div>
  
  <div class="relative mx-auto w-full max-w-7xl px-4 py-24 sm:px-6 sm:py-32 md:grid md:grid-cols-2 md:items-center md:gap-12 lg:px-8">
    <div class="max-w-2xl">
      <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl lg:text-6xl">
        <span class="block">Selamat Datang di</span>
        <span class="block bg-gradient-to-r from-amber-400 to-amber-300 bg-clip-text text-transparent">Jendela Informasi</span>
      </h1>
      
      <p class="mt-6 text-lg leading-8 text-slate-300">
        Portal berita terkini yang menyajikan informasi terpercaya seputar hiburan, tren terkini, pendidikan, dan dunia olahraga dengan penyajian yang modern.
      </p>
      
      <div class="mt-10 flex flex-wrap gap-4">
        <a href="{{ route('berita') }}" class="group relative flex items-center rounded-lg bg-amber-500 px-6 py-3.5 font-medium text-slate-900 shadow-lg transition-all hover:bg-amber-400 hover:shadow-xl">
          <span>Baca Berita Yuk!</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
        
        <a href="{{ route('about') }}" class="group relative flex items-center rounded-lg border border-slate-600 px-6 py-3.5 font-medium text-white shadow-lg transition-all hover:border-amber-400 hover:text-amber-400 hover:shadow-xl">
          <span>Tentang Kami</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </a>
      </div>
    </div>
    
    <div class="relative mt-16 md:mt-0">
      <div class="relative mx-auto w-full max-w-md rounded-2xl bg-slate-800/50 backdrop-blur-lg p-1 shadow-2xl ring-1 ring-slate-700/50">
        <div class="rounded-xl bg-gradient-to-br from-slate-800 to-slate-900 p-6">
          <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-amber-400 to-amber-600 text-slate-900">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
              </svg>
            </div>
            <h3 class="text-lg font-semibold text-white">Berita Hari Ini</h3>
          </div>
          
          <div class="mt-6 space-y-4">
            @foreach ($news as $banner => $item)
                <div class="flex items-start gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-700/50 text-amber-400">
                        <span class="text-xs font-bold">{{ $banner + 1 }}</span>
                    </div>
                    <div>
                        <h4 class="font-medium text-white">{{ $item->title }}</h4>
                        <p class="mt-1 text-sm text-slate-400">{{ $item->excerpt ?? Str::limit(strip_tags($item->content), 60) }}</p>
                    </div>
                </div>
            @endforeach
          </div>
          
          <button class="mt-6 w-full rounded-lg bg-slate-700/50 py-2.5 text-sm font-medium text-amber-400 transition hover:bg-slate-700/70">
            Lihat Semua Berita
          </button>
        </div>
      </div>
      
      <!-- Decorative elements -->
      <div class="absolute -left-16 -top-16 h-32 w-32 rounded-full bg-amber-400/10 blur-xl"></div>
      <div class="absolute -right-16 -bottom-16 h-32 w-32 rounded-full bg-amber-400/10 blur-xl"></div>
    </div>
  </div>
</section>
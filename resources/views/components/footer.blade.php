<footer class="bg-gradient-to-br from-slate-900 to-slate-800 shadow-xl">
  <div class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="flex justify-center text-teal-600">
      <span class="ml-2 text-2xl font-bold text-white tracking-tight">Jendela<span class="text-yellow-300">Informasi</span></span>
    </div>

    <p class="mx-auto mt-6 max-w-md text-center leading-relaxed text-white">
      "Menyajikan Berita Terkini dengan Cepat dan Akurat, Karena Anda Berhak Tahu yang Sebenarnya, Bukan Sekadar Sensasi."
    </p>

    <ul class="mt-12 flex flex-wrap justify-center gap-6 md:gap-8 lg:gap-12">
      <li>
        <a class="text-white transition hover:text-gray-700/75" href="/"> Beranda </a>
      </li>
      
      <li>
        <a class="text-white transition hover:text-gray-700/75" href="{{ route('about') }}"> About </a>
      </li>

      <li>
        <a class="text-white transition hover:text-gray-700/75" href="{{ route('berita') }}"> News </a>
      </li>

      <li>
        <a class="text-white transition hover:text-gray-700/75" href="{{ route('chat.index') }}"> Chat </a>
      </li>
    </ul>
  </div>
</footer>
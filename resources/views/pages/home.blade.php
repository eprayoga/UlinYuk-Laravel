<div>
    <!-- Hero Section -->
    <section class="hero">
      <div class="overlay"></div>
      <img src="assets/images/jumbotron.jpg" alt="" />
      <div class="text">
        <div class="tag"># Travel App</div>
        <h1 class="font-semibold">
          We Take Care <br />
          all of Your Trip
        </h1>
        <a href="">
          <div class="btn-explore">Explore now</div>
        </a>
      </div>
    </section>

    <!-- Category -->
    <section class="category">
      <div class="category-list">
        <div class="category-item active">
          <i class="fa-solid fa-fire"></i>
          <span>Populer</span>
        </div>
        @foreach ($kategoris as $kategori)
          <a href="" class="category-item">
            {{-- <i class="fa-solid fa-umbrella-beach"></i> --}}
            <span class="font-medium">{{ $kategori->nama_kategori }}</span>
          </a>
        @endforeach
      </div>
    </section>

    <!-- Wisata -->
    <section class="wisata">
      <div class="wisata-list">
        @php $incrementTravel = 0 @endphp
        @forelse ($travels as $travel)
          @if($travel->tikets->count())
            <a href="{{ route('detail', $travel->slug) }}" class="wisata-item">
              @if($travel->galeris->count())
                <div class="thumbnail">
                  <img src="{{ Storage::url($travel->galeris->first()->foto) }}" />
                </div>
              @else
                <div class="w-full aspect-square rounded-xl bg-gray-300 flex flex-col align-middle justify-center">
                  <i class="fa-regular fa-image text-center text-gray-500 text-9xl"></i>
                  <h3 class="text-gray-500 text-center">Galeri Belum Tersedia</h3>
                </div>
              @endif
              <div class="name">{{ $travel->nama_travel }}</div>
              <div class="address">{{ $travel->regencies->name }}, {{ $travel->provinces->name }}</div>
              <div class="price">Mulai dari Rp {{ $travel->tikets->min('harga') }} <span>/tiket</span></div>
            </a>
          @else
          @endif
        @empty
          <h1 class="text-center w-full text-gray-700">Belum ada data travel</h1>
        @endforelse
      </div>
    </section>
</div>

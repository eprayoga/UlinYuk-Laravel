<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemesanan Tiket {{ $travel->nama_travel }} </title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,400;0,600;0,700;0,800;0,900;1,400;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Fontawesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- CSS -->

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('styles/global-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/checkout.css')}}" />
    <link rel="stylesheet" href="{{ asset('styles/footer.css') }}" />
  </head>

  <body>
    <!-- Navbar -->
    <nav id="nav">
      <div class="nav-container">
        <a href="/" class="nav-brand">
          <img src="{{ asset('assets/icon/logo.svg') }}" />
          <span>UlinYuk</span>
        </a>
      </div>
    </nav>
    <div class="nav-mobile">
      <a href="/" class="active">
        <div class="nav-mobile-button">
          <i class="fa-solid fa-magnifying-glass"></i><span>Explore</span>
        </div>
      </a>
      <a href="/">
        <div class="nav-mobile-button">
          <i class="fa-regular fa-heart"></i><span>Suka</span>
        </div>
      </a>
      <a href="/">
        <div class="nav-mobile-button">
          <i class="fa-regular fa-user"></i><span>Login</span>
        </div>
      </a>
    </div>

    @if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="bg-transparent text-center py-4 lg:px-4">
        <div class="p-2 bg-red-300 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
            <span class="font-semibold mr-2 text-left flex-auto">{{ $error }}</span>
        </div>
        </div>
        @endforeach
    @endif

    <!-- Content -->
    <form action="{{ route("pemesanan.create", $tiket->id) }}" method="post">
        @csrf
        <section class="checkout-detail">
        <div class="order-data">
            <div class="order-data-item">
            <h1>Data Pengunjung</h1>
            <div class="order-data-form">
                <div class="form-input">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="nama_pengunjung" id="name" value="{{ Auth::user()->name }}" />
                </div>
                <div class="grid">
                <div class="form-input">
                    <label for="no_hp">No Handphone </label>
                    <input type="tel" name="nomor_pengunjung" id="no_hp" />
                </div>
                <div class="form-input">
                    <label for="email">Email </label>
                    <input type="email" name="email_pengunjung" id="email" value="{{ Auth::user()->email }}" />
                </div>
                </div>
                <div class="form-input">
                    <label for="name">Permintaan Khusus</label>
                    <textarea rows="4" name="permintaan" id="permintaan" placeholder="Masukkan permintaan khusus anda"></textarea>
                </div>
            </div>
            </div>
        </div>

        <div class="order-data-description">
            <h1>Ringkasan Pesanan</h1>
            <hr />
            <div class="travel-name">{{ $travel->nama_travel }}</div>
            <div class="ticket-desc">
            <img src="{{ Storage::url($travel->galeris->first()->foto) }}" alt="" />
            <span>{{ $tiket->nama_tiket }}</span>
            </div>
            <div class="order">
            <div class="label">Jumlah tamu</div>
            <div class="desc">{{ $dataPesan['visit-number'] }}</div>
            </div>
            <div class="order">
            <div class="label">Tanggal kunjungan</div>
            <div class="desc">{{ $dataPesan['order-date'] }}</div>
            </div>
            <div class="order">
            <div class="label">Harga tiket</div>
            <div class="desc">Rp {{ $tiket->harga }}</div>
            </div>
            <div class="order price">
            <div class="label">Total</div>
            <div class="desc">Rp {{ $tiket->harga * $dataPesan['visit-number'] }}</div>
            </div>
        </div>
        </section>

        <section class="pay-desc">
        <h1>Total Bayar</h1>
        <div class="total-pay-box">
            <p>Total yang harus dibayar</p>
            <div class="total-pay">Rp {{ $tiket->harga * $dataPesan['visit-number'] }}</div>
        </div>
        <input type="hidden" name="jumlah_tiket" value="{{ $dataPesan['visit-number'] }}">
        <input type="hidden" name="total_bayar" value="{{ $tiket->harga * $dataPesan['visit-number'] }}">
        <input type="hidden" name="tanggal_kunjungan" value="{{ $dataPesan['order-date'] }}">
        <input type="hidden" name="status" value="proses">
        <button type="submit" class="btn-pay">Lanjut Bayar</button>
        </section>
    </form>
  </body>
</html>

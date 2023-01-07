@section('title')
    Dashboard
@endsection

@section('content')

<div class="content">
    <h1>Aktivitasmu</h1>
    <div class="row-content">
      <a href="/dashboard/transaction?tab=sukses" class="item-container cursor-pointer hover:scale-105 ease-in duration-300">
        <div class="title">Total pembelian tiket</div>
        <div class="value">Rp {{ $total_pembelian }}</div>
      </a>
      <a href="/dashboard/my-ticket" class="item-container cursor-pointer hover:scale-105 ease-in duration-300">
        <div class="title">Total tiket dibeli</div>
        <div class="value">{{ $total_tiket }}</div>
      </a>
    </div>
    <div class="row-content">
      <a href="/dashboard/transaction?tab=proses" class="item-container cursor-pointer hover:scale-105 ease-in duration-300">
        <div class="cart-icon">
          <i class="fa-solid fa-cart-shopping"></i>
          <span>{{ $transaksi_proses }}</span>
        </div>
      </a>
      <a href="/dashboard/transaction" class="item-container cursor-pointer hover:scale-105 ease-in duration-300">
        <div class="title">Total Transaksi</div>
        <div class="value">{{ $total_transaksi }}</div>
      </a>
    </div>
  </div>

@endsection
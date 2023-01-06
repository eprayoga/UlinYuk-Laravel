@section('title')
    Dashboard
@endsection

@section('content')

<div class="content">
    <h1>Aktivitasmu</h1>
    <div class="row-content">
      <div class="item-container">
        <div class="title">Total pembelian tiket</div>
        <div class="value">Rp {{ $total_pembelian }}</div>
      </div>
      <div class="item-container">
        <div class="title">Total tiket dibeli</div>
        <div class="value">{{ $total_tiket }}</div>
      </div>
    </div>
    <div class="row-content">
      <div class="item-container">
        <div class="cart-icon">
          <i class="fa-solid fa-cart-shopping"></i>
          <span>{{ $transaksi_proses }}</span>
        </div>
      </div>
      <div class="item-container">
        <div class="title">Total Transaksi</div>
        <div class="value">{{ $total_transaksi }}</div>
      </div>
    </div>
  </div>

@endsection
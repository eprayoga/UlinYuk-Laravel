@section('title')
    Deskripsi Travel {{ $travel->nama_travel }}
@endsection

@section('content')

<div class="container px-6 mx-auto grid">
  <h2
    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
  >
    Deskripsi Travel
  </h2>

  <div
    class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
  >
    <form action="{{ route('agen.deskripsi.travel.update') }}" method="POST" class="w-full" enctype="multipart/form-data">
      @csrf
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full .min-w-full md:w-2/4 px-3 mb-6 md:mb-0">
          <label class="text-gray-700 dark:text-gray-400" for="nama_travel">
            Nama Travel
          </label>
          <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $travel->nama_travel }}" name="nama_travel" id="nama_travel" type="text" placeholder="Masukkan Nama Wisata">
          {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
        </div>
        <div class="w-full md:w-1/4 px-3">
          <label class="text-gray-700 dark:text-gray-400" for="kategori">
            Kategori
          </label>
          <div class="relative">
              <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="id_kategori" id="kategori">
                @foreach ($kategoris as $kategori)
                  <option value="{{ $kategori->id }}" {{ $travel->id_kategori == $kategori->id ? "selected" : "" }}>{{ $kategori->nama_kategori }}</option>
                @endforeach
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
              </div>
              </div>
        </div>
        <div class="w-full md:w-1/4 px-3">
          <label class="text-gray-700 dark:text-gray-400" for="status">
            Status
          </label>
          <div class="relative">
              <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="status" id="status">
                  <option {{ $travel->status == 1 ? "selected" : "" }} value="1">Aktif</option>
                  <option {{ $travel->status == 0 ? "selected" : "" }} value="0">Non Aktif</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
              </div>
              </div>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="text-gray-700 dark:text-gray-400" for="deskripsi">
            Deskripsi
          </label>
          <textarea rows="4" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="deskripsi" name="deskripsi">{{ $travel->deskripsi }}</textarea>
          <p class="text-gray-600 text-xs italic">Masukkan Deskripsi Travel sesuai yang anda butuhkan</p>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6 mt-10">
          <div class="w-full px-3 flex justify-end">
              <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                  Simpan Perubahan
              </button>
          </div>
      </div>
  </form>
</div>

  <h2
    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
  >
    Ubah Alamat Travel
  </h2>

  <div
    class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
  >
    <form action="{{ route('agen.deskripsi.travel.update') }}" method="POST" class="w-full" enctype="multipart/form-data" id="locations">
      @csrf
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="text-gray-700 dark:text-gray-400" for="alamat">
            Alamat
          </label>
          <textarea rows="3" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="alamat" name="alamat" type="text">{{ $travel->alamat }}</textarea>
          <p class="text-gray-600 text-xs italic">Masukkan alamat lengkap wisata</p>
      </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
          <label class="text-gray-700 dark:text-gray-400" for="provinsi">
            Provinsi
          </label>
          <div class="relative">
            <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="provinsi" name="provinces_id" v-if="provinces" v-model="provinces_id">
              <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
          <label class="text-gray-700 dark:text-gray-400" for="kabupaten">
            Kabupaten / Kota
          </label>
          <div class="relative">
            <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="kabupaten" name="regencies_id" v-if="regencies" v-model="regencies_id">
              <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
          <label class="text-gray-700 dark:text-gray-400" for="kecamatan">
            Kecamatan
          </label>
          <div class="relative">
            <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="kecamatan" name="districts_id" v-if="districts" v-model="districts_id">
              <option v-for="district in districts" :value="district.id">@{{ district.name }}</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
          <label class="text-gray-700 dark:text-gray-400" for="grid-state">
            Kelurahan / Desa
          </label>
          <div class="relative">
            <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="desa" name="villages_id" v-if="villages" v-model="villages_id">
              <option v-for="village in villages" :value="village.id">@{{ village.name }}</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
          </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="text-gray-700 dark:text-gray-400" for="gmap_link">
              Link Google Maps
            </label>
            <input rows="3" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $travel->gmap_link }}" id="gmap_link" name="gmap_link" type="text" />
            <p class="text-gray-600 text-xs italic">Salin Link dari Google Maps</p>
        </div>
      </div>
      <input value="{{ $travel->nama_travel }}" name="nama_travel" id="nama_travel" type="hidden" placeholder="Masukkan Nama Wisata">
      <div class="flex flex-wrap -mx-3 mb-6 mt-10">
          <div class="w-full px-3 flex justify-end">
              <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                  Simpan Perubahan
              </button>
          </div>
      </div>
  </form>

@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          districts: null,
          villages: null,
          provinces_id: null,
          regencies_id: null,
          districts_id: null,
          villages_id: null
        },
        methods: {
          getProvincesData() {
            var self = this;
            axios.get('{{ route('api-provinces') }}')
              .then(function(response){
                self.provinces = response.data;
              })
          },
          getRegenciesData() {
            var self = this;
            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
              .then(function(response){
                self.regencies = response.data;
              })
          },
          getDistrictsData() {
            var self = this;
            axios.get('{{ url('api/districts') }}/' + self.regencies_id)
              .then(function(response){
                self.districts = response.data;
              })
          },
          getVillagesData() {
            var self = this;
            axios.get('{{ url('api/villages') }}/' + self.districts_id)
              .then(function(response){
                self.villages = response.data;
              })
          },
        },
        watch : {
          provinces_id: function(val, oldVal) {
            this.regencies_id = null;
            this.regencies = null;
            this.districts_id = null;
            this.districts = null;
            this.villages_id = null;
            this.villages = null;
            this.getRegenciesData();
          },
          regencies_id: function(val, oldVal) {
            this.districts_id = null;
            this.districts = null;
            this.villages_id = null;
            this.villages = null;
            this.getDistrictsData();
          },
          districts_id: function(val, oldVal) {
            this.villages_id = null;
            this.villages = null;
            this.getVillagesData();
          },
        }
      });
    </script>
@endpush
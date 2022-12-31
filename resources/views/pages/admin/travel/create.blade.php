@extends('layouts.admin.dashboard')

@section('title')
    Admin Tambah Travel
@endsection

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center font-sans overflow-hidden py-5">
                    <div class="w-full lg:w-5/6">

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

                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                            Form Tambah Data Travel
                        </h1>
                        <div class="bg-white shadow-md rounded my-6 py-5 px-5 flex justify-center">
                            <form action="{{ route('admin.data.travel.store') }}" method="POST" class="w-full" enctype="multipart/form-data" id="locations">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                  <div class="w-full .min-w-full md:w-2/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nama_travel">
                                      Nama Travel
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="nama_travel" id="nama_travel" type="text" placeholder="Masukkan Nama Wisata">
                                    {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
                                  </div>
                                  <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="kategori">
                                      Kategori
                                    </label>
                                    <div class="relative">
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="id_kategori" id="kategori">
                                          @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                          @endforeach
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                        </div>
                                  </div>
                                  <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="status">
                                      Status
                                    </label>
                                    <div class="relative">
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="status" id="status">
                                            <option value="1">Aktif</option>
                                            <option value="0">Non Aktif</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                        </div>
                                  </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                  <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="deskripsi">
                                      Deskripsi
                                    </label>
                                    <textarea rows="4" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="deskripsi" name="deskripsi"></textarea>
                                    <p class="text-gray-600 text-xs italic">Masukkan Deskripsi Travel sesuai yang anda butuhkan</p>
                                  </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                  <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="alamat">
                                      Alamat
                                    </label>
                                    <textarea rows="3" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="alamat" name="alamat" type="text"></textarea>
                                    <p class="text-gray-600 text-xs italic">Masukkan alamat lengkap wisata</p>
                                </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                  <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="provinsi">
                                      Provinsi
                                    </label>
                                    <div class="relative">
                                      <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="provinsi" name="provinces_id" v-if="provinces" v-model="provinces_id">
                                        <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                                      </select>
                                      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="kabupaten">
                                      Kabupaten / Kota
                                    </label>
                                    <div class="relative">
                                      <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="kabupaten" name="regencies_id" v-if="regencies" v-model="regencies_id">
                                        <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                                      </select>
                                      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="kecamatan">
                                      Kecamatan
                                    </label>
                                    <div class="relative">
                                      <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="kecamatan" name="districts_id" v-if="districts" v-model="districts_id">
                                        <option v-for="district in districts" :value="district.id">@{{ district.name }}</option>
                                      </select>
                                      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                      Kelurahan / Desa
                                    </label>
                                    <div class="relative">
                                      <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="desa" name="villages_id" v-if="villages" v-model="villages_id">
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
                                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="gmap_link">
                                        Link Google Maps
                                      </label>
                                      <input rows="3" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="gmap_link" name="gmap_link" type="text" />
                                      <p class="text-gray-600 text-xs italic">Salin Link dari Google Maps</p>
                                  </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6 mt-10">
                                    <div class="w-full px-3 flex justify-end">
                                        <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                                            Simpan Data
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
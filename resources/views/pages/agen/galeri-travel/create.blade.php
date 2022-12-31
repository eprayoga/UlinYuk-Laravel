@extends('layouts.agen.dashboard')

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
                            Tambah Data Foto Travel
                        </h1>
                        <div class="bg-white shadow-md rounded my-6 py-5 px-5 flex justify-center">
                            <form action="{{ route('agen.galeri.travel.store') }}" method="POST" class="w-full" enctype="multipart/form-data" id="locations">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                  <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="foto">
                                      Foto
                                    </label>
                                    <span class="sr-only">Choose File</span>
                                    <input name="foto" type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                                    <p class="text-gray-600 text-xs italic">Pilih file foto</p>
                                </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6 mt-10">
                                    <div class="w-full px-3 flex justify-end">
                                        <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                                            Simpan Foto
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
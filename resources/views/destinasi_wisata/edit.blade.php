@extends('layouts.main')

@section('container')
<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">Edit Destinasi Wisata</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Destinasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>
    </div>

    <div class="row">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Destinasi Wisata</h4>
                </div>

                <form action="{{ route('destinasi-wisata.update', ['id' => $destinasiWisata->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="form-group col-12">
                        <label for="nama">Nama Destinasi Wisata</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $destinasiWisata->nama }}" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $destinasiWisata->alamat }}"
                            required>
                    </div>
                    <div class="form-group col-12">
                        <label for="latitude">Latitude</label>
                        <input type="text" name="latitude" id="latitude" class="form-control" value="{{ $destinasiWisata->latitude }}"
                         readonly   required>
                    </div>
                    <div class="form-group col-12">
                        <label for="longitude">Longitude</label>
                        <input type="text" name="longitude" id="longitude" class="form-control"
                         readonly   value="{{ $destinasiWisata->longitude }}" required>
                    </div>
                
                    <div class="form-group col-12">
                        <label for="HargaTiket">Harga Tiket</label>
                        <input type="text" name="HargaTiket" id="HargaTiket" class="form-control"
                            value="{{ $destinasiWisata->HargaTiket }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="FasilitasDestinasi">Fasilitas Destinasi</label>
                        <input type="text" name="FasilitasDestinasi" id="FasilitasDestinasi" class="form-control"
                            value="{{ $destinasiWisata->FasilitasDestinasi }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="JamBuka">Jam Buka</label>
                        <input type="text" name="JamBuka" id="JamBuka" class="form-control" value="{{ $destinasiWisata->JamBuka }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="Deskripsi">Deskripsi</label>
                        <textarea name="Deskripsi" id="Deskripsi" class="form-control">{{ $destinasiWisata->Deskripsi }}</textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="Sejarah">Sejarah</label>
                        <textarea name="Sejarah" id="Sejarah" class="form-control">{{ $destinasiWisata->Sejarah }}</textarea>
                    </div>
                
                    <div class="form-group col-12">
                        <label for="sampul">Sampul Baru</label>
                        <input type="file" name="sampul" id="sampul" class="form-control-file">
                        <small class="form-text text-muted">Unggah gambar sampul baru (jpeg, png, jpg, gif)</small>
                    </div>
                
                    <div class="form-group col-12">
                        <label for="sampul_lama">Sampul Lama</label>
                        @if ($destinasiWisata->sampul)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $destinasiWisata->sampul) }}" alt="Sampul Lama" class="img-fluid" style="max-height: 200px;">
                        </div>
                        @else
                        <p>Tidak ada sampul lama.</p>
                        @endif
                    </div>
                
                    <div class="form-group col-12">
                        <label for="gambar">Gambar Baru</label>
                        <input type="file" name="gambar[]" id="gambar" class="form-control-file" multiple>
                        <small class="form-text text-muted">Unggah gambar baru (jpeg, png, jpg, gif)</small>
                    </div>
                    <div class="form-group col-12">
                        <label for="gambar_lama">Gambar Lama</label>
                        @if ($destinasiWisata->gambar)
                        <div class="row">
                            @foreach (json_decode($destinasiWisata->gambar) as $imagePath)
                            <div class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0">
                                <img src="{{ asset('storage/' . $imagePath) }}" alt="Gambar Lama" class="img-fluid" style="max-height: 200px;">
                            </div>
                            @endforeach
                        </div>

                        @else
                        <p>Tidak ada gambar lama.</p>
                        @endif
                    </div>
                    
                </div>
                
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <div id="map" style="height: 400px; margin-top: 20px;"></div>
                </div>
            </div>
    </div>
</div>


<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    var map;
        var marker;
        var initialLatitude = {{ $destinasiWisata->latitude }};
        var initialLongitude = {{ $destinasiWisata->longitude }};
    
        function initMap() {
            map = L.map('map').setView([initialLatitude, initialLongitude], 13);
    
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    
            marker = L.marker([initialLatitude, initialLongitude], {
                draggable: true
            }).addTo(map);
    
            map.on('click', function(event) {
                marker.setLatLng(event.latlng);
                fillLatitudeLongitudeInputs(event.latlng.lat, event.latlng.lng);
            });
    
            document.getElementById('alamat').addEventListener('input', function() {
                var keyword = this.value.trim();
                if (keyword) {
                    geocodeAlamat(keyword);
                } else {
                    marker.setLatLng([initialLatitude, initialLongitude]);
                    map.setView([initialLatitude, initialLongitude], 13);
                    fillLatitudeLongitudeInputs(initialLatitude, initialLongitude);
                }
            });
        }
    
        function fillLatitudeLongitudeInputs(latitude, longitude) {
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
        }
    
        document.addEventListener('DOMContentLoaded', function() {
            initMap();
        });
</script>


@endsection


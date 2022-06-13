@extends('components.main')
@section('content')
    <div class="row" id="peta">
        <div class="col">
            <div id="map" class="%" style="width: 100vw; height: 100vh;z-index:;"></div>
            <div id="map" class="%" style=""></div>
        </div>
    </div>
@endsection

@section('afterscript')
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
    <script>
        var map = L.map('map').setView([-3.5104, 140.154], 8);
        L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/Specialty/DeLorme_World_Base_Map/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);


        var placeIcon = L.icon({
            iconUrl: '/images/place.png',
            iconSize: [40, 40], // size of the icon
        });

        @if ($seasons->count() > 0)
            @foreach ($seasons as $season)
                    marker = new L.marker([{{ $season->latitude }}, {{ $season->longitude }}], {
                        icon: placeIcon
                    }).addTo(map)
                .bindPopup(
                    `Distrik : {{ $season->district->district_name }} | Kab : {{ $season->kabupaten }} <br>
                    Bulan : @if($season->bulan=06) Juni @endif {{ $season->tahun }} <br>
				Musim : {{ $season->season }} <br>
				Keterangan : {{ $season->remark }} <br>
        
                <div class="demo-gallery">
                    <div id="lightgallery">
                            @if ($season->gambar1)
                            <a href="{{ asset("storage/$season->gambar1") }}">
                                <img src="{{ asset("storage/$season->gambar1") }}" alt="" class="img-thumbnail" width="50" height="500" >
                            </a>
                            @endif
                            @if ($season->gambar1)
                            <a href="{{ asset("storage/$season->gambar2") }}">
                                <img src="{{ asset("storage/$season->gambar2") }}" alt="" class="img-thumbnail" width="50" height="500" >
                            </a>
                            @endif
                            @if ($season->gambar3)
                            <a href="{{ asset("storage/$season->gambar3") }}">
                                <img src="{{ asset("storage/$season->gambar3") }}" alt="" class="img-thumbnail" width="50" height="500" >
                            </a>
                            @endif
                            @if ($season->gambar4)
                            <a href="{{ asset("storage/$season->gambar4") }}">
                                <img src="{{ asset("storage/$season->gambar4") ?? '' }}" alt="" class="img-thumbnail" width="50" height="500" >
                            </a>
                            @endif
                    </div>
			    </div>

                `);
            @endforeach
        @endif

        window.addEventListener('resize',
            () => map.getViewPort().resize());

            lightGallery(document.getElementById('lightgallery'));
    </script>

@endsection

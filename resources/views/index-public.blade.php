@extends('layouts.template') <!-- Memanggil template -->

@section('style')
<style>
    html,
    body {
        height: 100%;
        width: 100%;
    }

    #map {
        height: calc(100vh - 56px);
        width: 100%;
        margin: 0;
    }

    #credit {
        position: fixed;
        bottom: 10px;
        left: 10px;
        font-size: 12px;
        background-color: white;
        padding: 5px;
        border-radius: 5px;
        opacity: 0.7;
    }
</style>
@endsection

@section('content')
<div id="map" style="width: 100vw; height: 90vh;"></div>

@endsection

<div id="credit">Dibuat Oleh Asmarina Nurjanah</div> <!-- Tambahkan nama di sini -->

@section('script')

<script>
    // Map
    var map = L.map('map').setView([-7.5333, 110.6000], 12);

    // Basemap World Imagery with Labels
    var basemapWorldImageryLabels = L.tileLayer('https://services.arcgisonline.com/arcgis/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri'
    });

    var basemapImageryLabels = L.tileLayer('https://services.arcgisonline.com/arcgis/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Labels &copy; Esri &mdash; Source: Esri'
    });

    // Gabungkan basemap dan labels
    var baseMaps = {
        "World Imagery with Labels": L.layerGroup([basemapWorldImageryLabels, basemapImageryLabels]),
        "OpenStreetMap": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        })
    };

    // Tambahkan layer control untuk basemap
    L.control.layers(baseMaps).addTo(map);

    // Set basemap default
    baseMaps["World Imagery with Labels"].addTo(map);

    /* Load GeoJSON */
    fetch('storage/geojson/boyolali_kec.geojson')
        .then(response => response.json())
        .then(data => {
            L.geoJSON(data, {
                style: function (feature) {
                    return {
                        opacity: 1,
                        color: "black",
                        weight: 0.5,
                        fillOpacity: 0.7,
                        fillColor: "#FF5733", // Warna yang dipilih (misalnya, oranye)
                    };
                },
                onEachFeature: function (feature, layer) {
                    var content = "Kecamatan: " + feature.properties.WADMKC;
                    layer.on({
                        click: function (e) {
                            // Fungsi ketika objek diklik
                            layer.bindPopup(content).openPopup();
                        },
                        mouseover: function (e) {
                            // Tidak ada perubahan warna saat mouse over
                            layer.bindPopup("Kecamatan " + feature.properties.WADMKC, {
                                sticky: false
                            }).openPopup();
                        },
                        mouseout: function (e) {
                            // Fungsi ketika mouse keluar dari objek
                            layer.resetStyle(e.target); // Mengembalikan gaya garis ke gaya awal
                            map.closePopup(); // Menutup popup
                        },
                    });
                }
            }).addTo(map);
        })
        .catch(error => {
            console.error('Error loading the GeoJSON file:', error);
        });


    /* GeoJSON Point ke Peta*/
    var point = L.geoJson(null, {
        onEachFeature: function (feature, layer) {
            var popupContent = "Nama: " + feature.properties.name + "<br>" +
                "Deskripsi: " + feature.properties.description + "<br>" +
                "Foto: <img src='{{ asset('storage/images') }}/" + feature.properties.image + "' class='img-thumbnail' alt=''>" +
                "<br>";

            layer.on({
                click: function (e) {
                    point.bindPopup(popupContent);
                },
                mouseover: function (e) {
                    point.bindTooltip(feature.properties.name);
                },
            });
        },
    });
    $.getJSON("{{ route('api.points') }}", function (data) {
        point.addData(data);
        map.addLayer(point);
    });

</script>
@endsection
@extends('layouts.template') <!-- Memanggil template -->

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
<!-- Masukkan stylesheet Leaflet Geocoder -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

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

<!-- Modal Create Point-->
<div class="modal fade" id="PointModal" tabindex="-1" aria-labelledby="PointModalLabel" aria-hidden="true">
  <!-- id="exampleModal" berfungsi untuk memanggil modal supaya tertampil -->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-map-location-dot"></i> Buat Titik
          Lokasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('store-point') }}" method="POST" enctype="multipart/form-data">
          <!-- csrf sebagai security -->
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama Lokasi</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Tambahkan Nama Titik Lokasi">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="geometry" class="form-label">Geometri</label>
            <textarea class="form-control" id="geom_point" name="geom" rows="3" readonly></textarea>
          </div>

          <!--image-->
          <div class="mb-3">
            <label for="image" class="form-label">Foto</label>
            <input type="file" class="form-control" id="image_geom" name="image"
              onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])"></input>
          </div>

          <!--preview image-->
          <div class="mb-3">
            <img src="" alt="Preview" id="preview-image-point" class="img-thumbnail" width="400">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection

<div id="credit">Created by Asmarina Nurjanah</div> <!-- Tambahkan nama di sini -->

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
<script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>
<!-- Masukkan script Leaflet Geocoder -->
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAN3I1NwKYl1SU-QeeT5rUDo7l1R52wdo&libraries=places"></script>


<script>
  // Fungsi pencarian lokasi
  function searchLocation() {
    var query = document.getElementById('location-input').value;

    var geocoder = new google.maps.Geocoder();

    geocoder.geocode({
      'address': query
    }, function (results, status) {
      if (status === 'OK') {
        var location = results[0].geometry.location;
        var lat = location.lat();
        var lng = location.lng();

        // Zoom ke lokasi yang ditemukan
        map.setView([lat, lng], 15);

        // Tambahkan marker ke lokasi
        var marker = L.marker([lat, lng]).addTo(map);
        marker.bindPopup(query).openPopup();
      } else {
        alert('Pencarian lokasi tidak berhasil: ' + status);
      }
    });
  }

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
  baseMaps["OpenStreetMap"].addTo(map);

  // Inisialisasi geocoder
  var geocoder = L.Control.geocoder({
    defaultMarkGeocode: false
  }).addTo(map);

  geocoder.on('markgeocode', function (e) {
    map.setView(e.geocode.center, 15);
    L.marker(e.geocode.center).addTo(map).bindPopup(e.geocode.name).openPopup();
  });

  // Inisialisasi Autocomplete
  var input = document.getElementById('location-input');
  var autocomplete = new google.maps.places.Autocomplete(input);

  // Setel agar autocomplete hanya mencari lokasi di Indonesia
  autocomplete.setComponentRestrictions({ 'country': ['id'] });

  // Event listener untuk memilih lokasi dari autocomplete
  autocomplete.addListener('place_changed', function () {
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Tidak ada detail yang tersedia untuk input: '" + place.name + "'");
      return;
    }

    var latlng = {
      lat: place.geometry.location.lat(),
      lng: place.geometry.location.lng()
    };

    addMarker(latlng, place.name);
    map.setView(latlng, 15);
  });

  // Menambahkan marker untuk Pasar Tradisional di Boyolali
  var pasarTradisionalBoyolali = {
    name: "Pasar Kota Boyolali",
    latlng: [-7.300067, 110.629659],
    name: "Pasar Pengkol",
    latlng: [-7.550327, 110.544627],
    name: "Pasar Sunggingan Baru",
    latlng: [-7.520033, 110.597554],
    name: "Pasar Mojosongo Boyolali",
    latlng: [-7.535983, 110.627984],
    name: "Pasar Mangu",
    latlng: [-7.508983, 110.745654],
    name: "Pasar Tradisional Tumang",
    latlng: [-7.493188, 110.524194],
    name: "Pasar Plandakan",
    latlng: [-7.564059, 110.569324],
    name: "Pasar Pengging",
    latlng: [-7.553533, 110.681505],
    name: "Pasar Baru Sidodadi",
    latlng: [-7.543811, 110.601758],
    name: "Pasar Kebon Agung",
    latlng: [-7.508344, 110.745953],
    name: "Pasar Pasekan Mudal Boyolali",
    latlng: [-7.504654, 110.616606],
    name: "Pasar Tradisional Tlangu Ketitang Nogosari Boyolali",
    latlng: [-7.470263, 110.773065],
    name: "Pasar Ngangkruk",
    latlng: [-7.58174, 110.596342],
    name: "Pasar Sayur Cepogo",
    latlng: [-7.512137, 110.514972],
    name: "Pasar Umum Selo",
    latlng: [-7.499293, 110.470979],
    name: "Pasar Tradisional Ngegot",
    latlng: [-7.353753, 110.732907],
    name: "Pasar Tradisional Mongkrong/Pasar Ngudang",
    latlng: [-7.32049, 110.632387],
    name: "Pasar Lemahireng",
    latlng: [-7.46573, 110.720767],

  };

  addMarker(pasarTradisionalBoyolali.latlng, pasarTradisionalBoyolali.name);

  function searchLocation() {
    var query = document.getElementById('location-input').value;
    geocoder.geocode(query, function (results) {
      if (results.length > 0) {
        var latlng = results[0].center;
        L.marker(latlng).addTo(map).bindPopup(results[0].name).openPopup();
        map.setView(latlng, 15);
      } else {
        alert('Pencarian lokasi tidak berhasil.');
      }
    });
  }

  function addMarker(latlng, name) {
    var marker = L.marker(latlng).addTo(map);
    marker.bindPopup(name).openPopup();
  }
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


  /* GeoJSON Point */
  var point = L.geoJson(null, {
    onEachFeature: function (feature, layer) {
      var popupContent = "Nama: " + feature.properties.name + "<br>" +
        "Deskripsi: " + feature.properties.description + "<br>" +
        "Foto: <img src='{{ asset('storage/images/') }}/" + feature
          .properties.image +
        "'class='img-thumbnail' alt='...'>" + "<br>" +

        "<div class='d-flex flex-row mt-3'>" +

        "<a href='{{ url('edit-point') }}/" + feature.properties
          .id +
        "' class='btn btn-warning me-2'><i class='fa-solid fa-pen-to-square'></i></a>" +

        "<form action='{{ url('delete-point') }}/" + feature
          .properties.id + "' method='POST'>" +
        '{{ csrf_field() }}' +
        '{{ method_field('DELETE') }}' +

        "<button type='submit' class='btn btn-danger' onclick='return confirm(Yakin Anda akan menghapus data ini?)'><i class='fa-solid fa-trash-can'></i></button>"

      "</form>"

      "</div>"

        ;
      layer.on({
        click: function (e) {
          point.bindPopup(popupContent);
        },
        mouseover: function (e) {
          point.bindTooltip(feature.properties
            .name);
        },
      });
    },
  });
  $.getJSON("{{ route('api.points') }}", function(data) {
    point.addData(data);
    map.addLayer(point);
  });


  /* Digitize Function */
  var drawnItems = new L.FeatureGroup();
  map.addLayer(drawnItems);

  var drawControl = new L.Control.Draw({
    draw: {
      position: 'topleft',
      polyline: false,
      polygon: false,
      rectangle: false,
      circle: false,
      marker: true,
      circlemarker: false
    },
    edit: false
  });

  map.addControl(drawControl);

  map.on('draw:created', function (e) {
    var type = e.layerType,
      layer = e.layer;

    console.log(type);

    var drawnJSONObject = layer.toGeoJSON(); // Convert layer to GeoJSON
    var objectGeometry = Terraformer.WKT.convert(drawnJSONObject.geometry); // Convert GeoJSON to WKT

    console.log(drawnJSONObject);
    console.log(objectGeometry);

    if (type === 'polyline') {
      console.log("Create " + type);
      // Set value geometry to input geom
      $("#geom_polyline").val(objectGeometry);

      // Show modal polyline
      $("#PolylineModal").modal('show');

    } else if (type === 'polygon' || type === 'rectangle') {
      console.log("Create " + type);
      // Set value geometry to input geom
      $("#geom_polygon").val(objectGeometry);

      // Show modal polygon
      $("#PolygonModal").modal('show');

    } else if (type === 'marker') {
      // Set value geometry to input geom
      $("#geom_point").val(objectGeometry);

      // Show modal point
      $("#PointModal").modal('show');
    } else {
      console.log('__undefined__');
    }

    drawnItems.addLayer(layer);
  });

  // Measure control
  L.control.measure({
    primaryLengthUnit: 'meters',
    secondaryLengthUnit: 'kilometers',
    primaryAreaUnit: 'sqmeters',
    secondaryAreaUnit: 'hectares',
    position: 'bottomleft' // Posisi kontrol di kiri bawah
  }).addTo(map);

  // Fungsi pencarian lokasi
  function searchLocation() {
    var query = document.getElementById('location-input').value;

    var geocoder = new google.maps.Geocoder();

    geocoder.geocode({
      'address': query
    }, function (results, status) {
      if (status === 'OK') {
        var location = results[0].geometry.location;
        var lat = location.lat();
        var lng = location.lng();

        // Atur peta untuk menunjukkan lokasi yang ditemukan
        map.setView([lat, lng], 15);

        // Tambahkan marker ke lokasi
        var marker = L.marker([lat, lng]).addTo(map);
        marker.bindPopup(query).openPopup();
      } else {
        alert('Pencarian lokasi tidak berhasil: ' + status);
      }
    });
  }

  /* GeoJSON Point ke Peta*/
  var point = L.geoJson(null, {
    onEachFeature: function (feature, layer) {
      var popupContent = "Nama: " + feature.properties.name + "<br>" +
        "Deskripsi: " + feature.properties.description + "<br>" +
        "Foto: <img src='{{ asset('storage/images') }}/" + feature.properties.image + "' class='img-thumbnail' alt=''>" +
        "<br>" + "<div class='d-flex flew-row mt-2'>" +
        "<a href='{{ url('edit-point') }}/" + feature.properties.id + "' class='btn btn-warning me-2'><i class='fa-solid fa-pen-to-square'></i></a>" +

        /* button delete*/
        "<form action='{{ url('delete-point') }}/" + feature.properties.id + "' method='POST'>" +
        '{{ csrf_field() }}' +
        '{{ method_field('DELETE') }}' +
        "<button type='submit' class='btn btn-danger btn-sm' onclick='confirm(`Yakin Menghapus Data Ini?`)'><i class='fa-solid fa-trash-can'></i></button>" +
        "</form>" +

        "</div>";


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
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-custom text-xl text-gray-800 dark:text-gray-200 leading-tight text-center"
      style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
      <i class="fa-solid fa-shop"></i> {{ __('Info Seputar Jumlah Pasar Tradisional di Boyolali') }} <i
        class="fa-solid fa-shop"></i>
    </h2>
  </x-slot>

  <style>
    .font-custom {
      font-family: "Verdana", sans-serif;
    }

    .background-image {
      background-image: url('{{ asset("storage/images/psr-transformed.jpeg") }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 650px;
      position: relative;
      overflow: hidden;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.7) 100%);
      z-index: 1;
      opacity: 0;
      transition: opacity 0.3s ease-in-out;
    }

    .card:hover .overlay {
      opacity: 1;
    }

    .card:hover img {
      transform: scale(1.1);
    }

    .card:hover .card-body {
      transform: translateY(-20px);
    }

    .shadow-effect {
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .content {
      padding-top: 50px;
      /* Adjust as needed */
      padding-bottom: 50px;
      /* Adjust as needed */
    }
  </style>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');

    .card {
      position: relative;
      overflow: hidden;
    }

    .card-title {
      font-family: 'Great Vibes', cursive;
      font-size: 2.5em;
      color: #FFFFFF;
      /* Warna teks putih */
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      /* Bayangan teks */
      text-align: center;
      margin: 0;
      position: absolute;
      top: 20px;
      /* Jarak dari atas gambar */
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      background: rgba(0, 0, 0, 0.5);
      /* Latar belakang semi transparan */
      padding: 10px 0;
      /* Padding atas dan bawah */
    }

    .card-body {
      text-align: center;
      padding: 20px;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .card:hover .overlay {
      opacity: 1;
    }
  </style>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');

    .col-md-4 {
      display: flex;
      flex-direction: column;
    }

    .card {
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      height: 100%;
      /* Menetapkan tinggi penuh untuk kartu */
    }

    .card-img-top {
      width: 100%;
      height: 200px;
      /* Menetapkan tinggi yang sama untuk semua gambar */
      object-fit: cover;
      /* Memastikan gambar diubah ukurannya dengan benar */
    }

    .card-title {
      font-family: 'Great Vibes', cursive;
      font-size: 2.5em;
      color: #FFFFFF;
      /* Warna teks putih */
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      /* Bayangan teks */
      text-align: center;
      margin: 0;
      position: absolute;
      top: 20px;
      /* Jarak dari atas gambar */
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      background: rgba(0, 0, 0, 0.5);
      /* Latar belakang semi transparan */
      padding: 10px 0;
      /* Padding atas dan bawah */
    }

    .card-body {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 20px;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .card:hover .overlay {
      opacity: 1;
    }
  </style>

  <div class="background-image">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-8 text-center text-white">
          <div class="alert alert-warning mt-5" role="alert">
            <h4><i class="fas fa-map-marker-alt"></i> Jumlah Titik Pasar Tradisional</h4>
            <p class="display-4">{{ $total_points }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="{{ asset('storage/images/guwo-transformed.jpeg') }}" class="card-img-top" alt="Pasar Guwo Kemusu">
            <div class="overlay"></div>
            <div class="card-body">
              <h5 class="card-title text-center">Pasar Guwo Kemusu</h5>
              <p class="blog-post-meta card-text text-center">
                Pasar Guwo Kemusu di Boyolali merupakan salah satu destinasi
                wisata kuliner yang terkenal karena menyajikan beragam makanan tradisional Jawa yang khas.
                Terletak di kawasan Kampung Wisata Baru, pasar ini menawarkan pengalaman unik dalam
                menikmati kuliner lawas dengan suasana tradisional yang autentik.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="{{ asset('storage/images/Ngatpaingan.jpeg') }}" class="card-img-top" alt="Pasar Ngatpaingan">
            <div class="overlay"></div>
            <div class="card-body">
              <h5 class="card-title text-center">Pasar Ngatpaingan</h5>
              <p class="card-text text-center">Seperti namanya, Pasar Ngatpaingan hanya buka setiap selapan
                atau 35 hari sekali dalam penanggalan Jawa. Di sini pengunjung dapat menemukan berbagai
                jajanan tradisional dan oleh-oleh khas Boyolali.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="{{ asset('storage/images/Pengging-transformed.webp') }}" class="card-img-top"
              alt="Pasar Pengging">
            <div class="overlay"></div>
            <div class="card-body">
              <h5 class="card-title text-center">Pasar Pengging</h5>
              <p class="card-text text-center">Pasar Pengging merupakan salah satu pasar tradisional di
                Boyolali yang sedang dalam tahap pemindahan ke daerah baru untuk memperbaiki
                keberlangsungannya.</p>
            </div>
          </div>
        </div>
      </div>

      <hr class="mt-5">

      <div class="row justify-content-center">
        <div class="col-md-6 text-center">
          <p>Anda login sebagai <b>{{ Auth::user()->name }}</b> dengan <i>{{ Auth::user()->email }}</i></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
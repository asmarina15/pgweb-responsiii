<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-2xl md:text-3xl lg:text-4xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            <i class="fa-solid fa-store"></i>
            {{ __('AYO MENJELAJAHI KULINER DI PASAR TRADISIONAL BOYOLALI') }}
            <i class="fa-solid fa-store"></i>
        </h2>
    </x-slot>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="auto">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />

        <meta name="generator" content="Hugo 0.118.2" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous" />
        <!-- Font Awesome CSS (contoh menggunakan Font Awesome) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
            integrity="sha384-r3udLJ8hUpYL41fohxxsOFdwJBDK9pI5EPyN1U8YO3FhxsckPVB5iXEWfQMIjBy2"
            crossorigin="anonymous" />
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/masonry/" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            .b-example-divider {
                width: 100%;
                height: 3rem;
                background-color: rgba(0, 0, 0, 0.1);
                border: solid rgba(0, 0, 0, 0.15);
                border-width: 1px 0;
                box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
                    inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
            }

            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }

            .bi {
                vertical-align: -0.125em;
                fill: currentColor;
            }

            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }

            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .btn-bd-primary {
                --bd-violet-bg: #712cf9;
                --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

                --bs-btn-font-weight: 600;
                --bs-btn-color: var(--bs-white);
                --bs-btn-bg: var(--bd-violet-bg);
                --bs-btn-border-color: var(--bd-violet-bg);
                --bs-btn-hover-color: var(--bs-white);
                --bs-btn-hover-bg: #6528e0;
                --bs-btn-hover-border-color: #6528e0;
                --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                --bs-btn-active-color: var(--bs-btn-hover-color);
                --bs-btn-active-bg: #5a23c8;
                --bs-btn-active-border-color: #5a23c8;
            }

            .bd-mode-toggle {
                z-index: 1500;
            }

            .bd-mode-toggle .dropdown-menu .active .bi {
                display: block !important;
            }
        </style>

        <!-- Custom styles for this template -->
        <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap"
            rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="blog.css" rel="stylesheet" />
    </head>

    <body>

        <symbol id="cart" viewBox="0 0 16 16">
            <path
                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
        <symbol id="chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
        </symbol>
        </svg>

        <div class="container">
            <header class="border-bottom lh-1 py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4 pt-1">
                    </div>
                    <div class="col-4 text-center">
                        <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#"></a>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <a class="link-secondary" href="#" aria-label="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="mx-3" role="img" viewBox="0 0 24 24">
                            </svg>
                        </a>

                    </div>
                </div>
            </header>
        </div>

        <main class="container">
            <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="display-4 fst-italic">'''</h3>
                        <p class="lead my-3" align="justify">
                            Boyolali mungkin kecil tetapi kuliner legendaris dan unik yang dimilikinya mampu memberikan
                            pengalaman kuliner yang tak terlupakan. Dari Soto Seger yang menyegarkan hingga Wedang Uwuh
                            yang menghangatkan, setiap hidangan menawarkan cita rasa khas yang patut untuk dicoba.
                            Boyolali terkenal dengan udara sejuk pegunungan dan susu sapi segarnya. Kombinasi ini tidak
                            hanya. Membuat suasana makan lebih menyenangkan tetapi juga menambah nilai kuliner Boyolali.
                            Banyak hidangan yang menggunakan bahan-bahan lokal berkualitas tinggi, seperti susu segar
                            dalam Tahu Susu dan berbagai rempah-rempah lokal yang menambah keunikan rasa. Selain itu,
                            masyarakat Boyolali sangat menjaga tradisi kuliner mereka. Setiap hidangan khas sering kali
                            memiliki cerita dan makna tersendiri yang diwariskan dari generasi ke generasi. Oleh karena
                            itu, menikmati kuliner Boyolali bukan hanya soal rasa, tetapi juga tentang menghargai budaya
                            dan sejarah lokal.
                        </p>
                        <h3 class="display-4 fst-italic">'''</h3>
                    </div>
                    <div class="col-lg-6">
                        <h5></h5>
                        <p></p>
                        <img src="https://cdn.idntimes.com/content-images/post/20190717/eattemptationsby-53472952-157161111961395-3914127227123117130-n-63303c4825e63fbd9af30b3c512e5590.jpg"
                            alt="Soto Seger Boyolali" style="width: 100%; height: auto" onclick="redirectTora()" />
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div
                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary-emphasis"></strong>
                                <h4 class="mb-2 fst-italic">Soto Mbok Giyem Boyolali</h4>
                                <div class="mb-1 text-body-secondary"></div>
                                <p class="card-text mb-auto" style="text-align: justify;">
                                    Saat ke Boyolali, cobalah mampir ke kawasan Pandanaran. Kamu akan menemukan
                                    warung legendaris bernama Soto Mbok Giyem di sana. Sekali mencicipi, lidahmu
                                    bakal merasa ketagihan. Sotonya gurih, karena rempah-rempah di dalamnya cukup
                                    lengkap.</p>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <a href="https://kumparan.com/harley-b-sastha/soto-seger-mbok-giyem-kuliner-legendaris-boyolali-yang-segernya-bikin-nagih-1uF0yCPrmr4/1"
                                    target="_blank">

                                    <img src="https://lh3.googleusercontent.com/-Ib1uTVdI1wE/Xh1To-NcpJI/AAAAAAAACO4/e_VM6rhHxiM3KB0St87xad_wxfnC_nQygCLcBGAsYHQ/s1600/1578980253023914-4.png"
                                        width="200" height="250" />

                                    <!-- <svg
                  class="bd-placeholder-img"
                  width="200"
                  height="250"
                  xmlns="http://www.w3.org/2000/svg"
                  role="img"
                  aria-label="Placeholder: Thumbnail"
                  preserveAspectRatio="xMidYMid slice"
                  focusable="false"
                  style="object-fit: cover;"
                > -->
                                    <!--               
                </svg> -->
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div
                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-success-emphasis"></strong>
                                <h4 class="mb-2 fst-italic">Tahu Susu</h4>
                                <div class="mb-1 text-body-secondary"></div>
                                <p class="card-text mb-auto" style="text-align: justify;">
                                    Koto Susu bukan hanya sekadar julukan bagi Boyolali. Tahu susu diperoleh dari proses
                                    curdling susu dengan rennet, kemudian menghilangkan bagian cairnya. Keasaman yang
                                    meningkat menyebabkan protein susu menjadi padat. Rasanya gurih, creamy, dan lembut.
                                </p>

                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <a href="https://inibaru.id/kulinary/tahu-susu-olahan-unik-dari-susu-khas-boyolali"
                                    target="_blank" <div class="col-auto d-none d-lg-block">
                                    <a href="https://inibaru.id/kulinary/tahu-susu-olahan-unik-dari-susu-khas-boyolali"
                                        target="_blank">

                                        <img src="https://www.196flavors.com/wp-content/uploads/2021/02/panisse-2-FP-600x600.jpg"
                                            width="200" height="250" />
                                        <!--<svg
                  class="bd-placeholder-img"
                  width="200"
                  height="250"
                  xmlns="http://www.w3.org/2000/svg"
                  role="img"
                  aria-label="Placeholder: Thumbnail"
                  preserveAspectRatio="xMidYMid slice"
                  focusable="false"
                  style="object-fit: cover;"
                >
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c" />
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                </svg>-->
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-0">
                    <div class="col-md-0">
                        <h3 class="pb-4 mb-4 fst-italic border-bottom">KULINER HITS BOYOLALI</h3>

                        <article class="blog-post">
                            <h2 class="display-5 link-body-emphasis mb-1">Jenang Pecel</h2>
                            <p class="blog-post-meta">
                                Dusun 1, Karanggeneng, Kec. Boyolali, Kab. Boyolali, Jawa Tengah 57312 <a
                                    href="https://maps.app.goo.gl/2Zg3LKckdo9P3MVv9">Klik
                                    di sini</a>
                            </p>
                            <blockquote>
                                <p>
                                    <li>Jam Buka: 12.00 PM - 16.00 PM</li>
                                    <li>Menyajikan Jenang Pecel & Gendar Pecel</li>
                                    <strong></strong>
                                </p>
                                <hr />
                            </blockquote>
                            <p class="card-text mb-auto" style="text-align: justify;">
                                Boyolali terdapat sajian pecel yang sedikit berbeda dengan beberapa pecel yang sering
                                kita jumpai. Warga setempat menyebutnya dengan Jenang Pecel, makanan ini merupakan
                                paduan dari pecel dan juga jenang atau bubur sumsum khas Boyolali.
                            </p>
                            <img src="https://cdn1-production-images-kly.akamaized.net/7IKEK-TYuV5YhLvofjkgSvWhFM4=/0x315:5367x3340/1280x720/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3012398/original/047469100_1578108085-shutterstock_796820512.jpg"
                                alt="Lokasi Rumah Makan" style="width: 100%; height: auto; margin-top: 20px;"
                                onclick="redirectJenangPecel()" />

                            <style>
                                .youtube-video {
                                    width: calc(50% - 10px);
                                    /* Lebar setengah dari container dikurangi margin */
                                    margin-bottom: 20px;
                                    /* Ruang antara setiap video */
                                    border-radius: 8px;
                                    overflow: hidden;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                }

                                .youtube-video iframe {
                                    border: none;
                                }

                                .youtube-caption {
                                    padding: 15px;
                                    background-color: #f9f9f9;
                                }

                                .youtube-caption h3 {
                                    margin-top: 0;
                                    margin-bottom: 10px;
                                    font-size: 18px;
                                    color: #333;
                                }

                                .youtube-caption p {
                                    margin: 0;
                                    font-size: 14px;
                                    color: #666;
                                }
                            </style>

                            <style>
                                .youtube-video {
                                    width: calc(50% - 10px);
                                    /* Lebar setengah dari container dikurangi margin */
                                    margin-bottom: 20px;
                                    /* Ruang antara setiap video */
                                    border-radius: 8px;
                                    overflow: hidden;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                }

                                .youtube-video iframe {
                                    border: none;
                                }

                                .youtube-caption {
                                    padding: 15px;
                                    background-color: #f9f9f9;
                                }

                                .youtube-caption h3 {
                                    margin-top: 0;
                                    margin-bottom: 10px;
                                    font-size: 18px;
                                    color: #333;
                                }

                                .youtube-caption p {
                                    margin: 0;
                                    /* Hilangkan margin default */
                                    font-size: 14px;
                                    color: #666;
                                    text-align: justify;
                                    /* Ratakan teks */
                                }
                            </style>

                            <div style="margin-top: 20px; display: flex; justify-content: space-between;">
                                <div class="youtube-video">
                                    <iframe width="100%" height="200"
                                        src="https://www.youtube.com/embed/p-ffDTlbBZc?si=jI7aWq2jcrgmWlFa"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    <div class="youtube-caption">
                                        <h3>Jenang Pecel</h3>
                                        <p>Jenang pecel ini biasanya disajikan dengan cara dipincuk, atau alas daun
                                            pisang. Lebih nikmat lagi jika ditambahkan lauk seperti tempe atau juga
                                            peyek agar memperkaya tekstur saat disantap</p>
                                    </div>
                                </div>
                                <div class="youtube-video">
                                    <iframe width="100%" height="200"
                                        src="https://www.youtube.com/embed/rfkm2F1qSvc?si=_OAC4G50TPKhFBuJ"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    <div class="youtube-caption">
                                        <h3>Gendar Pecel</h3>
                                        <p>Penganan ini biasanya dibungkus daun jati. Sub-olahan gendar juga sering
                                            dijadikan kerupuk. Kerupuk gendar adalah gendar yang dipotong tipis,
                                            dikeringkan, lalu digoreng</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <article class="blog-post">
                                <h2 class="display-5 link-body-emphasis mb-1">Susu Segar Boyolali</h2>
                                <p class="blog-post-meta">
                                    Jl. Perintis Kemerdekaan Bangun Harjo, RT.07/RW.02, Pulisen, Kec. Boyolali, Kab.
                                    Boyolali,
                                    Jawa Tengah 57316 <a href="https://maps.app.goo.gl/eCwHCPDzJA841bsq6">Klik
                                        disini</a>
                                </p>
                                <blockquote>
                                    <p>
                                        <li>Jam Buka: 12.00 PM - 22.30 PM</li>
                                        <li>Menyajikan Susu Segar Khas Boyolali</li>
                                        <strong></strong>
                                    </p>
                                    <hr />
                                </blockquote>
                                <p class="card-text mb-auto" style="text-align: justify;">
                                    Warung susu Boyolali ini mendapat rating 4,3/5 dari 952 ulasan Google Maps. Tempat
                                    ini
                                    berada di Jalan Perintis Kemerdekaan Bangun Harjo, RT 007/002, Pulisen, Kecamatan
                                    Boyolali,
                                    Kabupaten Boyolali. Tersedia berbagai rasa susu segar Boyolali seperti susu segar,
                                    jus susu
                                    pisang, jus susu strawberry, susu telur madu jahe, dan lainnya. Tersedia menu
                                    lainnya
                                    seperti makanan berat nasi sambal cumi dan makanan camilan tempe goreng, cumi,
                                    udang, dan
                                    jamur.
                                </p>
                                <img src="https://th.bing.com/th/id/OIP.f6xuukioenzu5uymvg4HjwHaE8?rs=1&pid=ImgDetMain"
                                    alt="Lokasi Rumah Makan" style="width: 100%; height: auto; margin-top: 20px;"
                                    onclick="redirectSusuSegar()" />

                                <style>
                                    .youtube-video {
                                        width: calc(50% - 10px);
                                        /* Lebar setengah dari container dikurangi margin */
                                        margin-bottom: 20px;
                                        /* Ruang antara setiap video */
                                        border-radius: 8px;
                                        overflow: hidden;
                                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                    }

                                    .youtube-video iframe {
                                        border: none;
                                    }

                                    .youtube-caption {
                                        padding: 15px;
                                        background-color: #f9f9f9;
                                    }

                                    .youtube-caption h3 {
                                        margin-top: 0;
                                        margin-bottom: 10px;
                                        font-size: 18px;
                                        color: #333;
                                    }

                                    .youtube-caption p {
                                        margin: 0;
                                        font-size: 14px;
                                        color: #666;
                                    }
                                </style>

                                <style>
                                    .youtube-video {
                                        width: calc(50% - 10px);
                                        /* Lebar setengah dari container dikurangi margin */
                                        margin-bottom: 20px;
                                        /* Ruang antara setiap video */
                                        border-radius: 8px;
                                        overflow: hidden;
                                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                    }

                                    .youtube-video iframe {
                                        border: none;
                                    }

                                    .youtube-caption {
                                        padding: 15px;
                                        background-color: #f9f9f9;
                                    }

                                    .youtube-caption h3 {
                                        margin-top: 0;
                                        margin-bottom: 10px;
                                        font-size: 18px;
                                        color: #333;
                                    }

                                    .youtube-caption p {
                                        margin: 0;
                                        /* Hilangkan margin default */
                                        font-size: 14px;
                                        color: #666;
                                        text-align: justify;
                                        /* Ratakan teks */
                                    }
                                </style>

                                <div style="margin-top: 20px; display: flex; justify-content: space-between;">
                                    <div class="youtube-video">
                                        <iframe width="560" height="315"
                                            src="https://www.youtube.com/embed/8DE17C6S9ss?si=AU6ZJ_1_3Pd39zAF"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        <div class="youtube-caption">
                                            <h3>Susu Khas Boyolali</h3>
                                            <p>Susu Khas Boyolali memiliki tekstur yang lembut dan rasa yang gurih,
                                                sehingga
                                                menjadi minuman yang disukai oleh banyak orang, baik lokal maupun
                                                wisatawan yang
                                                berkunjung ke Boyolali.</p>
                                        </div>
                                    </div>
                                    <div class="youtube-video">
                                        <iframe width="560" height="315"
                                            src="https://www.youtube.com/embed/QDbNLf9bjas?si=Jw5kFMiMtYGkd6_h"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        <div class="youtube-caption">
                                            <h3>Boyolali Kota Susu</h3>
                                            <p>Kabupaten Boyolali punya julukan sebagai Kota Susu. Sebutan ini pantas
                                                dijuluki
                                                mengingat Boyolali merupakan daerah penghasil susu sapi terbesar di Jawa
                                                Tengah.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <article class="blog-post">
                                    <h2 class="display-5 link-body-emphasis mb-1">Abon Lele</h2>
                                    <p class="blog-post-meta">
                                        Jl. Ringinsari No.39, Dusun III, Randusari, Kec. Teras, Kab. Boyolali, Jawa
                                        Tengah 57374
                                        <a href="https://maps.app.goo.gl/2qudaBRmigmUnF116">Klik disini</a>
                                    <p>
                                        <li>Jam Buka: 08.30 AM - 16.30 PM</li>
                                        <li>Menyajikan Olahan Abon Lele Khas Boyolali</li>
                                        <strong></strong>
                                    </p>
                                    <p class="card-text mb-auto" style="text-align: justify;">
                                        Abon Lele Khas Boyolali adalah
                                        hidangan lezat yang berasal dari Boyolali, Jawa Tengah.
                                        Hidangan ini terbuat dari daging lele yang diolah menjadi serat-serat halus dan
                                        kemudian
                                        dipanggang atau digoreng hingga kering. Proses pembuatannya melibatkan
                                        rempah-rempah dan
                                        bumbu khas, yang memberikan rasa gurih dan nikmat pada abon lele. Hidangan ini
                                        biasanya
                                        disajikan sebagai lauk pendamping nasi atau sebagai camilan. Abon lele khas
                                        Boyolali
                                        telah
                                        menjadi bagian dari kuliner tradisional daerah tersebut dan menjadi favorit
                                        banyak orang
                                        karena teksturnya yang renyah dan cita rasanya yang khas.</p>
                                    <img src="https://th.bing.com/th/id/R.11152804ddbfb7ef39d08ed047dadd7d?rik=BXRIpcMHAZXdpw&riu=http%3a%2f%2fekonomikasyariah.com%2fwp-content%2fuploads%2f2022%2f07%2fabonnn-1024x576.jpg&ehk=Yg98b2D3fIGYvX8e3fGxeMt29dCf8hxCCzZ9HoNvwPw%3d&risl=&pid=ImgRaw&r=0"
                                        alt="Lokasi Rumah Makan" style="width: 100%; height: auto; margin-top: 20px;"
                                        onclick="redirectAbonLele()" />

                                    <style>
                                        .youtube-video-container {
                                            display: flex;
                                            flex-wrap: wrap;
                                            justify-content: space-between;
                                            margin-top: 20px;
                                        }

                                        .youtube-video {
                                            width: calc(50% - 10px);
                                            margin-bottom: 20px;
                                            border-radius: 8px;
                                            overflow: hidden;
                                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                            transition: transform 0.3s ease;
                                        }

                                        .youtube-video:hover {
                                            transform: translateY(-5px);
                                        }

                                        .youtube-video iframe {
                                            border: none;
                                            width: 100%;
                                            height: 100%;
                                        }

                                        .youtube-caption {
                                            padding: 15px;
                                            background-color: #f9f9f9;
                                        }

                                        .youtube-caption h3 {
                                            margin-top: 0;
                                            margin-bottom: 10px;
                                            font-size: 18px;
                                            color: #333;
                                        }

                                        .youtube-caption p {
                                            margin: 0;
                                            font-size: 14px;
                                            color: #666;
                                            text-align: justify;
                                        }
                                    </style>

                                    <article class="youtube-video-container">
                                        <div class="youtube-video">
                                            <iframe src="https://www.youtube.com/embed/G8ku769Xy3w?si=1ArdPvo4qeGPj0zp"
                                                title="Pembuatan Abon Lele"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                            <div class="youtube-caption">
                                                <h3>Pembuatan Abon Lele</h3>
                                                <p>Ikuti proses pembuatan abon lele yang lezat ini.</p>
                                            </div>
                                        </div>
                                        <div class="youtube-video">
                                            <iframe src="https://www.youtube.com/embed/tf6naAeqsxo?si=nSXDJnvTYN-hL2qj"
                                                title="Olahan Lele yang Mendunia"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                            <div class="youtube-caption">
                                                <h3>Olahan Lele yang Mendunia</h3>
                                                <p>Lihat variasi olahan lele yang mendunia dan menggugah selera.</p>
                                            </div>
                                        </div>
                                    </article>
                    </div>
                </div>
                <hr>
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem">

                    <!-- <svg
                      class="bd-placeholder-img"
                      width="100%"
                      height="96"
                      xmlns="http://www.w3.org/2000/svg"
                      aria-hidden="true"
                      preserveAspectRatio="xMidYMid slice"
                      focusable="false"
                    >
                      <rect width="100%" height="100%" fill="#777" />
                    </svg> -->

                    <!--<svg
                      class="bd-placeholder-img"
                      width="100%"
                      height="96"
                      xmlns="http://www.w3.org/2000/svg"
                      aria-hidden="true"
                      preserveAspectRatio="xMidYMid slice"
                      focusable="false"
                    >
                      <rect width="100%" height="100%" fill="#777" />
                    </svg>-->

                    <!--<svg
                      class="bd-placeholder-img"
                      width="100%"
                      height="96"
                      xmlns="http://www.w3.org/2000/svg"
                      aria-hidden="true"
                      preserveAspectRatio="xMidYMid slice"
                      focusable="false"
                    >
                      <rect width="100%" height="100%" fill="#777" />
                    </svg>-->

                    </a>
                    </li>
                    </ul>
                </div>

                <div class="p-4">
                    <h4 class="fst-italic">Me on Social Media</h4>
                    <ol class="list-unstyled mb-0">
                        <li> <i class="fa-regular fa-envelope"></i> <a
                                href="mailto:asmarinanurjanah1503@mail.ugm.ac.id@example.com">Email</a></li>
                        <li> <i class="fa-brands fa-instagram"></i> <a
                                href="https://instagram.com/asmrina_?igshid=OGQ5ZDc2ODk2ZA==">Instagram</a>
                        </li>
                    </ol>
                </div>

                <div class="p-4">
                    <h4 class="fst-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li> <i class="fa-brands fa-github"></i> <a href="https://github.com/asmarina15">GitHub</a></li>
                    </ol>
                </div>
            </div>
            </div>
            </div>
        </main>

        <footer class="py-5 text-center text-body-secondary bg-body-tertiary">
            <p>WebGIS by Asmarina
            </p>
            <p class="mb-0">
                <a href="#">Back to top</a>
            </p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

    </body>

    </html>
</x-app-layout>
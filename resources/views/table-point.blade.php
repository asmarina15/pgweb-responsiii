@extends('layouts.template')

@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header text-center">
            <h3 class="funky-title">Data Titik</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive"> <!-- Untuk membuat tabel responsif -->
                <table class="table table-bordered table-striped text-center" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Koordinat</th>
                            <th>Foto</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 @endphp
                        @foreach ($points as $p)
                                                @php
                                                    $geometry = json_decode($p->geom);
                                                @endphp

                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $p->name }}</td>
                                                    <td>{{ $p->description }}</td>
                                                    <td>
                                                        {{ $geometry->coordinates[1] . ',' . $geometry->coordinates[0] }}
                                                        <!-- Koordinat lat dan long -->
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('storage/images/' . $p->image)}}" alt="" width="200">
                                                    </td>
                                                    <td>{{ date_format($p->created_at, 'd M Y')}}</td>
                                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
<!-- Di dalam tag <head> -->
<link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&display=swap" rel="stylesheet">

<style>
    /* CSS untuk memberikan latar belakang warna pada tabel */
    #example {
        background-color: #f8f9fa;
        /* Warna latar belakang tabel */
    }
</style>

<style>
    .funky-title {
        font-family: 'Comic Neue', cursive;
        /* Contoh font lucu dari Google Fonts */
        font-size: 2.5rem;
        /* Ukuran font yang besar */
        font-weight: bold;
        /* Memperkuat teks */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        /* Bayangan teks */
        color: #4CAF50;
        /* Warna teks */
        margin-bottom: 0;
        /* Menghilangkan margin bawah */
    }
</style>

@endsection

@section('script')
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<script>
    new DataTable('#example');
</script>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $data = [ //$ penulisan variabel pada PHP
            "title" => "Petaku, Petamu, Peta Kita Semua",
        ];

        //check if user is logged in
        if (auth()->check()) {
            return view('index', $data); //mengambil values dari index.blade.php,
        } else {
            return view('index-public', $data); //mengambil values dari index-public.blade.php,
        }
    }
    public function table() //menambahkan function table
    {
        $data = [
            "title" => "Table",
        ];
        return view('table', $data); //memanggil view table
    }
    public function about() //menambahkan function table
    {
        $data = [
            "title" => "Info",
        ];
        return view('about', $data); //memanggil view table
    }
}

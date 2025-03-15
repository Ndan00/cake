<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListBarangController extends Controller
{
    function tampilkan($id, $nama) {
        return view('list_barang', ['id' => $id, 'nama' => $nama]);
    }
}

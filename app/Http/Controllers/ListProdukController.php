<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{
    public function show()
    {
        $data = Produk::where('harga', '<' , 60000)->orderBy('harga', 'asc')->get();
        foreach ($data as $produk) {
            $nama[] = $produk->nama;
            $desc[]= $produk->deskripsi;
            $harga[] = $produk->harga;
        }
        return view('list_produk', compact('nama', 'desc', 'harga'));
    }
}

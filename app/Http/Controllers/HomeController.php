<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Doraemon',
            'pekerjaan' => 'Developer',
        ];
        return view('home')->view($data);
    }

    public function contact()
    {
        return view('contact');
    }
}

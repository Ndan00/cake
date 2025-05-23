@extends('layouts.app')

@section('title', 'Home')
@section('page_title', 'Selamat datang di Berita Batam')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Selamat Pagi</h1>
    <p class="mb-4">Berikut adalah berita update di hari ini</p>


    <div class="flex flex-wrap gap-4">">
        @include('components.card', [
            'imgsrc' => 'image/dog.jpg',
            'title' => 'Dogies the maskot',
            'desc' => 'Ini adalah Maskot dari Tugas PBL Kami'
            
        ])
        @include('components.card', [
            'imgsrc' => 'image/dog.jpg',
            'title' => 'Dogies the maskot',
            'desc' => 'Ini adalah Maskot dari Tugas PBL Kami'
            
        ])
    @include('components.card', [
        'imgsrc' => 'image/dog.jpg',
        'title' => 'Dogies the maskot',
        'desc' => 'Ini adalah Maskot dari Tugas PBL Kami'
        
    ])
        @include('components.card', [
            'imgsrc' => 'image/dog.jpg',
            'title' => 'Dogies the maskot',
            'desc' => 'Ini adalah Maskot dari Tugas PBL Kami'
            
        ])
        </div>
@endsection

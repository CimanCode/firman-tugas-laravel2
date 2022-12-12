@extends('home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    @csrf
    <div class="w-[1250px] mx-auto shadow-xl p-12">
        <div class="flex gap-8">
            <img src="{{ Storage::url($product->gambar_barang) }}">
            <div class="flex-col">
                <h1 class="font-bold text-2xl">{{ $product->nama_barang }}</h1>
                <h2 class="ont-medium text-lg">Stok : {{ $product->stok_barang }}</h2>
                <h2 class="font-medium text-lg">{{ $product->deskripsi_barang }}</h2>
                <h2 class="ont-medium text-xl text-yellow-600">Rp.{{ $product->harga_barang }}</h2>
                <div class="flex items-center justify-center gap-3 mt-8">
                    <div class="bg-yellow-500 p-2 rounded-lg w-32 mb-10 text-white text-center">
                        <a href="#"><button>get to basket</button></a>
                    </div>
                    <div class="bg-yellow-600 p-2 rounded-lg w-32 mb-10 text-white text-center">
                        <a href="#"><button>check-out</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection

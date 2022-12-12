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
    <div class="mx-auto p-10 shadow-2xl border-2 border-b-slate-400 mt-12">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-gray-800 font-bold text-[50px]">Product<span class="text-[60px] text-yellow-500 font-bold">Q</span></h1>
            <h1 class="text-gray-800 font-bold text-[50px]">All Product</h1>
        </div>
        <div class="flex gap-4 flex-wrap">
        @foreach ($product as $products )
            <div class="shadow-xl w-[350px] mx-auto rounded-xl p-6">
                <div class="flex justify-center items-center mb-4">
                    <img src="{{Storage::url($products->gambar_barang)}}" class="rounded-[100%] w-[200px] h-[200px] "/>
                </div>
                <h1 class="text-center font-bold text-2xl">{{ $products->nama_barang }}</h1>
                <h2 class="text-center font-medium text-lg">Stok : {{ $products->stok_barang }}</h2>
                <h2 class="text-center font-medium text-lg">{{ $products->deskripsi_barang }}</h2>
                <h2 class="text-center font-medium text-xl text-yellow-600">Rp.{{ $products->harga_barang }}</h2>
                <div class="bg-cyan-600 p-2 rounded-lg w-32 mt-4 text-white text-center mx-auto">
                    <a href="{{ route("product.info", ['id'=>$products->id])}}"><button>Detail</button></a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</body>
</html>
@endsection


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ProductQ</title>
</head>
<body>
    <div class="mx-auto w-[1000px] shadow-xl p-14 mt-20">
        <h1 class="text-[50px] font-bold text-slate-900 text-center mb-[40px]" >Update <span class="text-[50px] font-bold text-yellow-600 ">Barang</span></h1>
        <div class="w-[450px] mx-auto">
            <form method="post" action="{{ route('product.update', ["id"=>$product->id]) }}"  enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="flex justify-between">
                    <label for="nama_barang" class="text-slate-900 font-bold"> Nama Barang </label>
                    <input type="text" name="nama_barang" id="nama_barang" value="{{ $product->nama_barang }}" class="border-2 w-[250px]"/>
                </div>
                <br>
                <div class="flex justify-between">
                    <label for="harga_barang" class="text-slate-900 font-bold"> Harga Barang </label>
                    <input type="number" name="harga_barang" id="harga_barang" value="{{ $product->harga_barang }}" class="border-2 w-[250px]"/>
                </div>
                <br>
                <div class="flex justify-between">
                    <label for="stok_barang" class="text-slate-900 font-bold"> Stok Barang </label>
                    <input type="number" name="stok_barang" id="stok_barang" value="{{ $product->stok_barang }}" class="border-2 w-[250px]"/>
                </div>
                <br>
                <div class="flex justify-between">
                    <label for="deskripsi_barang" class="text-slate-900 font-bold"> Deskripsi Barang </label>
                    <input type="text" name="deskripsi_barang" id="deskripsi_barang" value="{{ $product->deskripsi_barang }}" class="border-2 w-[250px]"/>
                </div>
                <br>
                <div class="flex justify-between">
                    <label for="gambar_barang" class="text-slate-900 font-bold"> Gambar Barang </label>
                    <input type="file" name="gambar_barang" id="gambar_barang" class="border-2 w-[250px]"/>
                </div>
                <br>
                <div class="flex gap-4 mt-[40px] justify-center">
                    <div class="w-[200px] bg-cyan-600 p-2 rounded-lg text-center text-white">
                        <button type="submit" @class(['btn', 'btn-primary'])>Update</button>
                    </div>
                </div>
            </form>
            <div class="flex gap-4 mt-[10px] justify-center">
                <div class="w-[200px] bg-stone-700 p-2 rounded-lg text-center text-white">
                    <a href="{{ route('product.list') }}"><button>Back To List</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productcontroller extends Controller

{
    function index(){
        $product = product::query()
                   ->get();
            return view('product.list', [
                'product' => $product
            ]);
    }

    function lite(){
        $product = product::query()
                   ->get();
            return view('product.lite', [
                'product' => $product
            ]);
    }

    function info($id){
        $posts = product::query()
                ->where('id', $id)
                ->first();
        return view('product.info', [
            'product' => $posts
        ]);
    }

    function store(){
        return view('product.store');
    }

    function detail($id){
        $products = product::query()
                    ->where("id", $id)
                    ->first();
            return view('product.detail',[
                'product' =>$products
            ]);
    }

    function create(Request $rq){
        $created = [
            'nama_barang' => $rq->input('nama_barang'),
            'harga_barang' => $rq->input('harga_barang'),
            'stok_barang' => $rq->input('stok_barang'),
            'deskripsi_barang' => $rq->input('deskripsi_barang'),
            'gambar_barang' => $rq->file('gambar_barang')->store('image', 'public')
        ];

        product::query()->create($created);
        return redirect(route('product.list'));
    }

    function update(Request $rq, $id){
        $products = [
            'nama_barang' => $rq->input('nama_barang'),
            'harga_barang' => $rq->input('harga_barang'),
            'stok_barang' => $rq->input('stok_barang'),
            'deskripsi_barang' => $rq->input('deskripsi_barang')
        ];

        if($rq->hasFile('gambar')) {
            $products["gambar_barang"] = $rq->file('gambar')->store('image', 'public');
        }

        product::query()->where("id",$id)->update($products);
        return redirect(route('product.list'));
    }

    function delete($id){ //untuk menghapus data
        $product = product::query()->where("id", $id)->first();
        $product->delete();
        Storage::disk('public')->delete($product->gambar_barang);
        return redirect()->back();
    }
}

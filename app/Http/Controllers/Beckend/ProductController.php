<?php

namespace App\Http\Controllers\Beckend;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function index(){
        $product = product::query()
                    ->get();
        return response()->json([
            'status' => true,
            'message' => 'this product data',
            'data' => $product
        ]);
    }

    function show($id){
        $product = product::query()
                   ->where('id', $id)
                   ->first();
            if($product == null){
                return response()->json([
                    'status' => false,
                    'message' => 'product tidak ditemukan',
                    'data' => null
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'show product succesfully',
                'data' => $product->makehidden([
                    'created_at',
                    'updated_at'
                ])
            ]);
    }

    function store(Request $rq){
        $product = [
            'nama_barang' => $rq->nama_barang,
            'harga_barang' => $rq->harga_barang,
            'stok_barang' => $rq->stok_barang,
            'deskripsi_barang' => $rq->deskripsi_barang,
            'gambar_barang' => $rq->gambar_barang->store('imgs', 'public')
        ];

        if(!isset($product["nama_barang"])){
            return response()->json([
                'status' => false,
                'message' => 'nama barang harus di isi',
                'data' => null
            ]);
        }
        if(!isset($product["harga_barang"])){
            return response()->json([
                'status' => false,
                'message' => 'harga barang harus di isi',
                'data' => null
            ]);
        }
        if(!isset($product["stok_barang"])){
            return response()->json([
                'status' => false,
                'message' => 'stok barang harus di isi',
                'data' => null
            ]);
        }
        if(!isset($product["deskripsi_barang"])){
            return response()->json([
                'status' => false,
                'message' => 'deskripsi barang harus di isi',
                'data' => null
            ]);
        }
        if(!isset($product["gambar_barang"])){
            return response()->json([
                'status' => false,
                'message' => 'gambar barang harus di isi',
                'data' => null
            ]);
        }

        $created = product::query()
                   ->create($product);
            return response()->json([
                'status' => true,
                'message' => 'created successfully',
                'data' => $created
            ]);
    }

    function update(Request $rq, $id){
        $product = [
            'nama_barang' => $rq->nama_barang,
            'harga_barang' => $rq->harga_barang,
            'stok_barang' => $rq->stok_barang,
            'deskripsi_barang' => $rq->deskripsi_barang,
        ];

        if($rq->gambar_barang){
            Storage::disk('public')->delete(product::find($id)->first()->gambar_barang);
            $product ['gambar_barang'] = $rq->gambar_barang->store('imgs', 'public');
        }

        product::query()->where('id', $id)->update($product);
        return response()->json([
            'status' => true,
            'message' => 'update succesfully',
            'data' => $product
        ]);
    }

    function destroy($id){
        $product = product::query()->where('id', $id)->first();

        if($product == null){
            return response()->json([
                'status' => false,
                'message' => 'data product tidak ditemukan',
                'data' => null
            ]);
        }

        Storage::disk('public')->delete($product->gambar_barang);
        product::query()->where('id', $id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'delete succesfully',
            'data' => $product
        ]);
    }
}


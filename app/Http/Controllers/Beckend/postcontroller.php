<?php

namespace App\Http\Controllers\beckend;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class postcontroller extends Controller
{
    function index(){
        $post = post::query()
                    ->get();
        return response()->json([
            'status' => true,
            'message' => 'this post data',
            'data' => $post
        ]);
    }

    function show($id){
        $post = post::query()
                   ->where('id', $id)
                   ->first();
            if($post == null){
                return response()->json([
                    'status' => false,
                    'message' => 'postingan tidak ditemukan',
                    'data' => null
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'show postingan succesfully',
                'data' => $post->makehidden([
                    'created_at',
                    'updated_at'
                ])
            ]);
    }

    function store(Request $rq){
        $post = [
            'judul' => $rq->judul,
            'gambar' => $rq->gambar->store('img', 'public'),
            'artikel' => $rq->artikel,
        ];

        if(!isset($post["judul"])){
            return response()->json([
                'status' => false,
                'message' => 'judul harus di isi',
                'data' => null
            ]);
        }
        if(!isset($post["gambar"])){
            return response()->json([
                'status' => false,
                'message' => 'gambar harus di isi',
                'data' => null
            ]);
        }
        if(!isset($post["artikel"])){
            return response()->json([
                'status' => false,
                'message' => 'artikel harus di isi',
                'data' => null
            ]);
        }

        $created = post::query()
                   ->create($post);
            return response()->json([
                'status' => true,
                'message' => 'created successfully',
                'data' => $created
            ]);
    }

    function update(Request $rq, $id){
        $post = [
            'judul' => $rq->judul,
            'artikel' => $rq->artikel
        ];

        if(isset($rq->gambar)){
            Storage::disk('public')->delete(post::find($id)->first()->gambar);
            $post ['gambar'] = $rq->gambar->store('img', 'public');
        }

        post::query()->where('id', $id)->update($post);
        return response()->json([
            'status' => true,
            'message' => 'update succesfully',
            'data' => $post
        ]);
    }

    function destroy($id){
        $post = post::query()->where('id', $id)->first();

        if($post == null){
            return response()->json([
                'status' => false,
                'message' => 'data product tidak ditemukan',
                'data' => null
            ]);
        }

        Storage::disk('public')->delete($post->gambar);
        $post = post::query()->where('id', $id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'delete succesfully',
            'data' => $post
        ]);
    }
}

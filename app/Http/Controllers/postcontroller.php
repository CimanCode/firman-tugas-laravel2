<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class postcontroller extends Controller
{

    function index(){
        $post = post::query()->get();
        return view('post.list', [
            'post' => $post
        ]);
    }

    function blog(){
        $post = post::query()->get();
        return view('post.blog', [
            'post' => $post,
            'product' => product::all()
        ]);
    }

    function detail($id){
        $posts = post::query()
                ->where('id', $id)
                ->first();
        return view('post.detail', [
            'post' => $posts
        ]);
    }

    function store(){
        return view('post.store');
    }

    function create(Request $rq){
        $created = [
            'judul' => $rq->input('judul'),
            'artikel' => $rq->input('artikel'),
            'gambar' => $rq->file('gambar')->store('image', 'public')
        ];

        post::query()->create($created);
        return redirect(route('post.list'));
    }

    function updated($id){
        $post = post::query()
                ->where('id', $id)
                ->first();
            return view('post.updated', [
                'post' => $post
            ]);
    }

    function update(Request $rq, $id){
        $update = [
            'judul' => $rq->input('judul'),
            'artikel' => $rq->input('artikel')
        ];

        if($rq->hasFile('gambar')) {
            $update['gambar'] = $rq->file('gambar')->store('image', 'public');
        }

        post::query()->where('id', $id)->update($update);
        return redirect(route('post.list'));
    }

    function deleted($id){
        $post = post::query()->where('id', $id)->first();
        $post->delete();
        Storage::disk('public')->delete($post->gambar);
        return redirect()->back();
    }
}

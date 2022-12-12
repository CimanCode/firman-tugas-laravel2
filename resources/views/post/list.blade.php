@extends('home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="w-[1250px] mx-auto shadow-xl mt-12 p-4">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-gray-800 font-bold text-[50px]">Post<span class="text-[60px] text-yellow-500 font-bold">Q</span></h1>
            <div class=" bg-cyan-600 p-2 rounded-lg w-44 text-white text-center">
                <a href="{{ route('post.store') }}"><button>Create New Post</button></a>
            </div>
        </div>
        <table class="border mx-auto p-4 w-fit mt-6">
            <thead class="border bg-yellow-600">
                <tr class="border p-4">
                    <th class="border p-2">Gambar</th>
                    <th class="border p-2">Judul</th>
                    <th class="border p-2">Artikel</th>
                    <th class="border p-2">Created</th>
                    <th class="border p-2">Updated</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody class="border overflow-hidden text-ellipsis">
                @foreach ($post as $posts )
                    <tr class="border">
                        <td class="border p-2">
                            <img src="{{ Storage::url($posts->gambar) }}" class="w-[100px]"/>
                        </td>
                        <td class="border p-2">{{ $posts->judul }}</td>
                        <td class="border p-2">{{ $posts->artikel }}</td>
                        <td class="border p-2">{{ $posts->created_at }}</td>
                        <td class="border p-2">{{ $posts->updated_at }}</td>
                        <td class="flex gap-2 p-4 item-center">
                            <div class="bg-green-800 p-2 rounded-lg w-32 text-white text-center">
                                <a href="{{ route("post.updated", ["id"=>$posts->id]) }}"><button>Update</button></a>
                            </div>
                            <div class="bg-red-700 p-2 rounded-lg w-32 text-white text-center">
                                <a href="{{ route("post.delete", ["id"=>$posts->id]) }}"><button>Delete</button></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection

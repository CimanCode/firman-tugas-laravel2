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
        <h1 class="text-[50px] font-bold text-slate-900 text-center mb-[40px]" >Create New <span class="text-[50px] font-bold text-yellow-600 ">Post</span></h1>
        <div class="w-[700px] mx-auto">
            <form method="post" action="{{ route('post.create') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex">
                    <label for="judul" class="text-slate-900 font-bold mr-[50px]"> Tutle</label>
                    <input type="text" name="judul" id="judul" class="border-2 w-full" placeholder="write your title.."/>
                </div>
                <br>
                <div class="flex">
                    <label for="artikel" class="text-slate-900 font-bold mr-[35px]"> Article </label>
                    <textarea id="artikel" name="artikel" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your artikel..."></textarea>
                </div>
                <br>
                <div class="flex">
                    <label for="gambar" class="text-slate-900 font-bold mr-[40px]"> Image </label>
                    <input type="file" name="gambar" id="gambar" class="border-2 w-full"/>
                </div>
                <br>
                <div class="flex gap-4 mt-[40px] justify-center">
                    <div class="w-[200px] bg-cyan-600 p-2 rounded-lg text-center text-white">
                        <button type="submit" @class(['btn', 'btn-primary'])>Create</button>
                    </div>
                </div>
            </form>
            <div class="flex gap-4 mt-[10px] justify-center">
                <div class="w-[200px] bg-stone-700 p-2 rounded-lg text-center text-white">
                    <a href="{{ route('post.list') }}"><button>Back To List</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

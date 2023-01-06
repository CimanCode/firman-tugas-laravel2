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
    <div class="w-[1250px] mx-auto">
        <div class="bg-gradient-to-r from-green-400 to-blue-500 p-48 mt-14 shadow-xl rounded-md">
            <h1 class="text-center text-[50px] font-bold text-white mb-8">My Simple Search</h1>
            <div class="mt-4 flex justify-center">
                <form action="{{ route('post.search') }}" method="GET">
                    <div class="flex justify-center gap-1">
                        <input type="text" class="w-[500px] rounded-2xl focus:outline-none" name="search" value="{{ request('search') }}">
                        <div class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 duration-200 hover:ease-in-out hover:to-yellow-500 p-2 rounded-2xl text-center text-white">
                            <button type="submit" >Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

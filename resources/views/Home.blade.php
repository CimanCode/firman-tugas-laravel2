<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Blog-C</title>
</head>
<body>
    <div class="w-[1370px] mx-auto p-2">
        <div class="w-[1250px] mx-auto">
            <nav class="flex gap-20 items-center">
                <h1 class="text-[40px] font-bold text-slate-900">BLOG-<span class="text-[50px] font-bold text-yellow-600">C</span></h1>
                <ul class="flex gap-14">
                    <li><a class="text-[20px] text-slate-900 text-bold font-sans bg-transparent p-3 text-center hover:bg-slate-800 rounded-lg hover:text-white duration-200 hover:ease-in-out "
                        href="{{ route('post.blog') }}">Home</a>
                    </li>
                    <li><a class="text-[20px] text-slate-900 text-bold font-sans bg-transparent p-3 text-center hover:bg-slate-800 rounded-lg hover:text-white duration-200 hover:ease-in-out "
                        href="{{ route('product.lite') }}">Product</a>
                    </li>
                </ul>
                <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-slate-900 text-[20px] bg-transparent hover:bg-slate-800 focus:ring-4 hover:text-white focus:outline-none focus:ring-white font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Manage<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                    <li>
                        <a href="{{ route('product.list')}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Manage Product</a>
                    </li>
                    <li>
                        <a href="{{ route('post.list') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Manage Post</a>
                    </li>
                    </ul>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</body>
</html>

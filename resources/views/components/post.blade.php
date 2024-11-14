<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>test1</title>
</head>
<body class="h-full">
<div class="min-h-full ">

 <x-navbar></x-navbar>

 <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
       <article class="py-8 max-w-screen-md border-b border-gray-300">
        <a href="/beranda {{$post['id']}}"class="hover:underline">
        <h2 class="mb-1 text-3xl track font-bold text-gray-900">{{$post['tittle']}}</h2>
        </a>
        <div class="text-base text-gray-500">
          <a href="#">{{$post['author']}}</a>
        </div>
        <p class="my-4 font-light">{{Str::limit($post['body'],150)}}</p>
          <a href="/beranda/{{$post['id']}}" class="font-medium text-blue-500 hover:underline">pesan &raquo;</a>
       </article>


    </div>
  </main>
  
</div>
 
</body>
</html>
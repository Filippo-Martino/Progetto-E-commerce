<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
    {{-- favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

    {{-- swiper  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
</head>
<body>
    <x-navbar/>
    <x-header/>
    {{-- condizione per azzerare padding e margin dove è visibile l'header --}}
    <div class="@if (Route::currentRouteName() == 'articles.index' ||Route::currentRouteName() == 'homepage' || Route::currentRouteName() == 'category.show'||Route::currentRouteName() == 'aboutUs' ) mt-0 pt-0 @else mt-5 pt-5 @endif">

        
        <main>
            {{$slot}}
        </main>
        
        
    
        <x-footer/>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
        {{-- swiper js --}}
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        {{-- script di FontAwesome --}}
        <script src="https://kit.fontawesome.com/9d2cacc5ef.js" crossorigin="anonymous"></script>
        {{-- Script LiveWire --}}
        @livewireScripts
    </div>
</body>
</html>
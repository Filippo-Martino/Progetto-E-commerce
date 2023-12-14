<x-layout>




    @if (session('access.denied'))
        <div class="alert alert-danger text-center">
            {{ session('access.denied') }}
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 style="font-weight: 600">{{__('ui.welcomeToHomepage')}}</h1>
            </div>
            <div class="col-12 my-5">
                <!-- Swiper -->
                <div class="text-center">
                    <h3 class= "opacity-0" style="font-weight: 500">{{__('ui.categoriesName')}}:</h3>
                </div>
                <!-- Swiper icone categorie -->
                <div class="swiper swiper-categories">
                    <div class="swiper-wrapper swiper-categories-wrapper">
                        @foreach($categories as $category)
                            <div class="my-5 swiper-slide swiper-categories-slide text-center">
                            <a href="{{ route('category.show', compact('category')) }}" class="text-decoration-none">
                                <div class="icon rounded-circle position-relative" style="background-color: {{$category->colour}}">
                                    <i class="mobile fa-solid text-white {{$category->icon}} position-absolute"></i>
                                </div>
                                <p class= "mt-3 text-center d-none d-md-block fs-6 namecategory">{{__('ui.'.$category->name )}}</p>                                  
                            </a>
                            </div>
                            

                        @endforeach

                        
                    </div>
                    <div class="swiper-button-next swiper-button-categories-next"></div>
                    <div class="swiper-button-prev swiper-button-categories-prev"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- sezione card --}}
    @if(!count($articles))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="animateanimated animatebackInLeft text-center fw-medium my-5">
                    {{__('ui.noAnnouncements_') }} </h3>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="animateanimated animate__backInLeft text-center fw-medium my-5">
                    {{__('ui.latestannouncements')}}</h3>
            </div>
        </div>
    </div>
    @endif
    {{-- carousel con ultimi articoli --}}
    <div class="container my-3">
        <div class="row">

            {{-- https://codesandbox.io/p/sandbox/99q73d?file=%2Findex.html%3A33%2C1-40%2C6 --}}

            <div class="swiper mySwiper mySwiper-latest">
                <div class="swiper-wrapper swiper-wrapper2">
                    @foreach ($articles as $article)
                        <div class="swiper-slide swiper-slide2 slide-home">
                            <x-card :article="$article"></x-card>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination swiper-pagination2"></div>
                <div class=" swiper-button-next swiper-button-latest-next "></div>
                <div class=" swiper-button-prev swiper-button-latest-prev "  ></div>
            </div>

        </div>
    </div>



</x-layout>

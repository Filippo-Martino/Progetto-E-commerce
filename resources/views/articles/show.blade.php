<x-layout>

    <livewire:article-show articleId='{{ $article->id }}'></livewire:article-show>
    <div class="@if (!count($articles_filtered_category)) d-none @endif container">
        <div class="row">
            <div class="col-12 mt-5 text-center">
                <hr>
                <h3 class="my-4">{{ __('ui.relatedProducts') }}</h3>
            </div>
        </div>
    </div>
    {{--  <div class="container my-3">
        <swiper-container class="mySwiper-correlati" init="false">
            @foreach ($articles_filtered_category as $article)
                <swiper-slide class="slide-correlati mb-3">
                    <x-card :article="$article"></x-card>
                </swiper-slide>
            @endforeach
          
        </swiper-container>
    </div> --}}
    <div class="container my-3">
        <div class="swiper mySwiper mySwiper-latest">
            <div class="swiper-wrapper swiper-wrapper2">
                @foreach ($articles_filtered_category as $article)
                    <div class="swiper-slide swiper-slide2 slide-home">
                        <x-card :article="$article"></x-card>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination2"></div>
            <div class=" swiper-button-next swiper-button-latest-next "></div>
            <div class=" swiper-button-prev swiper-button-latest-prev "></div>
        </div>
    </div>

</x-layout>

<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 text-center">
                <h3>{{__('ui.welcome')}} <span class="text-capitalize">{{ Auth::user()->name }}</span></h3>
            </div>
        </div>
    </div>
    @if(!count($articles))
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <p>{{__('ui.noAnnouncement')}}</p>
            </div>
        </div>
    </div>
    @else
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <p>{{__('ui.allAnnouncement')}}</p>
            </div>
        </div>
        @if(count($articles->where('is_accepted','===',1)))
            <div class="col-12 my-3">
                <h3>{{__('ui.announcementPubblicated')}}</h3>
                <div class="swiper mySwiper mySwiper-latest">
                    <div class="swiper-wrapper swiper-wrapper2">
                        @foreach ($articles->where('is_accepted','===', 1) as $article)
                            <div class="swiper-slide swiper-slide2 slide-home">
                                <x-card :article="$article"></x-card>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination swiper-pagination2"></div>
                </div>
            </div>
        @endif
        @if(count($articles->where('is_accepted','===',null)))
            <div class="col-12 my-3">
                <h3>{{__('ui.revisoredAnnouncement')}}</h3>
                <div class="swiper mySwiper mySwiper-latest">
                    <div class="swiper-wrapper swiper-wrapper2">
                        @foreach ($articles->where('is_accepted', '===' ,null) as $article)
                            <div class="swiper-slide swiper-slide2 slide-home">
                                <x-card :article="$article"></x-card>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination swiper-pagination2"></div>
                </div>
            </div>
        @endif
        @if(count($articles->where('is_accepted','===',0)))
            <div class="col-12 my-3">
                <h3>{{__('ui.rejectAnnouncement')}}</h3>
                <div class="swiper mySwiper mySwiper-latest">
                    <div class="swiper-wrapper swiper-wrapper2">
                        @foreach ($articles->where('is_accepted', '===', 0) as $article)
                            <div class="swiper-slide swiper-slide2 slide-home">
                                <x-card :article="$article"></x-card>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination swiper-pagination2"></div>
                </div>
            </div>
        @endif
        
    </div>
    @endif

</x-layout>

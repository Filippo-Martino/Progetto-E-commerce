<div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7 mt-5 d-flex justify-content-center">
                @if ($article->images->isNotEmpty())
                    <div id="carouselExampleAutoplaying" class="carousel slide carousel-custom" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($article->images as $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{$image->getUrl(400, 400)}}" class="card-img-top" alt="foto articolo">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('ui.previous') }}</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('ui.next') }}</span>
                        </button>
                    </div>
                @else
                            <div class="">
                                <img src="/img/image.png" class=" img-fluid" alt="immagine">
                            </div>
                @endif
                    

            </div>

            <div class="col-12 col-md-5 mt-5 text-center">
                <a href="{{ route('category.show', $article->category) }}">
                    <h6 class="card-text mb-4">{{__('ui.'.$article->category->name )}}</h6>
                </a>
                <hr>
                <h1 class="fw-normal">{{ $article->name }}</h1>
                <a class="brand text-decoration-none"
                    href="{{ route('articles.search', ['searched' => $article->brand]) }}">
                    <h5>{{ $article->brand }}</h5>
                </a>

                
                

                <div class="mb-4">
                    <h4>{{ $article->price }}€</h4>
                    <h6 class="text-secondary">{{ __('ui.free') }}</h6>
                </div>
                <div class="mb-4 safepayment p-4 w-70">
                    <h6 class="brand">{{__('ui.safePayment')}}</h6>
                    <i class="fa-brands fa-cc-visa fa-lg m-2"></i>
                    <i class="fa-brands fa-cc-mastercard fa-lg m-2"></i>
                    <i class="fa-brands fa-cc-paypal fa-lg m-2"></i>
                    <i class="fa-brands fa-apple-pay fa-lg m-2"></i>
                    <i class="fa-brands fa-google-pay fa-lg m-2"></i>
                    <i class="fa-brands fa-amazon-pay fa-lg m-2"></i>
                </div>
                {{--  CARRELLO --}}
                {{-- <div class="mb-4">
                <a href="" class="button-28"> Aggiungi al Carrello </a>
              </div> --}}
                <div class="mb-4">
                    <p>{{$article->longDescription}}</p>
                    <span class="text-secondary">{{__('ui.publishedBy')}}</span><h6 class="mb-3 text-capitalize">{{ $article->user->name }}</h6>
                </div>

                {{-- <div class="mb-4">
                    <h5>{{ __('ui.viewDescribe') }}</h5>
                    {{-- <p class="card-text">{{$article->description}}</p> --}}
                    {{-- <p class="card-text">{{ $article->longDescription }}</p> --}}
                {{-- </div>  --}}
            @if($article)
            @foreach($article->images as $image)
                <div class=" @guest d-none @elseif(Auth::user()->is_revisor && Route::currentRouteName() !== 'articles.show') @else d-none @endguest">
                <div class="d-flex col-12">
                    <div class="col-6 col-md-6 border-end">
                        <hr>
                        <h5 class="tc-accent text-start">Tags:</h5>
                        <div class="text-start">
                            @if ($image->labels)
                                @foreach($image->labels as $label)
                                    <p class="d-inline">{{$label}},</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-6 col-md-6 card-body text-start">
                        <hr>
                        <h5 class="ps-2">Revisione immagini:</h5>
                        <p class="ps-2">Adulti: <span class="{{$image->adult}}"></span></p>
                        <p class="ps-2">Satira: <span class="{{$image->spoof}}"></span></p>
                        <p class="ps-2">Medicina: <span class="{{$image->medical}}"></span></p>
                        <p class="ps-2">Violenza: <span class="{{$image->violence}}"></span></p>
                        <p class="ps-2">Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>
                    </div>
                </div>
                </div>
            @endforeach
            @endif
                {{-- pulsanti accetta ed elimina, nascosti a guest e auth, visibili se Revisore e se la rotta è diversa dalla vista articoli --}}
                <div
                    class=" @guest d-none @elseif(Auth::user()->is_revisor && Route::currentRouteName() !== 'articles.show') d-flex justify-content-center @else d-none @endguest">
                    <div class="d-flex my-5 p-0 ">
                        {{-- pulsante accetta --}}
                        {{-- non mostrato se l'articolo è già accettato --}}
                        <form
                            class="@if ($article->is_accepted == 1) d-none @elseif($article->is_accepted === null) m-3 @endif"
                            {{-- rimanda a rotta preview se is accepted è null, alla tabella eliminati diversamente --}}
                            action="{{ route($article->is_accepted === null ? 'revisor.accept_article' : 'revisor.accept_article_deleted', ['article' => $article]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success shadow">{{ __('ui.accept') }}</button>
                        </form>
                        {{-- pulsante rifiuta --}}
                        <form
                            class="@if ($article->is_accepted === 0) d-none @elseif($article->is_accepted === null) m-3 @endif "
                            action="{{ route($article->is_accepted === null ? 'revisor.reject_article' : 'revisor.reject_article_confirmed', ['article' => $article]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger shadow">{{ __('ui.reject') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

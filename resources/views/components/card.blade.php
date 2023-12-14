
    <div class="card w-100 rounded-3 shadow">

        <a href="{{ route('articles.show', compact('article')) }}"><img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(400,400): '/img/image.png'}}" class="card-img-top" alt="foto articolo"></a>
        <div class="card-body text-center d-flex flex-column justify-content-between">
            <div class= "d-flex flex-column justify-content-between">
                {{-- condizione che diminuisce font size se troppo lungo il titolo --}}
                <a href="{{ route('articles.show', compact('article')) }}"><h4 class="card-title card-title-text
                    {{-- @if(mb_strlen($article->name, 'UTF-8') > 10) fs-5 @endif --}}
                    ">{{ $article->name }}</h4></a>
                <h6 class="card-text text-secondary">
                    <a href="{{route('articles.search', ['searched'=>$article->brand])}}" class= "text-secondary">{{ $article->brand }}
                        </a></h6>
                
            </div>

            
            
            
            <div class="d-flex flex-column justify-content-between align-items-center">
                <a href="{{route("category.show",$article->category)}}">
                    <h6 class="card-text"> {{__('ui.'.$article->category->name )}}</h6>
                </a>
                
                <p class="card-text text-danger">{{ $article->price }}€</p>
                <a href="{{ route('articles.show', compact('article')) }}" class="button-28">{{__('ui.details')}}</a>
                <p class="card-text text-secondary mt-1 fs-6 fw-lighter">{{__('ui.createdAt')}} {{ $article->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>


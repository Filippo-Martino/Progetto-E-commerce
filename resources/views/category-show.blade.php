<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center" style="background-color:{{$category->colour}}">
            <div class="col-12 d-flex justify-content-center category-fa" style="min-height:100px">
                <i class="fa-solid mx-3 text-white {{$category->icon}}"></i>
            </div>
            <div class="col-12 text-center">
                <h1 class= "text-white">{{__('ui.'.$category->name )}}</h1>
            </div>
        </div>
        <div class="row justify-content-center justify-content-md-start ">
            @forelse ($articlesByCategory as $article)
                    <div class="col-11 col-md-4 col-lg-3 my-3 d-flex">
                        <x-card :article='$article' />
                    </div>
                    @empty
                <div class=" mt-5 col-12 d-flex justify-content-center text-center ">
                    <h3>{{ __('ui.noCategory')}}</h3>
                </div>
                <div class="col-12 text-center mt-4">
                    <a href="{{route('articles.create')}}"
                        class="btn btn-outline-dark">{{ __('ui.categoryAdd') }}</a>
                </div>
            @endforelse
        </div>
        <div class="row justify-content-center justify-content-md-start">
            {{-- pagination --}}
            <div class="d-flex justify-content-center">
                {{ $articlesByCategory->links() }}
            </div>
        </div>

    </div>
</x-layout>

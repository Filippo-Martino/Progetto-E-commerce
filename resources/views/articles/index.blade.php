<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="animate__animated animate__backInLeft text-center fw-medium my-4">
                    {{ __('ui.all_announcements') }} @if (Route::currentRouteName()=='articles.search'){{__('ui.researchContained')}} @endif</h3>
            </div>
        </div>
        <div class="row justify-content-center justify-content-md-start">
            @forelse ($articles as $article)
                <div class="col-11 col-md-4 col-lg-3 my-5 d-flex">
                    <x-card :article="$article"></x-card>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning py-3 shadow text-center">
                        <p class="lead">{{ __('ui.noAnnouncements') }}</p>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="row justify-content-center justify-content-md-start">
            {{-- pagination --}}
            <div class="d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-layout>

<x-layout>
    <div class="container">

        <div class="row">
            @if (session('message1'))
                <div class="alert alert-success text-center">
                    {{ session('message1') }}
                </div>
            @endif
            @if (session('message2'))
                <div class="alert alert-danger text-center">
                    {{ session('message2') }}
                </div>
            @endif
            <div class="col-12 text-center my-4">
                @if ($article_to_check)
                    <h1>{{ __('ui.announcementToApprove') }}</h1>
                @else
                    <h1>{{ __('ui.noannouncementsToApprove') }}</h1>
                @endif
                </h1>
            </div>
        </div>
        <x-revisor-buttons />
    </div>

    {{-- vista degli annunci da revisionare --}}
    @if ($article_to_check)
        <livewire:article-show articleId='{{ $article_to_check->id }}'></livewire:article-show>
    @endif
</x-layout>

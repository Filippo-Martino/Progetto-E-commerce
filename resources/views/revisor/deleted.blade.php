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
                {{-- @dd($articles_deleted) --}}
                 @if(count($articles_deleted))
                 <h1>{{__('ui.announcementDelete')}}</h1> 
                 @else
                 <h1>{{__('ui.noannouncementDelete')}}</h1>
                 @endif
                </h1>
            </div>
        </div>   
        
        <div class="row justify-content-between">
            <x-revisor-buttons/>
        </div>

        <x-revisor-table :articles="$articles_deleted"/>
        <div class="row justify-content-center justify-content-md-start">
            {{-- pagination --}}
            <div class="d-flex justify-content-center">
                {{ $articles_deleted->links() }}
            </div>
        </div>
    </div>
</x-layout>
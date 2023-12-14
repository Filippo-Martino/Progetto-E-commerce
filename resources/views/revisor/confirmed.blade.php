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
                @if(count($articles_confirmed)) 
                <h1>{{__('ui.publishedannouncement')}}</h1> 
                @else
                <h1>{{__('ui.noPublishedannouncement')}}</h1>
                @endif
               </h1>
           </div>
        </div>   
        <x-revisor-buttons/>
        <div class="col-12">

            <x-revisor-table :articles="$articles_confirmed"/>
            <div class="row justify-content-center justify-content-md-start">
                {{-- pagination --}}
                <div class="d-flex justify-content-center">
                    {{ $articles_confirmed->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
<x-layout>
    <div class="container">
        <x-revisor-buttons/>
    </div>
    {{-- vista degli annunci da revisionare --}}
    <livewire:article-show articleId='{{$article->id}}'></livewire:article-show>
        
</x-layout>
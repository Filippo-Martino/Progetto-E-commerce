<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8 col-lg-6 d-flex flex-column align-items-center my-5 box shadow-custom rounded-5">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                {{-- SE è REVISORE NON DEVE VEDERE QUESTA VISTA --}}
                @if (Auth::user()&&Auth::user()->is_revisor) 
            
                <div class="alert alert-success">
                    {{__('ui.alreadyRevisor')}}
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Auth::user()&&Auth::user()->is_revisor) 

                <div class="">
                    {{__('ui.goTo')}}
                    <a href="{{route('revisor.index')}}">{{__('ui.revisorAnnouncement')}}</a>
                </div>
                @else
                
                <h1>{{__('ui.workWithUs')}}</h1>
                <h3 class="mb-5">{{__('ui.yourData')}}</h3>

                <form class="row w-100 g-3 needs-validation" action="{{ route('become.revisor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="name" class="form-label">{{__('ui.name')}}</label>
                        <input type="text" name="name" class="form-control form-control-custom" value="{{old('name')}}" 
                            id="name">

                    </div>
                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="surname" class="form-label">{{__('ui.surname')}}</label>
                        <input type="text" name="surname" class="form-control form-control-custom" value="{{old('surname')}}"
                            id="surname">

                    </div>
                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="number" class="form-label">{{__('ui.number')}}</label>
                        <input type="text" name="number" class="form-control form-control-custom" value="{{old('number')}}"
                            id="number">

                    </div>

                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="address" class="form-label">{{__('ui.address')}}</label>
                        <input type="text" name="address" class="form-control form-control-custom" value="{{old('address')}}"
                            id="address">

                    </div>
                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="city" class="form-label">{{__('ui.city')}}</label>
                        <input type="text" name="city" class="form-control form-control-custom" value="{{old('city')}}"
                            id="city">

                    </div>

                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="description" class="form-label">{{__('ui.message')}}</label>
                        <textarea class="form-control form-control-custom" name="description" id="description" rows="3">{{old('description')}}</textarea>
                    </div>
                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="file" class="form-label">{{__('ui.curriculum')}}</label>
                        <input type="file" name="file" class="form-control form-control-custom"
                            id="file">

                    </div>
                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                {{__('ui.terms')}}
                            </label>

                        </div>
                    </div>
                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <button class="btn btn-primary" type="submit">{{__('ui.sendRequest')}}</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>


</x-layout>

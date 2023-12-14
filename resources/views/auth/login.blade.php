<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8 col-lg-6 d-flex flex-column align-items-center my-5 box shadow-custom rounded-5">
                <h1 class="my-5">{{__('ui.login')}}</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="w-100" method="POST" action={{route('login')}}>
                    @csrf
                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="email" class="form-label">{{__('ui.mail')}}</label>
                        <input type="email" name= "email" class="form-control form-control-custom" id="email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="password" class="form-label">{{__('ui.password')}}</label>
                        <input type="password" name= "password" class="form-control form-control-custom" id="password">
                    </div>
                    <div class="text-center mt-5">
                    <button type="submit" class="btn button-28-custom">{{__('ui.login')}}</button>
                    </div>
                    <div class="col-12 text-center mt-3">
                        <p>{{__('ui.notRegistered')}}<br><a href="{{route('register')}}">{{__('ui.registerHere')}}</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>

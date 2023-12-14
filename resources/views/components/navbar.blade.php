<nav class="navbar navbar-custom navbar-expand-lg fixed-top w-100 fs-6 " data-bs-theme="dark">
    <div class="container-fluid">
        {{-- logo --}}
        <a class="navbar-brand mx-md-1 mx-lg-1" href="{{ route('homepage') }}">
            <img src="/img/Presto-removebg-preview.png" alt="" width="60">
        </a>
        {{-- toggle mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            @auth
            @if (Auth::user()->is_revisor && App\Models\Article::toBeRevisionedCount() != null)
                {{-- notifica mobile su toggle --}}
                <span class="notifica-toggle position-absolute translate-middle badge rounded-pill bg-danger">
                    {{ App\Models\Article::toBeRevisionedCount() }}
                </span>
                @endif
            @endauth
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
                {{-- barra di ricerca solo mobile --}}
                <li class="nav-item d-block d-lg-none mt-2">
                    <form action={{ route('articles.search') }} method= "GET" class="d-flex" role="search">
                        <input name="searched" class="form-control form-control-search me-2" type="search"
                            placeholder="Search" aria-label="Search">
                        <button class="btn" type="submit"><i
                                class="fa-solid fa-magnifying-glass fa-lg"></i></button>
                    </form>
                </li>
                

                {{-- vendi --}}
                
                <li class="nav-item mx-md-1 mx-lg-1">
                    <a class="nav-link @if (Route::currentRouteName() == 'articles.create') active @endif"
                        href="{{ route('articles.create') }}">{{ __('ui.sell') }}</a>
                </li>
                
                {{-- tutti gli annunci --}}
                <li class="nav-item mx-md-1 mx-lg-1">
                    <a class="nav-link text-nowrap @if (Route::currentRouteName() == 'articles.index') active @endif" aria-current="page"
                        href="{{ route('articles.index') }}">{{ __('ui.all_announcements') }}</a>
                </li>


                {{-- categorie --}}
                <li class="nav-item dropdown mx-md-1 mx-lg-1">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        id="categoriesDropdown" aria-expanded="false">
                        {{ __('ui.categoriesName') }}
                    </a>
                    {{-- dropdown categorie --}}
                    <ul class="dropdown-menu dropdown-menu-custom" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item text-white d-flex justify-content-start align-items-center"
                                    href="{{ route('category.show', compact('category')) }}">
                                    <div class="col-1 d-flex justify-content-center">
                                        <i class="fa-solid {{$category->icon}}"></i>
                                    </div>
                                    <div class= ms-2>
                                         {{__('ui.'.$category->name )}}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                {{-- barra di ricerca visibile solo desktop --}}
                <li class="nav-item d-none d-lg-block container-fluid">
                    <form action="{{ route('articles.search') }}" method="GET" class="d-flex" role="search">
                        <input name="searched" class="form-control form-control-search me-2" type="search"
                            placeholder="Search" aria-label="Search">
                        <button class="btn" type="submit"><i
                                class="fa-solid fa-magnifying-glass fa-lg"></i></button>
                    </form>
                </li>

                {{-- profilo revisore dropdown--}}
                @auth
                @if (Auth::user()->is_revisor)
                <li class="nav-item dropdown mx-lg-1">
                    {{-- profilo rev desktop --}}
                    <a class="nav-link dropdown-toggle d-none d-md-block" href="#" role="button" data-bs-toggle="dropdown"
                        id="categoriesDropdown" aria-expanded="false">{{ __('ui.revisorProfile') }}
                        @if (App\Models\Article::toBeRevisionedCount() != null)
                        {{-- notifica desktop --}}
                        <span class="notifica position-absolute translate-middle badge rounded-pill bg-danger">
                            {{ App\Models\Article::toBeRevisionedCount() }}
                        </span>
                        @endif
                        
                    </a>

                    {{-- profilo rev mobile --}}
                    <a class="nav-link dropdown-toggle d-md-none" href="#" role="button" data-bs-toggle="dropdown"
                        id="categoriesDropdown" aria-expanded="false">{{ __('ui.revisorProfile') }}
                        {{-- notifica mobile --}}
                        @if (App\Models\Article::toBeRevisionedCount() != null)
                        <span class="badge text-bg-danger rounded-pill">{{ App\Models\Article::toBeRevisionedCount() }}
                            <span class="visually-hidden">{{ __('ui.unread') }}</span>
                        </span>
                        @endif    
                    </a>
                    {{-- dropdown profilo revisore --}}
                    <ul class=" nav-item dropdown-menu dropdown-menu-lg-end dropdown-menu-custom">
                        {{-- anteprima annunci --}}
                        <li>
                            <a class="dropdown-item text-white"
                                href="{{ route('revisor.index') }}">{{ __('ui.previewArticle') }}</a>
                        </li>
                        {{-- lista da approvare --}}
                        <li>
                            <a class="dropdown-item text-white"
                                href="{{ route('revisor.inRevision') }}">{{ __('ui.toBeApproved') }}</a>
                        </li>
                        {{-- lista confermati --}}
                        <li>
                            <a class="dropdown-item text-white"
                                href="{{ route('revisor.confirmed') }}">{{ __('ui.listConfirmed') }}</a>
                        </li>
                        {{-- lista eliminati --}}
                        <li>
                            <a class="dropdown-item text-white"
                                href="{{ route('revisor.deleted') }}">{{ __('ui.listRejected') }}</a>
                        </li>
                    </ul>
                </li>
                @endif
                @endauth
                {{-- fine profilo revisore --}}
                {{-- Area personale SOLO GUEST --}}
                @guest
                <li class="nav-item dropdown ms-lg-auto mx-md-1 mx-lg-1">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.personalArea') }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-custom">
                        <li>
                            <a class="dropdown-item text-white"
                                href="{{ route('register') }}">{{ __('ui.register') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" href="{{ route('login') }}">{{ __('ui.login') }}</a>
                        </li>
                    </ul>
                </li>
                @endguest
                {{-- Area personale SOLO UTENTI --}}
                @auth
                <li class="nav-item dropdown ms-lg-auto mx-md-1 mx-lg-1">
                        {{-- nome utente --}}
                        <a class="nav-link dropdown-toggle text-capitalize" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person"></i>
                            {{ Auth::user()->name }}
                        </a>
                        {{-- dropdown nome utente --}}
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{route('auth.profile')}}">{{__('ui.profile')}}</a>
                            </li>
                            {{-- LOGOUT --}}
                            <li class="nav-item">
                                <form class="" method="POST"action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">{{ __('ui.logout') }}</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                {{-- lingua --}}
                <li class="nav-item dropdown ms-lg-auto mx-md-1 mx-lg-1">
                    <a href="" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="bi bi-globe"></i> {{ __('ui.language') }} </a>
                        {{-- dropdown lingua --}}
                    <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-custom">
                        <li class="nav-item d-flex align-items-center"><x-_locale lang='it' nation='it' />IT
                        </li>
                        <li class="nav-item d-flex align-items-center"><x-_locale lang='en' nation='en' />EN
                        </li>
                        <li class="nav-item d-flex align-items-center"><x-_locale lang='fr' nation='fr' />FR
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

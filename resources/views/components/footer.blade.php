
<div class="container-fluid footer z-10 ">
    <footer class="py-3 ">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="{{route('homepage')}}" class="nav-link px-2 ">Home</a></li>
        <li class="nav-item"><a href="{{route('aboutUs')}}" class="nav-link px-2 ">{{__('ui.aboutUs')}}</a></li>
        <li class="nav-item @if (Auth::user()&&Auth::user()->is_revisor) d-none @endif "><a href="{{route('complete.form')}}" class="nav-link px-2 ">{{__('ui.workWithUs')}}</a></li>
        
      </ul>
      <p class="text-center">© 2023 Smart Dev Minds Company, Inc</p>
    </footer>
  </div>
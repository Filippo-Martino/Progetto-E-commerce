{{-- button revisor solo da desktop --}}
<div class="row justify-content-between buttonRevisor">
    <div class="col-3 d-flex justify-content-center ">
        <a class="btn btn-outline-dark @if (Route::currentRouteName() == 'revisor.index') active @endif"
            href="{{ route('revisor.index') }}">{{ __('ui.previewArticle') }}</a>
    </div>
    <div class="col-3 d-flex justify-content-center">
        <a class="btn btn-outline-dark @if (Route::currentRouteName() == 'revisor.inRevision') active @endif"
            href="{{ route('revisor.inRevision') }}">{{ __('ui.toBeApproved') }}</a>
    </div>
    <div class="col-3 d-flex justify-content-center">
        <a class="btn btn-outline-dark @if (Route::currentRouteName() == 'revisor.deleted') active @endif"
            href="{{ route('revisor.deleted') }}">{{ __('ui.listRejected') }}</a>
    </div>
    <div class="col-3 d-flex justify-content-center">
        <a class="btn btn-outline-dark @if (Route::currentRouteName() == 'revisor.confirmed') active @endif"
            href="{{ route('revisor.confirmed') }}">{{ __('ui.listConfirmed') }}</a>
    </div>
</div>

{{-- bottone off-canvas solo da mobile --}}
<div class="d-flex justify-content-center ">
    <button class="btn btn-outline-dark  offcanvasCustom " type="button" data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">{{__('ui.filters')}}</button>
</div>
    
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">{{__('ui.filters')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="col-12 d-flex  ">
            <a class="nav-link @if (Route::currentRouteName() == 'revisor.index') active @endif"
                href="{{ route('revisor.index') }}">{{ __('ui.previewArticle') }}</a>
            </div>
            <hr>
            <div class="col-12 d-flex ">
                <a class="nav-link @if (Route::currentRouteName() == 'revisor.inRevision') active @endif"
                href="{{ route('revisor.inRevision') }}">{{ __('ui.toBeApproved') }}</a>
            </div>
            <hr>
            <div class="col-12 d-flex ">
                <a class="nav-link @if (Route::currentRouteName() == 'revisor.deleted') active @endif"
                href="{{ route('revisor.deleted') }}">{{ __('ui.listRejected') }}</a>
            </div>
            <hr>
            <div class="col-12 d-flex ">
                <a class="nav-link @if (Route::currentRouteName() == 'revisor.confirmed') active @endif"
                href="{{ route('revisor.confirmed') }}">{{ __('ui.listConfirmed') }}</a>
            </div>
            <hr>
        </div>
    </div>
    
<div class="row my-5 @if(!count($articles)) d-none @endif">
    <div class="col-12">
        <table class="table">
            <thead>
              <tr>
                <th class="d-none d-md-table-cell" scope="col-1">{{__('ui.date')}}</th>
                <th scope="col-3">{{__('ui.title')}}</th>
                <th class="d-none d-md-table-cell" scope="col-3">{{__('ui.seller')}}</th>
                <th scope="col-3"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr>
                  <th class="d-none d-md-table-cell" scope="row">{{$article->created_at->format('d/m/Y')}}</th>
                  <td>{{$article->name}}</td>
                  <td class="d-none d-md-table-cell" >{{$article->user->name}}</td>
                  <td><a class="btn btn-outline-dark" href="{{route('revisor.show', compact('article'))}}">{{__('ui.buttonAction')}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
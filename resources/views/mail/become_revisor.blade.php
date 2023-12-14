<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div>
        <h1>{{__('ui.request')}}</h1>
        <h2>{{__('ui.showData')}}</h2>
        <p>{{__('ui.name')}}{{$userData['name']}}</p>
        <p>{{__('ui.surname')}} {{$userData['surname']}}</p>
        <p>{{__('ui.number')}}{{$userData['number']}}</p>
        <p>{{__('ui.address')}}{{$userData['address']}}</p>
        <p>{{__('ui.city')}}{{$userData['city']}}</p>
        <p>{{__('ui.showMessage')}}</p>
        <p>{{$userData['description']}}</p>
        <p>{{__('ui.beRevisor')}}</p>

{{-- {{ $userData['file'] }} --}}

        <a href="{{route('make.revisor',['user'=>$userData['user']])}}">{{__('ui.addRevisor')}}</a>
    </div>
</body>
</html>
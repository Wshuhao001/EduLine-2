@extends('layout')

@section('content')

    <div class="container mt-4">
        <div class="alert alert-info" role="alert">
             Очікується зарахування коштів
            <br>
            <a href="{{redirect()->back()}}">Повернутись назад <i class="fa fa-backward fa-black" aria-hidden="true"></i></a>
        </div>
    </div>


@endsection
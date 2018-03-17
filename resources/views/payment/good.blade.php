@extends('layout')

@section('content')

    <div class="container mt-4">
        <div class="alert alert-success" role="alert">
            <strong>Ура!</strong> Оплата успішно виконана !
            <br>
            <a href="{{redirect()->back()}}">Повернутись назад <i class="fa fa-backward fa-black" aria-hidden="true"></i></a>
        </div>
    </div>


@endsection
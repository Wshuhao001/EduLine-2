@extends('layout')

@section('content')

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">{{$search}}</h1>
            </div>
        </section>

        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        @if(count($courses) != 0)
                            @foreach($courses as $course)
                            <div onclick="window.location.href='{{route('course.index',[$course->id])}}'" class="row dictionary-list mt-4">
                                <div class="col-md-2 pl-0 text-center">
                                        <img class="img-fluid" src="{{$course->getImage()}}">
                                </div>
                                <div class="col-md-4 text-center">
                                    <h4 class="dictionary-title">{{$course->title}}</h4>
                                    <a class="text-muted">by {{$course->author->name}}</a>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-2 text-center">
                                    <h3 class="words-number">{{$course->price}} грн.</h3>
                                </div>
                            </div>
                            @endforeach

                        @else
                            <div class="alert alert-info mt-3">Не знайдено курсів за запитом "{{$search}}"
                                <br>
                                <a href="/">Повернутись назад </a>
                            </div>

                        @endif
                    </div>

                </div>



            </div>
        </div>

    </main>


@endsection
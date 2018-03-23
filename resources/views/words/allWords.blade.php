@extends('layout')

@section('content')



    <section class="jumbotron text-left">
        <style type="text/css">
            .jumbotron {
                background-color: #2A303B;
                border-radius:0;
            }
        </style>

        <div class="container">


            <div class="row">
                <div class="col-md-4">
                    <img align="center" class="img-fluid" src="{{$course->getImage()}}">
                </div>
                <div class="col-md-8">

                    <h1 class="jumbotron-heading text-light">{{$course->title}}</h1>
                    <p class="lead text-light">{{$course->description}}</p>

                        <a href="{{route('course.lessons', [$course->id, 0])}}"><button  align="center" class="btn btn-primary ml-3 mt-1">Перейти до уроків</button></a>
                        <a href="{{route('course.words', $course->id)}}"><button  align="center" class="btn btn-primary ml-3 mt-1">Перейти до вивчення термінів</button></a>

                    <div class="row mt-2">
                        <div class="col-sm-4">
                            <p class="text-light">Автор: <a class="text-light" href="{{route('teacher_courses.index', $course->author->id)}}">{{$course->author->name}}</a></p>
                        </div>
                        <div class="col-sm-5 text-left">
                            <p class="text-light">Зареєстрованих студентів: {{$course->countStudents()}}</p>
                        </div>
                    </div>
                    
                </div>

            </div>


        </div>
    </section>




    <div class="main mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="word-list">
                            <div class="row">
                                <div onclick="window.location.href='{{route('course.wordsStudy',$course->id)}}'" class="col-sm-11 word-function text-center">
                                    <i class="fa fa-repeat fa-3x icons" aria-hidden="true"></i>
                                    <p class="text-muted">Вчити</p>
                                </div>
                            </div>
                            @foreach($words as $word)
                            <div class="row dictionary-list">

                                <div class="col-sm-5 text-center first-word">
                                    <h5 class="text-muted dictionary-word">{{$word->word}}</h5>
                                </div>
                                <div class="col-sm-5 text-center">
                                    <p class="text-muted dictionary-word">{{$word->translate}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <div class="d-flex justify-content-center text-center">
                                        @if($course->category->group == 2)
                                        <audio class="mt-3" controls src="/{{$word->sound($word->id)}}">Прослухати</audio>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>


                    </div>
                    <div class="col-md-3 d-none d-md-block d-lg-block">
                        <div class="side-block">
                            <h5 class="text-center">Популярні набори</h5>
                            <hr>
                            <ul>
                                <li><a class="font-weight-light text-muted " href="#">Привіт як справи ?</a></li>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                            </ul>
                        </div>
                        <div class="side-block">
                            <h5 class="text-center">Популярні курси</h5>
                            <hr>
                            <ul>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                            </ul>
                        </div>
                        <div class="side-block">
                            <h5 class="text-center">Нові статті</h5>
                            <hr>
                            <ul>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                                <li><a class="font-weight-light text-muted" href="#">test</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>






@endsection
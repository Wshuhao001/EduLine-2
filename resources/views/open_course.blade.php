@extends('layout')

@section('content')

    <main role="main">

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
                        <img  align="center" class="img-fluid" src="{{$course->getImage()}}" alt="">
                    </div>
                    <div class="col-md-8">
                        <h1 class="jumbotron-heading text-light">{{$course->title}}</h1>

                        <p class="lead text-light">{{$course->description}}</p>

                        <a href="{{route('course.lessons', [$course->id, 0])}}"><button  align="center" class="btn btn-primary ml-3 mt-1">Перейти до уроків</button></a>
                        <a href="{{route('course.words', $course->id)}}"><button  align="center" class="btn btn-primary ml-3 mt-1">Перейти до вивчення термінів</button></a>

                        <div class="row">
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




        <div class="container ">
        @if($lessons != null)
            <div class="row mt-3">
                <div class="col-md-12">
                    <video class="video-js w-100" height="560" controls
                           poster="{{$course->getImage()}}" data-setup="{}">
                        <source src="/videos/{{$lessons[$lesson_id]}}" type='video/mp4'>
                    </video>
                </div>
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    @if($lesson_id != 0)
                        <h4 class="text-muted">Попередній урок:</h4>
                        <div class="next-video">
                            <video onclick="window.location.href='{{route('course.lessons',[$course->id, $lesson_id-1])}}'" class="video-js w-100" controls
                                   poster="{{$course->getImage()}}" data-setup="{}">
                            </video>
                        </div>
                        <a href="{{route('course.lessons',[$course->id, $lesson_id-1])}}" class="text-muted">Урок {{$lesson_id-1}}</a>
                    @endif

                        <hr>
                    @if($lesson_id != count($lessons)-1)
                        <h4 class="text-muted">Наступний урок:</h4>
                        <div class="next-video">
                            <video onclick="window.location.href='{{route('course.lessons',[$course->id, $lesson_id+1])}}'" class="video-js w-100" controls
                                   poster="{{$course->getImage()}}" data-setup="{}">
                            </video>
                        </div>
                        <a href="{{route('course.lessons',[$course->id, $lesson_id+1])}}" class="text-muted">Урок {{$lesson_id+1}}</a>
                    @endif





                </div>
            </div>
        @else
            <h3 align="center" class="mt-2 text-muted">Автор ще не додав уроки</h3>
        @endif

        </div>

    </main>


@endsection
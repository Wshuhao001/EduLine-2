@extends('layout')

@section('content')



    <section class="jumbotron text-left">
        <style type="text/css">
            .jumbotron {
                background-color: #2A303B;
            }
        </style>

        <div class="container">


            <div class="row">
                <div class="col-md-4">
                    <img align="center" class="img-fluid course-avatar" src="{{$course->getImage()}}" alt="">
                </div>
                <div class="col-md-8">
                    <h1 class="jumbotron-heading text-light">{{$course->title}}</h1>
                    <a href="{{route('course.lessons', [$course->id, 0])}}"><button  align="center" class="btn btn-primary ml-3">Перейти до уроків</button></a>
                    <a href="{{route('course.words', $course->id)}}"><button  align="center" class="btn btn-primary ml-3">Перейти до вивчення термінів</button></a>
                    <p class="lead text-light">{{$course->description}}</p>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="text-light">Автор: <a class="text-light" href="{{route('teacher_courses.index', $course->author->id)}}">{{$course->author->name}}</a></p>
                        </div>
                        <div class="col-sm-5 text-left">
                            <p class="text-light">Зареєстрованих студентів: {{$course->students}}</p>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </section>




    <div class="main mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div align="center" class="col-sm-8 study-block mt-3 pb-3">
                    {{Form::open(['route'=>'course.checkWord', 'method'=>'post'])}}
                    <h5 align="center" class="mt-2">{{$word->translate}}</h5>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <input name="word_id" type="hidden" value="{{$word->id}}">
                            <input name="course_id" type="hidden" value="{{$word->course_id}}">
                            <div class="form-group mt-3">
                                <input name="answer" type="text" class="form-control" id="translate" placeholder="Введіть відповідь для перевірки">
                            </div>

                            <button type="submit" class="btn btn-primary">Перевірити</button>
                        </div>

                    </div>

                    {{Form::close()}}

                </div>
                <div class="col-sm-2"></div>
            </div>


        </div>
        <div class="col-sm-2"></div>

    </div>
    </div>
    </div>



@endsection
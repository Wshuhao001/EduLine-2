@extends('layout')

@section('content')

    <main role="main">

        <section class="jumbotron text-left">
            <style type="text/css">
                .jumbotron {
                    background-color: #2A303B;
                }
            </style>

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img align="center" class="img-fluid course-avatar" src="img/course.jpg" alt="">
                    </div>
                    <div class="col-md-8">
                        <h1 class="jumbotron-heading text-light">{{$course->title}}</h1>
                        <button align="center" type="submit" class="btn btn-primary">Перейти до уроку</button>
                        <p class="lead text-light">{{$course->description}}</p>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="text-light">Автор: <a class="text-light" href="{{route('teacher_courses.index', $course->author->id)}}">{{$course->author->name}}</a></p>
                            </div>
                            <div class="col-sm-5 text-left">
                                <p class="text-light">Зареєстрованих студентів: {{$course->students}}</p>
                            </div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar progress1" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar progress2" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>


            </div>
        </section>

        @foreach($course->getLesson() as $tutorial)


        <div class="container ">
            <div class="row mt-3">
                <div class="col-md-12">
                    <video class="video-js w-100" height="560" controls
                           poster="{{$course->getImage()}}" data-setup="{}">
                        <source src="/videos/{{$tutorial}}" type='video/mp4'>
                    </video>
                </div>
                <div class="col-md-9">
                    <div class="video-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor veniam libero laudantium eius fugiat temporibus ipsa aut eveniet, provident nam rerum, incidunt iure quas dolore aperiam officiis, voluptates earum corrupti.</div>
                </div>
                <div class="col-md-3">
                    <div class="next-video"></div>
                    <a href="#" class="text-muted">Урок 1</a>
                    <div class="next-video"></div>
                    <a href="#" class="text-muted">Урок 2</a>
                    <div class="next-video"></div>
                    <a href="#" class="text-muted">Урок 3</a>
                    <div class="next-video"></div>
                    <a href="#" class="text-muted">Урок 4</a>
                </div>
            </div>

                <


        </div>

        @endforeach




    </main>


@endsection
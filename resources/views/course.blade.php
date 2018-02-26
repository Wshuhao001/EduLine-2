@extends('layout')

@section('content')

    <main role="main">

        <section class="jumbotron text-left">
            <style type="text/css">
                .jumbotron {
                    background: url(/img/course-bg.jpg);
                    height: 300px;
                }
            </style>

            <div class="container">
                <h1 class="jumbotron-heading text-light">{{$course->title}}</h1>
                <p class="lead text-light">{{$course->short_description}}</p>
                <div class="row">
                    <div class="col-sm-2">
                        <p class="text-light">Автор: <a class="text-light" href="{{route('teacher_courses.index', $course->author->id)}}">{{$course->author->name}}</a></p>
                    </div>
                    <div class="col-sm-3 text-left">
                        <p class="text-light">Зареєстрованих студентів: {{$course->students}}</p>
                    </div>
                </div>

            </div>
        </section>


        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="word-list">
                        <div class="row no-mobile">
                            <div class="col-md-12 new-skills">
                                <h4 class="text-muted">Чому я научусь ?</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                            @for($i = 0; $i < 3; $i++)
                                            <li class="features"><i class="fa fa-check fa-black" aria-hidden="true"></i>{{$course->skills}}</li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                            @for($i = 0; $i < 3; $i++)
                                                <li class="features"><i class="fa fa-check fa-black" aria-hidden="true"></i>{{$course->skills}}</li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 requirements">
                                <h4 class="text-muted">Вимоги</h4>
                                <ul class="list-group">
                                    <li class="list-group-item">{{$course->requirements}}</li>
                                    <li class="list-group-item">{{$course->requirements}}</li>
                                    <li class="list-group-item">{{$course->requirements}}</li>
                                    <li class="list-group-item">{{$course->requirements}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 description">
                                <h4 class="text-muted">Опис</h4>
                                <p class="text-left">{{$course->description}}</p>
                            </div>

                            <div class="col-md-12 compare d-none d-lg-block">


                                <div class="row">
                                    @if($relates->count() >= 1)
                                    <h4 class="text-muted">Порівняти зі схожими курсами</h4>
                                    <div class="col-md-12 comparison">
                                        @foreach($relates as $relate)
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img onclick="window.location.href='{{route('course.index', $relate->id)}}'" class="img-fluid related-course-img" height="25" src="{{$relate->getImage()}}">
                                            </div>
                                            <div class="col-md-5">
                                                <h4 class="text-muted font-weight-light related-course-info"><a href="{{route('course.index', $relate->id)}}">{{$relate->title}}</a></h4>
                                                <p class="text-muted">Автор: {{$relate->author->name}}</p>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="users-count">
                                                    <i class="fa fa-users text-muted" aria-hidden="true"></i> {{$relate->students}}
                                                </div>

                                            </div>
                                            <div class="col-md-3 text-center related-course-info">
                                                <h5>{{$relate->price}}$</h5>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12 edu-plan">
                                <h4 class="text-muted">Навчальний план цього курсу (Доробити)</h4>
                                <div class="col-md-12 plan-lesson">
                                    <div class="row">
                                        <div class="col-sm-8"><h5 class="text-muted text-center lesson-title"><i class="fa fa-arrow-right text-muted" aria-hidden="true"></i> Вивчення HTML</h5></div>
                                        <div class="col-sm-4 text-left lesson-title">07:47</div>
                                    </div>
                                </div>
                                <div class="col-md-12 plan-lesson">
                                    <div class="row">
                                        <div class="col-sm-8"><h5 class="text-muted text-center lesson-title"><i class="fa fa-arrow-right text-muted" aria-hidden="true"></i> Вивчення HTML</h5></div>
                                        <div class="col-sm-4 text-left lesson-title">07:47</div>
                                    </div>
                                </div>
                                <div class="col-md-12 plan-lesson">
                                    <div class="row">
                                        <div class="col-sm-8"><h5 class="text-muted text-center lesson-title"><i class="fa fa-arrow-right text-muted" aria-hidden="true"></i> Вивчення HTML</h5></div>
                                        <div class="col-sm-4 text-left lesson-title">07:47</div>
                                    </div>
                                </div>
                                <div class="col-md-12 plan-lesson">
                                    <div class="row">
                                        <div class="col-sm-8"><h5 class="text-muted text-center lesson-title"><i class="fa fa-arrow-right text-muted" aria-hidden="true"></i> Вивчення HTML</h5></div>
                                        <div class="col-sm-4 text-left lesson-title">07:47</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12 about-teacher">
                                <div align="center" class="teacher-info justify-content-center">
                                    <p align="center" class="text-muted small-head-text">Про викладача</p>
                                    <a href="{{route('teacher_courses.index', $course->author->id)}}">{{$course->author->name}}</a>
                                    <p><small class="text-muted">Вчитель на EduLine</small></p>
                                    <img width="100" height="100" class="rounded-circle teacher-avatar" src="/img/teacher.jpg">
                                </div>

                                <div class="row">
                                    <div class="col-md-4 text-center">

                                        <ul>
                                            <li><a href="{{route('teacher_courses.index', $course->author->id)}}"><i class="fa fa-youtube-play fa-black" aria-hidden="true"></i> 5 курсів</a> </li>
                                            <li><i class="fa fa-user fa-black" aria-hidden="true"></i> 65 студентів</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-8">
                                        <p>{{$course->author->short_description}}</p>
                                        <p>{{$course->author->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <h3 align="center" class="text-muted reviews-title">Відгуки студентів</h3>
                            <div class="course-reviews">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="course-review-info">
                                            <img height="60" width="60" class="rounded-circle" src="/img/teacher.jpg">

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="text-left review-author"><a href="#">Jason Brooksbank</a></p>
                                    </div>
                                    <div class="col-md-7 review-text">
                                        <p>Багато дізнався з цього курсу !!! Все дуже сподобалося. Багато дізнався з цього курсу !!! Все дуже сподобалося</p>
                                    </div>
                                </div>
                            </div>
                            <div class="course-reviews">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="course-review-info">
                                            <img height="60" width="60" class="rounded-circle" src="/img/teacher.jpg">

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="text-left review-author"><a href="#">Jason Brooksbank</a></p>
                                    </div>
                                    <div class="col-md-7 review-text">
                                        <p>Багато дізнався з цього курсу !!! Все дуже сподобалося. Багато дізнався з цього курсу !!! Все дуже сподобалося</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 course-buy">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="videoContainer">
                                <img align="center" class="img-fluid course-avatar" src="{{$course->getImage()}}">
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><img src="/img/play.png" alt="play" class="playBtn"></a>
                            </div>
                            <h4 align="center">{{$course->title}}</h4>
                            <h3 align="center">{{$course->price}}$</h3>
                            <button type="button" class="btn btn-warning btn-block">Купити</button>

                            <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#exampleModal">Спробувати</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Презентація курсу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video controls class="embed-responsive-item"  poster="{{$course->getImage()}}" controls>
                            <source src="{{$course->getDemo()}}" type="video/mp4">
                        </video>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
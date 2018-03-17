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
                    <a href="{{route('course.lessons', [$course->course_id, 0])}}"><button  align="center" class="btn btn-primary ml-3">Перейти до уроків</button></a>
                    <a href="{{route('course.words', $course->course_id)}}"><button  align="center" class="btn btn-primary ml-3">Перейти до вивчення термінів</button></a>
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
                    <div class="col-md-9">
                        <div class="word-list">
                            <div class="row">
                                <div class="col-sm-11 word-function text-center">
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
                                        <a href="#"><i class="fa fa-volume-up fa-2x icons" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                            <div class="row justify-content-center"> <!-- Пагінація -->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> <!-- Кінець пагінації -->

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
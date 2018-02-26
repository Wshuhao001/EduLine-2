@extends('layout')

@section('content')

    <main role="main">

        <section class="jumbotron text-left">
            <style type="text/css">
                .jumbotron {
                    background: url(img/course-bg.jpg);
                    height: 300px;
                }
            </style>

            <div class="container">
                <h1 class="jumbotron-heading text-light">EduLine</h1>
                <p class="lead text-light">Вчіться без обмежень</p>
            </div>
        </section>

        <div class="album py-5 ">
            <div class="container">
                <p class="font-weight-normal big-head-text text-center">Список курсів</p>

                <div class="row main-words-block">
                    <div class="col-md-1"></div>

                    @if( count($categories) >= 5)


                    <div class="col-md-2 font-weight-bold main-words-categ">{{$categories[0]->title}}</div>
                    <div class="col-md-2 font-weight-bold main-words-categ">{{$categories[1]->title}}</div>
                    <div class="col-md-2 font-weight-bold main-words-categ">{{$categories[2]->title}}</div>
                    <div class="col-md-2 font-weight-bold main-words-categ">{{$categories[3]->title}}</div>
                    <div class="col-md-2 font-weight-bold main-words-categ">{{$categories[4]->title}}</div>

                    @endif

                </div>

                <div class="row content">

                    @foreach($courses as $course)

                    <div  class="col-md-4">
                        <div onclick="window.location.href='{{route('course.index', $course->id)}}'" class="card mb-4 box-shadow">
                            @if($course->image !== null)
                                <img height="200" src="{{$course->getImage()}}">
                            @else
                                <img  src="img/no-course-img.jpg">
                            @endif
                            <div class="card-body">
                                <p class="card-text"><small class="card-info">{{$course->getCategoryTitle()}}</small></p>
                                <a href="{{route('course.index', $course->id)}}"><h5 class="card-title">{{$course->title}}</h5></a>
                                <p maxlength="5" class="card-text text-muted">{{$course->short_description}}</p>

                                <div class="bottom-category">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="card-text"><small>By </small> <small class="text-muted link">{{$course->author->name}}</small></p>
                                        </div>

                                        <div class="col-sm-6 text-right">
                                            <i class="fa fa-comment-o fa-black"></i>
                                            <a class="text-muted">1</a>

                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        </div>

    </main>

    @include('footer')

@endsection
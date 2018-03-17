@extends('layout')

@section('content')

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Мої курси</h1>
                <a href="{{route('teacher.create')}}"><div class="btn btn-primary mt-3">Створити курс</div></a>

            </div>
        </section>

        <div class="album py-5 ">
            <div class="container">
                <div class="row content">
                    @foreach($courses as $course)

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img onclick="window.location.href='{{route('course.index', $course->course_id)}}'" align="center" class="img-fluid"  src="{{$course->getImage()}}">
                            <div class="card-body">

                                <a href="{{route('course.index', $course->course_id)}}"><h5 align="center" class="card-title">{{$course->title}}</h5></a>
                                <p class="card-text text-muted">{{$course->short_description}}</p>
                                <a href="{{route('teacher.edit',$course->course_id)}}" class="card-text text-muted">
                                    <i class="fa fa-file-video-o fa-black" aria-hidden="true"></i> Добавити уроки
                                </a>
                                <p>
                                    <a href="{{route('words.addForm',$course->course_id)}}" class="card-text text-muted">
                                        <i class="fa fa-file-word-o fa-black" aria-hidden="true"></i> Добавити терміни
                                    </a>
                                </p>

                                @if($course->status == 0)
                                    <p class="card-text text-muted"><i class="fa fa-cogs fa-black" aria-hidden="true"></i> На модерації</p>
                                @else
                                    <p class="card-text text-muted"><i class="fa fa-check fa-black" aria-hidden="true"></i> Опубліковано</p>
                                @endif


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
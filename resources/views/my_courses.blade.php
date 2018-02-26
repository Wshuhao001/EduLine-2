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
                            <img onclick="window.location.href='{{route('course.index', $course->id)}}'" align="center" class="img-fluid"  src="{{$course->getImage()}}">
                            <div class="card-body">

                                <a href="#"><h5 align="center" class="card-title">{{$course->title}}</h5></a>
                                <p class="card-text text-muted">{{$course->short_description}}</p>
                                @if($course->status == 0)
                                    <h5 align="center" class="text-muted">На модерації</h5>
                                @else
                                    <h5 align="center" class="text-muted">Опубліковано</h5>
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

@endsection
@extends('layout')

@section('content')

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Ваші курси</h1>
        </div>
    </section>

    <div class="container">

        @if($courses->count() >= 1)

            <div class="row content">

                @foreach($courses as $course)
                    @if($course->checkPay(Auth::user()->id))

                    <div  class="col-md-4">
                        <div onclick="window.location.href='{{route('course.index', $course->id)}}'" class="card mb-4 box-shadow">
                            @if($course->image !== null)
                                <img height="200" src="{{$course->getImage()}}">
                            @else
                                <img  src="/img/no-course-img.jpg">
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

                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
        @else
            <h4 align="center" class="mt-3">В цього вчителя ще немає курсів...</h4>
        @endif
    </div>


    @include('footer')



@endsection
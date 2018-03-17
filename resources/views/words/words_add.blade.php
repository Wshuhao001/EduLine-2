@extends('layout')

@section('content')

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Створення курсу</h1>
                <h2 class="jumbotron-heading text-muted">{{$course->title}}</h2>
            </div>
        </section>

        <div class="main mt-5">

            <div class="container">
            {{Form::open(['route'=>['words.update', $course->id],'files'=> true,'method'=>'put'])}}
                @include('errors')
                @if($words !=null)
                @foreach($words as $word)
                        <div class="dictionary-list">
                            <div class="row">

                                <div class="col-md-5">
                                    <label for="your_course_title">Слово</label>
                                    <div class="input-group mb-3 ml-2">
                                        <input name="word[]" value="{{$word->word}}"  type="text" class="form-control"  aria-label="Username" aria-describedby="your_course_title">
                                    </div>

                                </div>
                                <div class="col-md-2"></div>

                                <div class="col-md-5">
                                    <label for="your_course_title">Значення</label>
                                    <div class="input-group mb-3 mr-3">
                                        <input name="translate[]" value="{{$word->translate}}" type="text" class="form-control" aria-label="Username" aria-describedby="your_course_title">
                                    </div>

                                </div>

                            </div>
                        </div>
                @endforeach
                @endif

                    <div class="dictionary-list" id="lesson-list">
                        <div class="row">
                        <div class="col-md-5">
                            <label for="your_course_title">Слово</label>
                            <div class="input-group mb-3 ml-2">
                                <input name="word[]"  type="text" class="form-control" aria-label="Username" aria-describedby="your_course_title">
                            </div>

                        </div>
                            <div class="col-md-2"></div>

                        <div class="col-md-5">
                            <label for="your_course_title">Значення</label>
                            <div class="input-group mb-3 mr-3">
                                <input name="translate[]" type="text" class="form-control"  aria-label="Username" aria-describedby="your_course_title">
                            </div>

                        </div>

                        </div>
                    </div>


                <a href="javascript://" onclick="add();"><div class="btn btn-outline-primary mt-2 btn-block">Додати термін</div></a>

                <script type="text/javascript">
                    function add() {
                        var clonedNode = document.getElementById("lesson-list").cloneNode(true);
                        var newNode = document.querySelector(".dictionary-list");
                        newNode.appendChild(clonedNode);
                        newNode.setAttribute('id', '');
                    }
                </script>


                <button type="submit" class="btn btn-primary btn-block mt-3">Добавити до курсу</button>

            {{Form::close()}}

            </div>





        </div>
    </main>

    @include('footer')

@endsection


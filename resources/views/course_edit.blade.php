@extends('layout')

@section('content')

    <div class="container mt-3">

        {{Form::open(['route'=>['teacher.update', $course->id],'files'=> true,'method'=>'put'])}}
            <div class="your-study-plan">
                <h4 class="text-muted font-weight-light">Навчальний план</h4>
                <hr>
                @include('errors')
                <p>Створіть уроки і додайте до них відео і завдання.</p>
                <div class="your-lessons-list" >
                    @if($course->getLesson() != null)
                    @foreach($course->getLesson() as $tutor)
                    <div class="your-lesson mt-2">
                        <div class="row">
                            <div class="col-sm-6 font-weight-light">
                                <video width="400" height="200" controls="controls" poster="{{$course->getImage()}}">
                                    <source src="/videos/{{$tutor}}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                                </video>
                            </div>
                            <div class="col-sm-3">{{$tutor}}</div>
                            <div class="col-sm-3 text-right">

                            </div>
                        </div>
                    </div>

                    @endforeach
                    @endif

                    <div class="your-lesson mt-2" id="lesson-list">
                        <div class="row">
                            <div class="col-sm-3 font-weight-light mt-2 pl-5">Новий урок</div>
                            <div class="col-sm-6"></div>
                            <div class="col-sm-3 text-right">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="lesson[]" type="file" class="custom-file-input" id="input_course_avatar">
                                        <label class="custom-file-label" for="input_course_avatar"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
                <a href="javascript://" onclick="add();"><div class="btn btn-outline-primary mt-2 btn-block">Добавити ше урок</div></a>

                <script type="text/javascript">
                    function add() {
                        var clonedNode = document.getElementById("lesson-list").cloneNode(true);
                        document.querySelector(".your-lessons-list").appendChild(clonedNode);
                    }
                </script>

            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Добавити до курсу</button>
        {{Form::close()}}

    </div>





@endsection
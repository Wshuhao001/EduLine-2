@extends('admin.layout')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">



        <h2>Курси на модерації</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Автор</th>
                    <th>Назва</th>
                    <th>Опис</th>
                    <th>Дії</th>

                </tr>
                </thead>
                <tbody>

                @foreach($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td>{{$course->user_id}}</td>
                        <td>{{$course->title}}</td>
                        <td>{{$course->description}}</td>
                        <td>
                            {{Form::open(['route'=>['all_courses.destroy', $course->id], 'method'=>'delete'])}}
                            <button onclick="return confirm('Ви впевнені ?')" type="submit" class="no-btn">
                                <i class="fa fa-remove fa-black"></i>
                            </button>

                            {{Form::close()}}
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </main>

@endsection
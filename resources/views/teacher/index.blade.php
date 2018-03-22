@extends('layout')

@section('content')

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Редагування профіля</h1>
            </div>
        </section>

        <div class="main mt-5">

            <div class="container">

                <div class="col-md-12">
                    <div class="text-center">
                        <div class="videoContainer text-center">
                            <img align="center" class="img-fluid rounded-circle img-thumbnail" src="https://picsum.photos/100/100" alt="">
                            <a href="#" data-toggle="modal" data-target="#exampleModal"><img src="/img/edit.png" class="editBtn"></a>
                        </div>

                    </div>
                    @if(session()->has('status'))
                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                        </div>
                    @endif
                    {{Form::open(['route'=>'profile.update', 'method'=>'post'])}}
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="your_course_title">Ім'я</label>
                            <div class="input-group mb-3">
                                <input name="firstName" value="{{$user->firstName}}" type="text" class="form-control" placeholder="Вася" aria-label="Username" aria-describedby="your_course_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="your_course_title">Прізвище</label>
                            <div class="input-group mb-3">
                                <input name="surname" value="{{$user->surname}}" type="text" class="form-control" placeholder="Пупкин" aria-label="Username" aria-describedby="your_course_title">
                            </div>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <label for="description">Про вас:</label>
                        <div class="input-group mb-3">
                            <textarea name="description" rows="6" class="form-control" aria-label="description">{{$user->description}}</textarea>
                        </div>
                    </div>
                    <input name="user_id" type="hidden" value="{{$user->id}}">



                    <button type="submit" class="btn btn-primary btn-block mt-3">Внести зміни</button>
                </div>
                <div class="col-md-3"></div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Змінити аватар</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">

                                <div class="custom-file">


                                    <input name="image" value="{{old('image')}}" type="file" class="custom-file-input" id="input_course_avatar">
                                    <label class="custom-file-label" for="input_course_avatar">Виберіть аватар</label>
                                </div>
                            </div>
                            {{Form::close()}}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </main>

    @include('footer')

@endsection


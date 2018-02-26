@extends('layout')

@section('content')

    <main role="main">

        <div class="container register-form">
            <h3 align="center" class="font-weight-light">Вхід</h3>
            <hr>
            <div class="row justify-content-md-center">
                <div class="col-md-6 text-center">

                    @if(session('status'))
                        <div class="alert alert-danger">
                            {{session('status')}}
                        </div>
                    @endif

                    @include('errors')
                    <form action="/login" role="form" method="post">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="inputLogin" class="col-sm-2 col-form-label font-weight-light">Логін</label>
                            <div class="col-sm-10">
                                <input type="login" name="name" value="{{old('name')}}" class="form-control" id="inputLogin" placeholder="Ваш логін">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-light">Пароль</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Пароль">
                            </div>
                        </div>
                        <div align="center" class="form-group row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <button align="center" type="submit" class="btn btn-primary btn-block">Увійти</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </main>

@endsection
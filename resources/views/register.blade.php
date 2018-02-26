@extends('layout')

@section('content')

    <main role="main">

        <div class="container register-form">
            <h3 align="center" class="font-weight-light">Зареєстуватися</h3>
            <hr>
            <div class="row justify-content-md-center">
                <div class="col-md-6 ">
                    @include('errors')
                    <form role="form" method="post" action="/register">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="inputLogin" class="col-sm-2 col-form-label font-weight-light">Логін</label>
                            <div class="col-sm-10">
                                <input type="login" value="{{old('name')}}" name="name" class="form-control" id="inputLogin" placeholder="Ваш логін">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label font-weight-light">Поштова скринька</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('email')}}" name="email" class="form-control" id="inputEmail3" placeholder="Ваш Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-light">Пароль</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Ваш пароль">
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Хто ви ?</legend>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="status" checked value="1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1">Учень</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="status" value="2" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2">Вчитель</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div align="center" class="form-group row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <button align="center" type="submit" class="btn btn-primary btn-block">Зареєстуватися</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </main>

@endsection
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>EduLine</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->

    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href="//vjs.zencdn.net/5.19/video-js.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
<header>
    <nav class="navbar navbar-expand navbar-dark top-navbar">

        <div class="container">
            <a class="navbar-brand" href="/">EduLine</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown d-none d-sm-none d-md-block">
                        <form class="form-inline my-2 my-lg-0 ">
                            <input class="form-control mr-sm-2 main-search" type="search" placeholder="" aria-label="Search">
                        </form>
                    </li>
                    <li class="nav-item dropdown d-block">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Спільнота
                        </a>
                        <div class="dropdown-menu pl-3" aria-labelledby="navbarDropdown">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h5 class="font-weight-light"><i class="fa fa-calendar-plus-o fa-black" aria-hidden="true"></i> Курси</h5>
                                    <a class="dropdown-item" href="#">Всі курси</a>
                                    <a class="dropdown-item" href="#">Мої курси</a>
                                    <a class="dropdown-item" href="#">Слова з курсів</a>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="font-weight-light"><i class="fa fa-th fa-black" aria-hidden="true"></i> Статті</h5>
                                    <a class="dropdown-item" href="#">Новинки</a>
                                    <a class="dropdown-item" href="#">Мій список статтей</a>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="font-weight-light"><i class="fa fa-file-word-o fa-black" aria-hidden="true"></i> Слова</h5>
                                    <a class="dropdown-item" href="#">Набори слів</a>
                                    <a class="dropdown-item" href="#">Мої слова</a>
                                    <a class="dropdown-item" href="#">Створити набір</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Категорії
                        </a>
                        <div class="dropdown-menu pl-3" aria-labelledby="navbarDropdown">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h5 class="font-weight-light"><i class="fa fa-code fa-black" aria-hidden="true"></i> Розробка</h5>
                                    <a class="dropdown-item" href="#">Веб-розробка</a>
                                    <a class="dropdown-item" href="#">Мобільні програми</a>
                                    <a class="dropdown-item" href="#">Розробка ігор</a>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="font-weight-light"><i class="fa fa-language fa-black" aria-hidden="true"></i> Вивчення мов</h5>
                                    <a class="dropdown-item" href="#">Англійська мова</a>
                                    <a class="dropdown-item" href="#">Польська мова</a>
                                    <a class="dropdown-item" href="#">Німецька мова</a>
                                    <a class="dropdown-item" href="#">Інші мови</a>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="font-weight-light"><i class="fa fa-briefcase fa-black" aria-hidden="true"></i> Інше</h5>
                                    <a class="dropdown-item" href="#">Бізнес</a>
                                    <a class="dropdown-item" href="#">Маркетинг</a>
                                    <a class="dropdown-item" href="#">Німецька мова</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item user-btn">
                        <div class="dropdown">

                                @if(Auth::check())
                                    @if(Auth::user()->status == 1)
                                        <a href="{{route('teacher.index')}}"> <button class="btn btn-outline-light" type="button">Курси</button></a>
                                    @endif
                                    <a href="#"> <button class="btn btn-outline-light ml-2" type="button">Профіль</button></a>
                                    <a href="/logout"> <button class="btn btn-outline-light ml-2" type="button">Вийти</button></a>
                                @else
                                    <a href="/login"> <button class="btn btn-outline-light" type="button">Вхід</button></a>
                                    <a href="/register"> <button class="btn btn-outline-light ml-2" type="button">Реєстрація</button></a>

                                @endif

                        </div>
                    </li>

                </ul>


            </div>
        </div>
    </nav>
</header>

@yield('content')




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//vjs.zencdn.net/5.19/video.min.js"></script>
</body>
</html>

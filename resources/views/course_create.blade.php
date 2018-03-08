@extends('layout')

@section('content')

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Створення курсу</h1>
            </div>
        </section>

        <div class="main mt-5">
            {{Form::open([
                'route' => 'teacher.store',
                'files' => true
            ])}}
                <div class="container">
                    @include('errors')
                    <div class="col-md-12">
                        <label for="your_course_title">Заголовок курсу</label>
                        <div class="input-group mb-3">
                            <input name="title" value="{{old('title')}}" type="text" class="form-control" placeholder="PHP для чайників" aria-label="Username" aria-describedby="your_course_title">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="your_course_title">56</span>
                            </div>
                        </div>

                        <label for="your_course_pretitle">Підзаголовок курсу</label>
                        <div class="input-group mb-5">
                            <input name="short_description" value="{{old('short_description')}}" type="text" class="form-control" placeholder="Курс який допоможе вам вивчити мову програмування для створення сайтів" aria-label="Username" aria-describedby="your_course_pretitle">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="your_course_pretitle">120</span>
                            </div>
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Опис</span>
                            </div>
                            <textarea name="description" rows="6" class="form-control" aria-label="description">{{old('description')}}</textarea>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Вимоги:</span>
                            </div>
                            <textarea name="requirements" rows="3" class="form-control" aria-label="requirements">{{old('requirements')}}</textarea>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Нові знання і вміння:</span>
                            </div>
                            <textarea name="skills" rows="3" class="form-control" aria-label="skills">{{old('skills')}}</textarea>
                        </div>

                        <div class="input-group mb-3">

                            {{Form::select('category_id',
                                 $categories,
                                 null,
                                 ['class' => 'custom-select', 'data-placeholder' => 'Виберіть категорію']
                             )}}

                        </div>
                        <div class="add-course-avatar mb-5">
                            <p>Виділіть свій курс споміж інших за допомогою красивого зображення.</p>
                            <p>При створенні обложки пам'ятайте, що вона повинна відповідати всім стандартам щоб бути підтвердженою модераторами</p>
                            <p>Головні вимоги: 750x422 пікселів в форматі .jpg</p>
                            <div class="input-group mb-3">

                                <div class="custom-file">


                                    <input name="image" value="{{old('image')}}" type="file" class="custom-file-input" id="input_course_avatar">
                                    <label class="custom-file-label" for="input_course_avatar">Обложка курсу</label>
                                </div>
                            </div>
                        </div>


                        <div class="add-course-avatar mb-3">
                            <p>Зацікавте студентів пробним уроком курсом або відео презентацією</p>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input name="demo" value="{{old('demo')}}" type="file" class="custom-file-input" id="input_course_demo">
                                    <label class="custom-file-label" for="input_course_demo">Демо відео</label>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label for="price">Ціна курсу (10% комісія сервісу)</label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input name="price" value="{{old('price')}}" max="100" min="1" type="text" id="price" class="form-control" aria-label="Price">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary btn-block mt-3">Продовжити...</button>
                    </div>
                    <div class="col-md-3"></div>
                </div>

            {{Form::close()}}


        </div>
    </main>

    @include('footer')

@endsection


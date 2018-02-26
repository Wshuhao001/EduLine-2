@extends('admin.layout')

@section('content')


@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h2>Категорії</h2>

        {!! Form::open(['route' => 'categories.store']) !!}
        <div class="form-group mr-3">
            <input type="text" name="title" class="form-control" id="newCategory" aria-describedby="newCategory" placeholder="Введіть назву категорії">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Група категорії:</label>
            <select name="group" class="form-control" id="exampleFormControlSelect1">
                <option value="1">Програмування</option>
                <option value="2">Вивчення мов</option>
                <option value="3">Інше</option>
            </select>
        </div>

        <button type="submit" href="{{route('categories.store')}}" class="btn btn-secondary mb-3">Добавити категорію</button>

        {!! Form::close() !!}











        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Назва категорії</th>
                    <th>Група категорії</th>
                    <th>Дії</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->group}}</td>
                        <td>
                            {{Form::open(['route'=>['categories.destroy', $category->id], 'method'=>'delete'])}}
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

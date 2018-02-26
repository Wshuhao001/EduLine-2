
@extends('admin.layout')


@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          

          
          <h2>Користувачі сайту</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Логін</th>
                  <th>Статус</th>
                  <th>Баланс</th>
                  <th>Дії</th>
                  
                </tr>
              </thead>
              <tbody>
              @foreach($users as $user)

                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->status}}</td>
                  <td>{{$user->money}}</td>
                  <td>
                    {{Form::open(['route'=>['users.destroy', $user->id], 'method'=>'delete'])}}
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



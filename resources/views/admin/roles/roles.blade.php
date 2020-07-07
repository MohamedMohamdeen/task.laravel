@extends('layouts.app')
@section('content')

  <section>
        <div class="container-fluid">
            <br/>
          <div class="card">
            <div class="card-header">
              <h4>All Categories</h4>
            </div>
            <div class="card-body">
              <div class="row">
              </div>

              <div class="table-responsive">
                <table id="datatable1" style="width: 100%;" class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>display name</th>
                      <th>description</th>
                      <th>option</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($Roles as $Role)
                          <tr>
                            <td>{{$Role->id}}</td>
                            <td>{{$Role->name}}</td>
                            <td>{{$Role->display_name}}</td>
                            <td>
                              {{$Role->description}} 
                            </td>
                            <td>
                                <a href="{{route('Roles.edit',['id'=>$Role->id])}}" class="icon-option"><i class="fa fa-edit"></i></a>
                                <a href="{{route('Roles.delete',['id'=>$Role->id])}}" class="icon-option"><i class="fa fa-trash"></i></a>
                               
                            </td>
                          </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

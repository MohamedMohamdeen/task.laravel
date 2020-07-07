@extends('layouts.app')

@section('content')

  <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Forms       </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>edit {{$Ticket->name}}</h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="{{route('tickets.updata',['id'=>$Ticket->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Ticket Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$Ticket->name}}" name="name" >
                      </div>
                    </div>
                    <div class="line"></div>
                   <div class="form-group row">
                       <label class="col-sm-2 form-control-label">users</label>
                      <div class="col-sm-10">
                       <select class="form-control" name="user_id">
                        @if(isset($users))
                         @foreach($users as $user)
                         @if($Ticket->user_id == $user->id)
                          <option value="{{$user->id}}" selected>{{$user->name}}</option>
                          @else
                          <option value="{{$user->id}}">{{$user->name}}</option>
                          @endif
                          @endforeach
                          @endif
                        </select>
                      </div>
                     </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">end_date</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" value="{{$Ticket->end_date}}" name="end_date" >
                      </div>
                    </div>
                    <div class="line"></div>
                  <div class="form-group row">
                    <button type="submit" class="btn btn-info save-post">save</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2017-2020</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Version 1.4.7</p>
            </div>
          </div>
        </div>
      </footer>        
@endsection

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
                      <th>user</th>
                      <th>end date</th>
                      <th>option</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($Tickets as $Ticket)
                          <tr>
                            <td>{{$Ticket->id}}</td>
                            <td>{{$Ticket->name}}</td>
                            <td>{{$Ticket->user->name}}</td>
                            <td>
                              {{$Ticket->end_date}} 
                            </td>
                            <td>
                                <a href="{{route('tickets.edit',['id'=>$Ticket->id])}}" class="icon-option"><i class="fa fa-edit"></i></a>
                       <a href="{{route('tickets.delete',['id'=>$Ticket->id])}}" class="icon-option"><i class="fa fa-trash"></i></a>
                               
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

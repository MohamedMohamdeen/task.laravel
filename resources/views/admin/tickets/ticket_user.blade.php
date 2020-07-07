@extends('layouts.app')
@section('content')

  <section>
        <div class="container-fluid">
            <br/>
          <div class="card">
            <div class="card-header">
              <h4>tickets {{Auth::user()->name}}</h4>
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
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($tickets))
                       @foreach($tickets as $ticket)
                          <tr>
                            <td>{{$ticket->id}}</td>
                            <td>{{$ticket->name}}</td>
                            <td>{{$ticket->user->name}}</td>
                            <td>
                              {{$ticket->end_date}} 
                            </td>
                          </tr>
                          @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

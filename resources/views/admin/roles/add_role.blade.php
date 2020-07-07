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
                  <h4>Add role</h4>
                </div>
                <div class="card-body">
                @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)

                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  <form class="form-horizontal" action="{{route('Roles.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">role Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" >
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">display name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="display_name" >
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">description</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="description" >
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

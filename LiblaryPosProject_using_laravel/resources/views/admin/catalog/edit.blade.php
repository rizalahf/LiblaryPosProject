@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')

<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edite Catalog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('catalogs/'.$catalog->id)}}" method="post">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Catalog Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Catalog Name" required="" value="{{$catalog->name}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
</div>
</div>
            <!-- /.card -->

@endsection
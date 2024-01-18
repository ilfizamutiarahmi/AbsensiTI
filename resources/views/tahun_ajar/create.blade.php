@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data Tahun Ajar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('tahun_ajar.store')}}">
                @csrf
                <div class="card-body">
                <div class="form-group">
                  <div class="form-group">
                    <label for="tahun_ajar">Tahun Ajar</label>
                    <input type="text" class="form-control" name="tahun_ajar" id="tahun_ajar" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" class="form-control" name="semester" id="semester" placeholder="">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
        </div>
    </div>
@endsection
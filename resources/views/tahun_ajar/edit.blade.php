@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit data Tahun Ajar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{url("/tahun_ajar/{$th_ajar->id}")}}">
                @method('PATCH')
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="nama_prodi">Tahun Ajar</label>
                    <input type="text" class="form-control" name="tahun_ajar" value="{{$th_ajar->tahun_ajar}}" id="nama_prodi">
                  </div>
                  <div class="form-group">
                    <label for="kaprodi">Semester</label>
                    <input type="text" class="form-control" name="semester" id="semester" value="{{ $th_ajar->semester }}">
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
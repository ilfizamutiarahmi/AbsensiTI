@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data Program Studi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('prodi.store')}}">
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="nama_prodi">Nama Prodi</label>
                    <input type="text" class="form-control" name="nama_prodi" id="nama_prodi" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="kaprodi">Nama Kepala Prodi</label>
                    <input type="text" class="form-control" name="kaprodi" id="kaprodi" placeholder="">
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
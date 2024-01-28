@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit data Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{url("/mahasiswa/{$mahasiswa->id}")}}">
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}" id="name">
                  </div>
                  <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="text" class="form-control" name="nim" id="nim" value="{{ $mhs->nim }}">
                  </div>
                  <div class="form-group">
                    <label for="nama_mhs">Nama Mahasiswa</label>
                    <input type="text" class="form-control" name="nama_mhs" id="nama_mhs" value="{{ $mhs->nama_mhs }}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="{{ $jenis_kelamin }}">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $mhs->alamat }}">
                  </div>
                  <div class="form-group">
                    <label for="no_telp">No HP</label>
                    <input type="text" class="form-control" name="no_telp" id="no_telp" value=" {{$mhs->no_telp }}">
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
@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data Dosen</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{url("/dosen/{$dosen->id}")}}">
                @method('PATCH')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" name="nip" id="nip" value="{{ $dosen->nip }}">
                  </div>
                  <div class="form-group">
                    <label for="nama_dosen">Nama Dosen</label>
                    <input type="text" class="form-control" name="nama_dosen" id="nama_dosen" value="{{ $dosen->nama_dosen }}">
                  </div>
                  <div class="form-group">
                    <label for="jenis_kl">Jenis Kelamin</label>
                    <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="{{ $dosen->jenis_kelamin }}">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $dosen->alamat }}">
                  </div>
                  <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{ $dosen->no_hp }}">
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

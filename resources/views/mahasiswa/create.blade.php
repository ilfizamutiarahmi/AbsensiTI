@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('mahasiswa.store')}}">
                @csrf
                <div class="card-body">
                <div class="form-group">
                  <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                    <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="nama_mahasiswa">Kelas</label>
                    <select name="id_kelas" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($kelas as $kelas)
                            <option value="{{$kelas->id}}">{{$kelas->nama_kelas}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="jenis_kl">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">--- pilih ---</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Perempuan">Laki-Laki</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="no_telp">No HP</label>
                    <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="">
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
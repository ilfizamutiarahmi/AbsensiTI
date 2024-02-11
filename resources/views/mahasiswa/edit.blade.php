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
              <form method="POST" action="{{ route('jadwal.edit', ['id' => $jadwal->id]) }}">
                @method('PATCH')
                @csrf
                <div class="card-body">
                <div class="form-group">
                  <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" value="{{ $mahasiswa->nim }}">
                  </div>
                  <div class="form-group">
                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                    <input type="text" class="form-control" name="nama_mhs" id="nama_mhs" value="{{ $mahasiswa->nama_mhs }}">
                  </div>
                  <div class="form-group">
                    <label for="nama_mahasiswa">Kelas</label>
                    <select name="id_kelas" class="form-control">
                        <option value="{{ $mahasiswa->id_kelas }}">--- pilih ---</option>
                        @foreach($kelas as $kelas)
                            <option value="{{$kelas->id}}" {{ $mahasiswa->id_kelas == $kelas->id ? 'selected' : '' }}>{{$kelas->nama_kelas}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="jenis_kl">Jenis Kelamin</label>
                    <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="{{ $mahasiswa->jenis_kelamin }}">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $mahasiswa->alamat }}">
                  </div>
                  <div class="form-group">
                    <label for="no_telp">No HP</label>
                    <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{ $mahasiswa->no_telp }}">
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

@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data Mata Kuliah</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('matakuliah.store')}}">
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="nama_matkul">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" name="nama_matkul" id="nama_matkul" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="jml_sks">Jumlah SKS</label>
                    <input type="integer" class="form-control" name="jml_sks" id="jml_sks" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="id_dosen">Kelas</label>
                    <select name="id_dosen" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($dosen as $dosen)
                            <option value="{{$dosen->id}}">{{$dosen->nama_dosen}}</option>
                        @endforeach
                    </select>                  
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
@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Jadwal</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{url("/jadwal/{$jadwal->id}")}}">
                @method('PATCH')
                @csrf
                <div class="card-body">
                <div class="form-group">
                <div class="form-group">
                    <label for="hari">Hari</label>
                    <select name="hari" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($hari as $hr)
                        <option value="{{$hr}}" {{ $jadwal->hari == $hr ? 'selected' : '' }}>{{$hr}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_kelas">Kelas</label>
                    <select name="id_kelas" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($kelas as $kelas)
                            <option value="{{$kelas->id}}" {{ $jadwal->id_kelas == $kelas->id ? 'selected' : '' }}>{{$kelas->nama_kelas}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_matkul">Matakuliah</label>
                    <select name="id_matkul" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($matakuliah as $matkul)
                            <option value="{{$matkul->id}}" {{ $jadwal->id_matkul == $matkul->id ? 'selected' : '' }}>{{$matkul->nama_matkul}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_tahunajar">Tahun Ajar</label>
                    <select name="id_tahunajar" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($tahun_ajar as $th_ajar)
                            <option value="{{$th_ajar->id}}" {{ $jadwal->id_tahunajar == $th_ajar->id ? 'selected' : '' }}>{{$th_ajar->tahun_ajar}} / {{$th_ajar->semester}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ruang">Ruang</label>
                    <input type="text" class="form-control" name="ruang" id="ruang" value="{{ $jadwal->ruang }}">
                </div>
                <div class="form-group">
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" value="{{ $jadwal->jam_mulai }}">
                </div>
                <div class="form-group">
                    <label for="jam_akhir">Jam Akhir</label>
                    <input type="time" class="form-control" name="jam_akhir" id="jam_akhir" value="{{ $jadwal->jam_akhir }}">
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

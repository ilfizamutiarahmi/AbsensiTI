@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-6">
                          <h3>Daftar Hadir</h3>
                        </div>
                      </div>
                      <div class="row"></div>
                    </div>
                    <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12">
                              <form method="GET">
                                @csrf
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                          <label for="id_kelas">Kelas</label>
                                          <select name="id_kelas" class="form-control">
                                              <option value="">--- pilih ---</option>
                                              @foreach($jadwal as $jd)
                                              <option value="{{ $jd->id_kelas }}">{{ $jd->nama_kelas}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                            <label for=""></label><br>
                                          <button type="submit" class="btn btn-primary mt-2" id="search">Search</button>
                                      </div>
                                  </div>
                              </form>
                            </div>
                          </div>
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>No BP</th>
                                <th>Nama Mahasiswa</th>
                                <th>Kehadiran</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tbody>
                              @if($mhs->isEmpty())
                                  <tr>
                                    <td colspan="5" align="center">Tidak ada data.</td>
                                  </tr>
                              @else
                            @php
                                $no = 1;
                            @endphp
                            @foreach($mhs as $key => $ab)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$ab->nim}}</td>
                                <td>{{$ab->nama_mhs}}</td>
                                <form method="POST" action="{{route('absensi.store')}}">
                                @csrf
                                <td>
                                    <select name="status[]" class="form-control">
                                      @foreach($statuses as $st)
                                        <option value="{{ $st }}"> {{ $st }} </option>
                                      @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="hidden" class="form-control" name="id_mhs[]" id="id_mhs" value="{{ $ab->id }}" >
                                    <input type="text" class="form-control" name="keterangan[]" id="keterangan">
                                    <input type="hidden" class="form-control" name="hari_ini" id="hari_ini" value="{{ $hari_ini }}">
                                </td>
                            </tr>
                            @endforeach
                            @endif
                          </tbody>
                        </table>
                        <div class="footer mt-3" align="right">
                          <button type="submit" class="btn btn-success" id="btn-submit" >Simpan</button>
                        </div>
                      </form>
                        </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
        </div>
    </div>
@endsection
@push('content_scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    });
</script>
@endpush
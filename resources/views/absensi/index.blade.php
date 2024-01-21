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
                          <h3>Absensi</h3>
                        </div>
                      </div>
                      <div class="row"></div>
                    </div>
                    <!-- /.card-header -->
                    <form method="POST" action="{{route('absensi.store')}}">
                    @csrf
                        <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>No BP</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jenis kelamin</th>
                                <th>No HP</th>
                                <th>Kehadiran</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($mhs as $ab)
                            
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$ab->nim}}</td>
                                <td>{{$ab->nama_mhs}}</td>
                                <td>{{$ab->jenis_kelamin}}</td>
                                <td>{{$ab->no_telp}}</td>
                                <form method="POST" action="{{route('absensi.store')}}">
                                @csrf
                                <td>
                                    <select name="status" class="form-control">
                                        <option value="Hadir">Hadir</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Alfa">alfa</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="hidden" class="form-control" name="id_mhs" id="id_mhs" value="{{ $ab->id }}" placeholder="">
                                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="">
                                </td>
                                <td>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </td>
                                
                                </form>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
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
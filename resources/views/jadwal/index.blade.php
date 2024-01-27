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
                          <h3>Jadwal</h3>
                        </div>
                      </div>
                      <div class="row"></div>
                    </div>
                    <!-- /.card-header -->
                    <form method="POST" action="#">
                    @csrf
                        <div class="card-body">
                        <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"> Tambah </i></a>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Matakuliah</th>
                                <th>Dosen</th>
                                <th>Tahun Ajar / Semester</th>
                                <th>Ruang</th>
                                <th>Jam mulai</th>
                                <th>Jam akhir</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($jadwal as $jdw)
                            
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$jdw->nama_kelas}}</td>
                                <td>{{$jdw->nama_matkul}}</td>
                                <td>{{$jdw->nama_dosen}}</td>
                                <td>{{$jdw->tahun_ajar}} / {{$jdw->semester}}</td>
                                <td>{{$jdw->ruang}}</td>
                                <td>{{ date('d M Y H:i:s', strtotime($jdw->jam_mulai)) }}</td>
                                <td>{{ date('d M Y H:i:s', strtotime($jdw->jam_akhir)) }}</td>
                                <td style="text-align: center;"><a href="" class="btn btn-sm btn-warning mr-3"><i class="fas fa-edit"></i></a> 
                                    <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
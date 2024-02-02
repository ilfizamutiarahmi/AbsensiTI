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
                          <h3>Dosen</h3>
                        </div>
                      </div>
                      <div class="row"></div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <a href="{{ route('dosen.create')}}" class="btn btn-primary mb-3"><i class="fas fa-plus"> Tambah </i></a>
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>NIP</th>
                          <th>Nama Dosen</th>
                          <th>Jenis kelamin</th>
                          <th>No HP</th>
                          <th>Alamat</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                          $no = 1;
                        @endphp
                        @foreach($dosen as $ds)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$ds->nip}}</td>
                            <td>{{$ds->nama_dosen}}</td>
                            <td>{{$ds->jenis_kelamin}}</td>
                            <td>{{$ds->no_hp}}</td>
                            <td>{{$ds->alamat}}</td>
                            <td style="text-align: center;"><a href="/dosen/edit/{{$ds->id}}" class="btn btn-sm btn-warning mr-3"><i class="fas fa-edit"></i></a>
                            <a href="/dosen/destroy/{{$ds->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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

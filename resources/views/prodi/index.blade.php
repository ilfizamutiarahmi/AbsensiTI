@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Data Program Studi</h3>
                      <a href="{{ route('prodi.create')}}" class="btn btn-sm btn-primary" style="float: right">
                            Tambah Data
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Prodi</th>
                          <th>Nama Kepala Prodi</th>
                          <th>Menu</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach($prodi as $prd)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$prd->nama_prodi}}</td>
                            <td>{{$prd->kaprodi}}</td>
                            <td style="text-align: center;"><a href="{{ route('prodi.edit', $prd->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
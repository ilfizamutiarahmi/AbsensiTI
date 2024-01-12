@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Data Matakuliah</h3>
                      <a href="{{ route('matakuliah.create')}}" class="btn btn-sm btn-primary" style="float: right">
                            Tambah Data
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Matakuliah</th>
                          <th>Jumlah SKS</th>
                          <th>Menu</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach($matakuliah as $mtk)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$mtk->nama_matkul}}</td>
                            <td>{{$mtk->jml_sks}}</td>
                            <td style="text-align: center;"><a href="{{ route('matakuliah.edit', $mtk->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
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
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
                          <h3>Tahun Ajar</h3>
                        </div>
                      </div>
                      <div class="row"></div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <a href="{{ route('tahun_ajar.create')}}" class="btn btn-primary mb-3"><i class="fas fa-plus"> Tambah </i></a>
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajar</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php 
                            $no = 1; 
                        @endphp
                        @foreach($th_ajar as $ta)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$ta->tahun_ajar}}</td>
                            <td>{{$ta->semester}}</td>
                            <td style="text-align: center;"><a href="#" class="btn btn-sm btn-warning mr-3"><i class="fas fa-edit"></i></a> 
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
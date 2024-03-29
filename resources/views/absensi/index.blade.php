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
                            @php
                                $no = 1;
                            @endphp
                            @foreach($absen as $key => $ab)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$ab->nim}}</td>
                                <td>{{$ab->nama_mhs}}</td>
                                <td>{{$ab->status}}</td>
                                <td>{{$ab->keterangan}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <div class="footer mt-3" align="right">
                        </div>
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
<script>
      $('#btn-submit').on('click',function(){
        var html = `<option value="">`
      })
</script>
@endpush
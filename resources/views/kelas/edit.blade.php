@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="card-body">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Kelas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{url("/kelas/{$kelas->id}")}}">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{$kelas->nama_kelas}}">
                  </div>
                  <div class="form-group">
                    <label for="nama_pa">Nama PA (Pembimbing Akademik) </label>
                    <input type="text" class="form-control" id="nama_pa" name="nama_pa" value="{{$kelas->nama_pa}}">
                  </div>
                  <div class="form-group">
                    <label for="id_prodi">Program Studi</label>
                    <select name="id_prodi" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($prodi as $prd)
                            <option value="{{$prd->id}}">{{$prd->nama_prodi}}</option>
                        @endforeach
                    </select>                  
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="cancel" class="btn btn-danger">Cancel</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
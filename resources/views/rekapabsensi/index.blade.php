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
                                    <h3>Rekapitulasi Absensi</h3>
                                </div>
                            </div>
                            <div class="row"></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form method="GET" action="{{ route('rekapabsensi.pdf') }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="id_kelas">Kelas</label>
                                                        <select name="id_kelas" class="form-control">
                                                            <option value="">--- pilih ---</option>
                                                            @foreach($jadwal as $jd)
                                                            <option value="{{ $jd->id_kelas }}">{{ $jd->nama_kelas }}/ {{ $jd->nama_matkul}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for=""></label><br>
                                                        <button type="submit" class="btn btn-success mt-2" id="export-btn">Export</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
    $(document).ready(function() {
        $('#export-btn').click(function() {
            window.location.href = "{{ route('rekapabsensi.pdf') }}";
        });
    });
</script>
@endpush

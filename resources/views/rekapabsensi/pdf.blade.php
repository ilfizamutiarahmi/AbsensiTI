<!DOCTYPE html>
<html>
<head>
    <title>Report Absensi Mahasiswa</title>
    <style>
         table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .header {
            text-align: center;
            margin: auto;
        }
        .perusahaan {
            font-weight: bold;
        }
        .alamat {
            margin-bottom: 10px;
        }
        .border {
            border-width: 2px;
            border-style: solid;
        }
        .h2{
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI</h2>
        <h2>POLITEKNIK NEGERI PADANG</h2>
        <h2>JURUSAN TEKNOLOGI INFORMASI</h2>
        <p class="alamat">Kampus Politeknik Negeri Padang, Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat 25164</p>
       
    </div>
    <hr class="border">
    <div class="header">
        <h3>REKAPITULASI ABSENSI</h3>
        <h3>TAHUN AJAR SEMESTER</h3>
    </div> 
   
    <div class="">
        <p>REKAPITULASI ABSENSI</p>
        <p>TAHUN AJAR SEMESTER</p>
    </div>

    <table >
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">No BP</th>
                <th rowspan="2">Nama Mahasiswa</th>
                @if(isset($count[0]->status) && is_array($count[0]->status))
                    @foreach ($count[0]->status as $value)
                        <th>{{ $value }}</th>
                    @endforeach
                @endif
                <th rowspan="2">Total Sakit</th>
                <th rowspan="2">Total Izin</th>
                <th rowspan="2">Total Alpha</th>
                <th rowspan="2">Total Kehadiran</th>
            </tr>
            <tr>
            @if(isset($count[0]->status) && is_array($count[0]->status))
                @foreach ($count[0]->status as $value)
                    <th>{{ $value }}</th>
                @endforeach
            @endif
            </tr>
        </thead>
        <tbody>
            @php
            $total_sakit = 0;
            $total_izin = 0;
            $total_alpha = 0;
            $total_kehadiran = 0;
            @endphp

            @foreach ($rekapabsensi as $key => $detailAbsensi)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $detailAbsensi->nim }}</td>
                    <td>{{ $detailAbsensi->nama_mhs }}</td>
                    @php
                        $total_sakit = 0;
                        $total_izin = 0;
                        $total_alpha = 0;
                        $total_kehadiran = 0;
                    @endphp
                    @if(isset($count[0]->status) && is_array($count[0]->status))
                        @foreach ($count[0]->status as $status)
                            <td>
                                @if(isset($status) && isset($detailAbsensi->status[$status]) && $detailAbsensi->status[$status] !== null)
                                    @if($detailAbsensi->status[$status] == 'Hadir')
                                        h
                                    @elseif($detailAbsensi->status[$status] == 'Sakit')
                                        s
                                    @elseif($detailAbsensi->status[$status] == 'Izin')
                                        i
                                    @elseif($detailAbsensi->status[$status] == 'Alfa')
                                        a
                                    @endif
                                    @php
                                        if ($detailAbsensi->status[$status] == 'Sakit') {
                                            $total_sakit++;
                                        } elseif ($detailAbsensi->status[$status] == 'Izin') {
                                            $total_izin++;
                                        } elseif ($detailAbsensi->status[$status] == 'Alfa') {
                                            $total_alpha++;
                                        } else {
                                            $total_kehadiran++;
                                        }
                                    @endphp
                                @endif
                            </td>
                        @endforeach
                    @endif
                    <td>{{ $total_sakit }}</td>
                    <td>{{ $total_izin }}</td>
                    <td>{{ $total_alpha }}</td>
                    <td>{{ $total_kehadiran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

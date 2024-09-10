@extends('layouts.laporan_app')

@section('content')
<div class="container">
    <h3 class="text-center mb-4">Laporan Data Pendaftaran Pasien</h3>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th width="1%">NO</th>
                <th>No Pasien</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Tgl Daftar</th>
                <th>Poli</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($models as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->pasien->no_pasien }}</td>
                <td>{{ $item->pasien->nama }}</td>
                <td>{{ $item->pasien->umur }}</td>
                <td>{{ $item->pasien->jenis_kelamin }}</td>
                <td>{{ $item->tanggal_daftar }}</td>
                <td>{{ $item->poli->nama }}</td>
                <td>{{ number_format($item->poli->biaya, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <!-- Empty cells for columns before the 'Biaya' column -->
                <td colspan="7" class="text-right font-weight-bold">Total</td>
                <!-- Total Biaya column -->
                <td>{{ number_format($models->sum(function($item) { return $item->poli->biaya; }), 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

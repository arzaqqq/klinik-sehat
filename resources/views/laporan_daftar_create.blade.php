@extends('layouts.modern_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">LAPORAN PENDAFTARAN</div>
                <div class="card-body">
                    <form action="{{ route('laporan-daftar.index') }}" method="GET" target="_blank">
                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="tanggal_mulai">Tanggal Daftar Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tanggal_akhir">Tanggal Daftar Akhir</label>
                                <input type="date" name="tanggal_akhir" class="form-control" id="tanggal_akhir">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="poli_id">Pilih Poli</label>
                                <select name="poli_id" class="form-control" id="poli_id">
                                    <option value="">-- Semua Data --</option>
                                    @foreach ($listPoli as $id => $nama)
                                        <option value="{{ $id }}" @selected(old('poli_id') == $id)>
                                            {{ $nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Cetak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

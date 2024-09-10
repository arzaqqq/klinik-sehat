@extends('layouts.modern_app')
@section('content')
<div class="card-header">
    <h3 class="card-title">Form Pendaftaran Pasien</h3>
</div>
<div class="card-body">
    <form action="{{ route('daftar.store') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="tanggal_daftar">Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" class="form-control" value="{{ old('tanggal_daftar') ?? date('Y-m-d') }}">
            <span class="text-danger">{{ $errors->first('tanggal_daftar') }}</span>
        </div>

        <div class="form-group mt-3">
            <label for="pasien_id" class="d-flex">Nama | 
                <a href="{{ route('pasien.create') }}" target="_blank">Tambah Pasien Baru</a>
            </label>
            <select name="pasien_id" class="form-control select2" style="width: 100%">
                <option value="">-- Pilih Pasien --</option>
                @foreach ($ListPasien as $item)
                    <option value="{{ $item->id }}" @selected(old('pasien_id') == $item->id)>
                        {{ $item->id }} - {{ $item->nama }}
                    </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('pasien_id') }}</span>
        </div>

        <div class="form-group mt-3">
            <label for="poli_id">Poli</label>
            <select name="poli_id" class="form-control">
                <option value="">-- Pilih Poli --</option>
                @foreach ($listPoli as $itempoli)
                    <option value="{{ $itempoli->id }}" @selected(old('poli_id') == $itempoli->id)>
                        {{ $itempoli->nama }} - {{ $itempoli->biaya }}
                    </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('poli_id') }}</span>
        </div>

        <div class="form-group mt-3 mb-3">
            <label for="keluhan">Keluhan</label>
            <textarea name="keluhan" rows="2" class="form-control">{{ old('keluhan') }}</textarea>
            <span class="text-danger">{{ $errors->first('keluhan') }}</span>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pendaftaran</button>
    </form>
</div>
@endsection

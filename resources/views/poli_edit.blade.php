@extends('layouts.modern_app')
@section('content')
 <form action="{{ route('poli.update', $poli->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group mt-1 mb-3">
        <label for="nama">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror"
            id="nama" name="nama" value="{{ old('nama', $poli->nama) }}">
        <span class="text-danger">{{ $errors->first('nama') }}</span>
    </div> 
    <div class="form-group mt-1 mb-3">
        <label for="biaya">Biaya</label>
        <input type="number" class="form-control @error('biaya') is-invalid @enderror"
            id="biaya" name="biaya" value="{{ old('biaya', $poli->biaya) }}">
        <span class="text-danger">{{ $errors->first('biaya') }}</span>
    </div> 
    <div class="form-group mt-1 mb-3">
        <label for="keterangan">Keterangan</label>
        <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
            id="keterangan" name="keterangan" value="{{ old('keterangan', $poli->keterangan) }}">
        <span class="text-danger">{{ $errors->first('keterangan') }}</span>
    </div> 
    
    <button type="submit" class="btn btn-primary">Update</button>
 </form>
@endsection

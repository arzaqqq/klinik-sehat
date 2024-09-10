@extends('layouts.modern_app')
@section('content')
 <form action="{{ route('poli.store') }}" method="post">
    @csrf
    <div class="form-group mt-1 mb-3">
        <label for="nama">nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror"
            id="nama" name="nama" value="{{ old('nama') }}">
        <span class="text-danger">{{ $errors->first('nama') }}</span>
    </div> 
    <div class="form-group mt-1 mb-3">
        <label for="biaya">Biaya</label>
        <input type="number" class="form-control @error('biaya') is-invalid @enderror"
            id="nama" name="biaya" value="{{ old('biaya') }}">
        <span class="text-danger">{{ $errors->first('biaya') }}</span>
    </div> 
    <div class="form-group mt-1 mb-3">
        <label for="keterangan">Keteranagn</label>
        <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
            id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
        <span class="text-danger">{{ $errors->first('keterangan') }}</span>
    </div> 
    

    <button type="submit" class="btn btn-primary">Submit</button>
 </form>
@endsection
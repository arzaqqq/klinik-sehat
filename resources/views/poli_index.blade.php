@extends('layouts.modern_app', ['title' => '1Data Pasien'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Form Poli</div>
                    <div class="card-body">
                        <h3>Data pasien</h3>
                        <div class="row mb-3 mt-3">
                            <div class="col-md-6">
                                <a href="{{ route('poli.create') }}" class="btn btn-primary btn-sm">Tambah Pasien</a>
                            </div>
                        </div>
                        {{-- @include('flash::message') --}}
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Biaya</th>
                                    <th>Ketereangan</th>
                                    <th>Tgl Buat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($poli as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                    
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->biaya }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                      
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('poli.edit', $item->id) }}" class="btn btn-warning">Edit</a>

                                            <form action="{{ route('poli.destroy' , $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm ('anda yakin ?')">Hapus </button>
                                            </form>
                                        </td>
                                        
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {!! $poli->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.modern_app', ['title' => '1Data Pasien'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Form Pasien</div>
                    <div class="card-body">
                        <h3>Data pasien</h3>
                        <div class="row mb-3 mt-3">
                            <div class="col-md-6">
                                <a href="{{ route('pasien.create') }}" class="btn btn-primary btn-sm">Tambah Pasien</a>
                            </div>
                        </div>
                        {{-- @include('flash::message') --}}
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Foto</th>
                                    <th>No Pasien</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tgl Buat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($item->foto)
                                            <a href="{{ Storage::url($item->foto) }}" target="blank">
                                                <img src="{{ Storage::url($item->foto) }}" alt="" width="50" height="50">
                                            </a>     
                                            @endif
                                        </td>
                                        <td>{{ $item->no_pasien }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->umur }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('pasien.edit', $item->id) }}" class="btn btn-warning">Edit</a>

                                            <form action="{{ route('pasien.destroy' , $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm ('anda yakin ?')">Hapus </button>
                                            </form>
                                        </td>
                                        
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $pasien->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
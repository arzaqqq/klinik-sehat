@extends('layouts.modern_app', ['title' => 'Daftar'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Daftar Pasien</div>
                    <form class="d-flex mb-3">
                        <input class="form-control me-2" type="search" name="query" value="{{ request('query') }}" placeholder="Cari..." aria-label="Cari">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </form>
                    <div class="card-body">
                        <h3>Data pasien</h3>
                        <div class="row mb-3 mt-3">
                            <div class="col-md-6">
                                <a href="{{ route('daftar.create') }}" class="btn btn-primary btn-sm">Tambah Pasien</a>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>poli</th>
                                    <th>keluhan</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                       
                                        <td>{{ $item->pasien->nama }}</td>
                                        <td>{{ $item->pasien->jenis_kelamin  }}</td>
                                        {{-- <td>{{ $item->tanggal_daftar}}</td> --}}
                                        <td><div>{{ $item->poli->nama }}</div>
                                            <div>{{ $item->biaya}}</div>
                                        </td>
                                        <td>{{ $item->keluhan }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('daftar.show', $item->id) }}" class="btn btn-success">Detail</a>

                                            <form action="{{ route('daftar.destroy' , $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm ('anda yakin ?')">Hapus </button>
                                            </form>
                                        </td>
                                        
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $daftar->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="card-tools"></div>
            </div>

            <div class="card-body">
                @empty($data)
                    <div class="alert alert-danger alert-dismissible">
                        <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                        Data yang Anda cari tidak ditemukan.
                    </div>
                @else
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <tr>
                            <th>Kode Buku</th>
                            <td>{{ $data->kode_buku }}</td>
                        </tr>
                        <tr>
                            <th>Sampul Buku</th>
                            <td>
                                <img src="{{ asset('storage/sampul-buku/' . $data->sampul) }}" alt="{{ $data->judul }}"
                                    class="img-fluid" style="width: 150px">
                            </td>
                        </tr>
                        <tr>
                            <th>Judul Buku</th>
                            <td>{{ $data->judul }}</td>
                        </tr>
                        <tr>
                            <th>Kategori Buku</th>
                            <td>{{ $data->kategori_buku }}</td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td>{{ $data->penerbit }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Terbit</th>
                            <td>{{ $data->tahun_terbit }}</td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td>{{ $data->penulis }}</td>
                        </tr>

                    </table>
                @endempty
                <a href="{{ route('buku.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush

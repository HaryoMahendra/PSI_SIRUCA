@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><b>Halaman Data Buku</b></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Buku</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('buku.buku.create') }}" class="btn btn-primary mb-3">Add Data </a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Buku</h3>

                                <div class="card-tools">
                                    <form action="{{ route('buku.index') }}" method="GET">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="search" class="form-control float-right"
                                                placeholder="Search" value="{{ $request->get('search') }}">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Buku</th>
                                            <th>Sampul Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Kategori Buku</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Penulis</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td><img src="{{ asset('storage/photo-user/' . $d->image) }}"
                                                        alt=""width="50"></td> --}}
                                                <td>{{ $d->kode_buku }}</td>
                                                <td><img src="/storage/sampul_buku/{{ $d->sampul }}" alt=""
                                                        width="50"></td>
                                                <td>{{ $d->judul }}</td>
                                                <td>{{ $d->kategori_buku }}</td>
                                                <td>{{ $d->penerbit }}</td>
                                                <td>{{ $d->tahun_terbit }}</td>
                                                <td>{{ $d->penulis }}</td>
                                                <td>
                                                    <a href="{{ route('buku.buku.show', ['id' => $d->id]) }}"
                                                        class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('buku.buku.edit', ['id' => $d->id]) }}"
                                                        class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                    <a data-toggle="modal" data-target="#modal-delete{{ $d->id }}"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-delete{{ $d->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Konfirmasi Delete Data</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah yakin ingin menghapus data buku
                                                                <b>{{ $d->name }}</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form
                                                                action="{{ route('buku.buku.delete', ['id' => $d->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Iya, hapus
                                                                    data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection

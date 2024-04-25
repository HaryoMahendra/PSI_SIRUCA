@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Buku</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Buku</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('buku.update', ['id' => $data->buku_id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Buku</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode Buku</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="kode_buku"
                                        placeholder="Masukkan Kode Buku" value="{{ $data->kode_buku }}">
                                    @error('kode_buku')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                @if ($data->sampul)
                                    <img src="{{ asset('storage/sampul-buku/' . $data->sampul) }}" width="100"
                                        height="100px" alt="">
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sampul Buku</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="sampul">
                                    <small>Upload foto jika ingin menggantinya</small>
                                    @error('sampul')
                                        <br>
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul Buku</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        value="{{ $data->judul }}" name="judul" placeholder="Masukkan Judul Buku">
                                    @error('judul')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori Buku</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="kategori_buku"
                                        placeholder="Masukkan Kategori Buku" value="{{ $data->kategori_buku }}">
                                    @error('kategori_buku')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Penerbit</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="penerbit"
                                        placeholder="Masukkan Penerbit" value="{{ $data->penerbit }}">
                                    @error('penerbit')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tahun Terbit</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="tahun_terbit"
                                        placeholder="Masukkan Tahun Terbit" value="{{ $data->tahun_terbit }}">
                                    @error('tahun_terbit')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Penulis</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="penulis"
                                        placeholder="Masukkan Penulis" value="{{ $data->penulis }}">
                                    @error('penulis')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                    <!--/.col (left) -->

                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

    </div>
@endsection

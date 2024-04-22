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
                            <li class="breadcrumb-item active">Tambah buku</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('buku.buku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah Data Buku</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        {{-- <div class="form-group">
                                            <label for="exampleInputEmail1">Sampul Buku</label>
                                            <input type="file" class="form-control" id="exampleInputEmail1"
                                                name="photo">
                                            @error('photo')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul Buku</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="judul" placeholder="Masukkan Judul Buku">
                                            @error('judul')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tahun Terbit</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="tahun_terbit" placeholder="Masukkan Tahun Terbit">
                                            @error('tahun_terbit')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Penerbit</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="penerbit" placeholder="Masukkan Penerbit">
                                            @error('penerbit')
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
                        </div>
                        <!--/.col (left) -->
                    </div>
                </form>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

    </div>
@endsection

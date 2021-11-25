@extends('layouts.app-admin')

@section('title')
    Admin || Divisi
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Divisi</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('divisi.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="divisi">Nama Divisi</label>
                    <input type="text" class="form-control" name="divisi" placeholder="nama_divisi" value="{{ old('nama')}}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.app-admin')

@section('title')
    Admin || Pegawai
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pegawai</h1>
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
            <form action="{{ route('pegawai.update', $pegawai->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Nama Pegawai</label>
                    <input type="text" class="form-control" name="name" placeholder="nama_pegawai" value="{{ $pegawai->name }}">
                </div>
                <div class="form-group">
                    <label for="no_hp">No Hp</label>
                    <input type="text" class="form-control" name="no_hp" placeholder="Nomor Handphone" value="{{ $pegawai->no_hp }}">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" required class="form-control">
                        <option value="{{ $pegawai->jenis_kelamin }}">Saat ini : {{ $pegawai->jenis_kelamin }}</option>
                        <option value="Laki - laki">Laki - laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="email" value="{{ $pegawai->email }}">
                </div>
                {{-- <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="password" value="{{ $pegawai->password }}">
                </div> --}}
                <div class="form-group">
                    <label for="divisiId">Pilih Divisi Pegawai</label>
                    <select name="divisiId" id="" required class="form-control">
                        <option value="{{ $pegawai->divisiId }}">Saat ini : {{ $pegawai->divisi->divisi }}</option>
                        @foreach ($divisi as $d)
                            <option value="{{ $d->id }}">{{  $d->divisi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="roleId">Pilih Role Pegawai</label>
                    <select name="roleId" id="" required class="form-control">
                        <option value="{{ $pegawai->roleId }}">Saat ini : {{ $pegawai->role->role }}</option>
                        @foreach ($role as $r)
                            <option value="{{ $r->id }}">{{  $r->role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="is_active">Status Pegawai</label>
                    <select name="is_active" id="" required class="form-control">
                        <option value="{{ $pegawai->is_active }}">Saat ini : {{ $pegawai->is_active == '1' ? 'Aktif' : 'Tidak Aktif' }}</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </div>
        </form>
    </div>
</div>
@endsection

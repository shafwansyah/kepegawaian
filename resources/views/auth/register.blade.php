@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama Pegawai</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="nama_pegawai" value="{{ old('name')}}">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" class="form-control" name="no_hp" placeholder="Nomor Handphone" value="{{ old('no_hp')}}">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" required class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki - laki">Laki - laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('name') is-invalid @enderror" name="email" placeholder="email" value="{{ old('email')}}">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('name') is-invalid @enderror" name="password" placeholder="password" value="{{ old('password')}}">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="divisiId">Pilih Divisi Pegawai</label>
                            <select name="divisiId" id="" required class="form-control">
                                <option value="">Pilih Divisi Pegawai</option>
                                {{-- @foreach ($divisi as $d) --}}
                                    <option value="1">Divisi</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="roleId">Pilih Role Pegawai</label>
                            <select name="roleId" id="" required class="form-control">
                                <option value="">Pilih Role Pegawai</option>
                                {{-- @foreach ($role as $r) --}}
                                    <option value="1">admin</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_active">Status Pegawai</label>
                            <select name="is_active" id="" required class="form-control">
                                <option value="">Pilih Status Pegawai</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

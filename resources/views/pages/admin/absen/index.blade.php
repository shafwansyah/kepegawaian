@extends('layouts.app-admin')

@section('title') Admin || Pegawai @endsection

@section('content')
<div class="container-fluid">
    
    <div class="d-sm-flex mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                </div>
                <div class="d-none d-sm-none d-md-block m-3">
                    <a href="{{ route('pegawai.create') }}" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Pegawai
                    </a>
                    <a href="#" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-download fa-sm text-white-50"></i> Cetak
                    </a>
                </div>
                <div class="d-sm-block d-md-none m-3">
                    <a href="{{ route('pegawai.create') }}" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Pegawai
                    </a>
                    <a href="#" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-download fa-sm text-white-50"></i> Cetak
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="col-1">No</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Divisi</th>
                                    <th class="col-1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pegawai as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->role->role }}</td>
                                    <td>{{ $p->divisi->divisi }}</td>
                                    <td class="text-center" style="font-size: 20px">
                                        <a href="{{ route('absen.show', $p->id) }}" style="border-bottom: none;">
                                            <i class="far fa-eye text-success"></i>
                                        </a>
                                    </td>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Data Kosong</td>
                                    </tr>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
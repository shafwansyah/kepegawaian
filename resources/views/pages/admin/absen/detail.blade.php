@extends('layouts.app-admin')

@section('title') Admin || Absensi @endsection

@section('content')
<div class="container-fluid">
    
    <div class="d-sm-flex mb-4">
        <h1 class="h3 mb-0 text-gray-800">Absensi</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Absen Pegawai</h6>
                </div>
                <div class="d-none d-sm-none d-md-block" style="margin-top: 1rem; margin-right: 1rem;">
                    <a href="{{ route('exportAbsen') }}" class="btn btn-sm btn-primary shadow-sm float-right">
                        <i class="fas fa-download fa-sm text-white-50"></i> Cetak
                    </a>
                </div>
                <div class="d-sm-block d-md-none" style="margin-top: 1rem; margin-right: 1rem;">
                    <a href="#" class="btn btn-sm btn-primary shadow-sm float-right">
                        <i class="fas fa-download fa-sm text-white-50"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="col-1">No</th>
                                    <th>Nama</th>
                                    <th>Divisi</th>
                                    <th>Tanggal</th>
                                    <th class="col-2">Masuk</th>
                                    <th class="col-2">Keluar</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rekap as $rekap)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rekap->pegawai->name }}</td>
                                    <td>{{ $rekap->divisi->divisi }}</td>
                                    <td>{{ $rekap->tanggal }}</td>
                                    <td>
                                        <a href="">{{ $rekap->jamMasuk }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/storage/app/public/'.$rekap->fotoMasuk) }}">
                                            {{ $rekap->jamKeluar }}
                                        </a>
                                    </td>
                                    <td>
                                        <img src="{{ url('/storage/app/public/'.$rekap->fotoMasuk) }}" alt="">
                                    </td>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data Kosong</td>
                                    </tr>
                                </tr>
                                @endforelse
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                        @if (isset($files))
                            @foreach ($files as $file)
                                <img src="{{ url($file) }}" alt="">
                            @endforeach
                        @else
                            <p>Gambar Tidak Ada</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
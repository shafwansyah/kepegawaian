@extends('layouts.app-admin')

@section('title') Admin || Role @endsection

@section('content')
<div class="container-fluid">
    
    <div class="d-sm-flex mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Role Pegawai</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="col-1">No</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($role as $r)
                                <tr>
                                    <td>{{ $r->id }}</td>
                                    <td>{{ $r->role }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
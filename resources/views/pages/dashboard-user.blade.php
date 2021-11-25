@extends('layouts.app-user')

@section('title') User || Nama User @endsection

@section('content')

<div class="container-fluid">

    {{-- @foreach ($absensi as $absensi) --}}
    {{-- alert --}}
    @isset($absensi->masuk)
        @if ($absensi->keluar == '')
            <div class="alert alert-success" role="alert">
                <h6 class="my-auto">Anda Telah Melakukan Absen Masuk Pada Pukul : {{ $absensi->jamMasuk }}</h6>
            </div>
        @elseif ($absensi->masuk == '1' && $absensi->keluar == '1')
            <div class="alert alert-warning" role="alert">
                <h6 class="my-auto">Anda Telah Melakukan Absen Pulang Pada Pukul : {{ $absensi->jamKeluar }}</h6>
            </div>
        @endif
    @endisset

    <div class="mt-3">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-sm">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Absensi
                    </h6>
                </div>
                <div class="card-body text-center border-bottom d-none d-md-block" style="padding-bottom: 0">
                    <div class="row">
                        <div class="col-2">
                            <h6><strong>Status</strong></h6>
                        </div>
                        <div class="col">
                            <p><strong>Tanggal</strong></p>
                        </div>
                        <div class="col-lg-4">
                            <h6><strong>Action</strong></h6>
                        </div>
                    </div>
                </div>
                <div class="card-body text-center">
                   <div class="row">
                    
                    <div class="col-lg-2 col-sm-4">
                        <p class="text-secondary"><strong>
                            @isset($absensi->masuk)
                                @if ($absensi->keluar == '')
                                    Selamat Bekerja
                                @elseif ($absensi->masuk == '1' && $absensi->keluar == '1')
                                    Selamat Jalan
                                @elseif ($absensi->masuk == '')
                                    Silahkan Absen
                                @endif
                            @endisset
                        </strong></p>
                    </div>
                    <div class="col-lg-6 col-sm-4">
                        <p>
                            @isset($absensi->tanggal)
                                {{ $absensi->tanggal }}
                            @endisset
                        </p>
                        {{-- {{ var_dump($absensi) }} --}}
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <button id="btnAbsen" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCamera" onclick="btnAbsen('{{ route('absenMasuk') }}')" 
                        @isset($absensi->masuk) {{ ($absensi->masuk == '1') ? 'disabled' : '' }} @endisset>
                            Masuk 
                        </button>
                        
                        @isset($absensi->id)
                        <button id="btnAbsen" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalCamera" onclick="btnAbsen('{{ route('absenKeluar', $absensi->id) }}')" {{ ($absensi->keluar == '1') ? 'disabled' : '' }}>
                            Pulang
                        </button>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <form action="" method="POST" enctype="multipart/form-data" id="doAbsen">
    @csrf
    <div class="modal fade" id="modalCamera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Open Camera</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div id="my_camera"></div>
                    <br/>
                    <input type=button class="btn btn-sm btn-primary" value="Take Snapshot" onClick="take_snapshot()">
                    <input type="hidden" name="image" class="image-tag">
                </div>
                <div class="col-md-6 mt-3">
                    <div id="results">Your captured image will appear here...</div>
                </div>
                <div class="col-md-12 text-center">
                    <br/>
                </div>
            </div>
            <div class="modal-footer">                
                <button type="submit" class="btn btn-success mt-2">Submit</button>
            </div>
          </div>
        </div>
    </div>
    </form>
</div>
{{-- @endforeach --}}
@endsection

@section('script')
<script language="JavaScript"> 

    Webcam.set({
        width: 390,
        height: 290,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach( '#my_camera' );
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }

    function btnAbsen($data_url) {
        $('#doAbsen').attr("action", $data_url);
    }



</script>
@endsection

@section('style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
@endsection
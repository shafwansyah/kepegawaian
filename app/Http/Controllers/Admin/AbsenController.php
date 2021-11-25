<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\User;
use App\Exports\AbsenExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class AbsenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        return view('pages.admin.absen.index',[
            'pegawai' => $users,
        ]);
    }

    public function show($id)
    {
        // $data = Absen::with([
        //     'pegawai', 'divisi'
        // ])->findOrFail($id);

        $data = Absen::where('pegawaiId',$id)->get();
        $files = Storage::allFiles('public');

        // var_dump($rekap);

        return view('pages.admin.absen.detail', [
            'rekap' => $data,
            'files' => $files,
        ]);
    }

    public function export()
    {
        return Excel::download(new AbsenExport, 'absen.xlsx');
    }
}

<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Absen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AbsensiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $currentTime = Carbon::now();
        $getDate = $currentTime->toDateString();

        $data = Absen::where('pegawaiId',$id)
            ->where('tanggal', $getDate)
            ->latest()
            ->first();
        
                    
        return view ('pages.dashboard-user',[
            'absensi' => $data,
        ]);

        // return view ('pages.dashboard-user');

    }

    public function masuk(Request $request)
    {
        $currentTime = Carbon::now();
        $getDate = $currentTime->toDateString();
        $getTime = $currentTime->format('H:i:m');
        $getId = Auth::user()->id;
        $getDivisi = Auth::user()->divisiId;

        $img =  $request->get('image');
        $folderPath = "storage/";
        $image_parts = explode(";base64,", $img);

        foreach ($image_parts as $key => $image){
            $image_base64 = base64_decode($image);
        }

        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);

        Absen::create([
            'divisiId' => $getDivisi,
            'pegawaiId' => $getId,
            'jamMasuk' => $getTime,
            'tanggal' => $getDate,
            'masuk' => '1',
            'fotoMasuk' => $fileName,
        ]);

        return redirect()->back()->with('success', 'Data submitted Successfully');
    }

    public function keluar(Request $request, $id)
    {
        $currentTime = Carbon::now();
        $getDate = $currentTime->toDateString();
        $getTime = $currentTime->format('H:i:m');
        $getId = Auth::user()->id;
        $getDivisi = Auth::user()->divisiId;

        $img =  $request->get('image');
        $folderPath = "storage/";
        $image_parts = explode(";base64,", $img);

        foreach ($image_parts as $key => $image){
            $image_base64 = base64_decode($image);
        }

        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);

        $absen = Absen::find($id);
        $absen->jamKeluar = $getTime;
        $absen->keluar = '1';
        $absen->fotoKeluar = $fileName;
        $absen->save();

        return redirect()->back()->with('success', 'Data submitted Successfully');
    }
}

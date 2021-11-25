<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Divisi;
use Illuminate\Support\Str;

class DivisiController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $divisi = Divisi::all();

        return view('pages.admin.divisi.index', [
            'divisi' => $divisi,
        ]);
    }

    public function create()
    {
        return view ('pages.admin.divisi.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Divisi::create($data);
        return redirect()->route('divisi.index');
    }

    public function destroy($id)
    {
        $data = Divisi::findOrFail($id);
        $data->delete();

        return redirect()->route('divisi.index');
    }
}

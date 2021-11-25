<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Divisi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class PegawaiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::all();

        return view ('pages.admin.pegawai.index', [
            'pegawai' => $users,
        ]);
    }

    public function create()
    {
        $role = Role::all();
        $divisi = Divisi::all();

        return view('pages.admin.pegawai.create', [
            'role' => $role,
            'divisi' => $divisi,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        User::create([
            'name' => $data['name'],
            'no_hp' => $data['no_hp'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']) ,
            'divisiId' => $data['divisiId'],
            'roleId' => $data['roleId'],
            'is_active' => $data['is_active'],
        ]);

        return redirect()->route('pegawai.index');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->route('pegawai.index');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        $role = Role::all();
        $divisi = Divisi::all();

        return view('pages.admin.pegawai.edit', [
            'pegawai' => $data,
            'role' => $role,
            'divisi' => $divisi,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $update = User::findOrFail($id);
        $update->update($data);

        return redirect()->route('pegawai.index');
    }
    
}

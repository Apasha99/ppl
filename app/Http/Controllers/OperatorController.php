<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    public function index(){
        $mahasiswas = Mahasiswa::join('users','mahasiswa.email', '=', 'users.email')
                ->join('dosen_wali', 'mahasiswa.nip', '=', 'dosen_wali.nip')
                ->select('mahasiswa.nama', 'mahasiswa.nim', 'mahasiswa.angkatan', 'mahasiswa.status', 'users.email','users.password','dosen_wali.nip','dosen_wali.nama as dosen_nama')
                ->get();
        $users = User::join('roles','users.role_id','=','roles.id')
                ->select('users.role_id','roles.name')
                ->get();
        return view('dashboardOperator',['mahasiswas'=>$mahasiswas,'users'=>$users]);
    }

    public function create(){
        return view('mahasiswa-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required|max:20|numeric',
            'angkatan' => 'required|numeric',
            'status' => 'required',
            'nip' => 'required|exists:dosen_wali,nip'
        ]);

        $email = strtolower(str_replace(' ', '', $request->nama)) . '@example.com'; // Generate email based on nama
        $password = bcrypt(Str::random(8));

        DB::transaction(function () use ($request, $email, $password) {
            // Membuat user baru
            $user = new User;
            $user->email = $email;
            $user->password = $password;
            $user->role_id = 1; // mengatur role_id menjadi 1
            $user->save();
        
            // Membuat mahasiswa baru
            $mahasiswa = new Mahasiswa;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->nim = $request->nim;
            $mahasiswa->angkatan = $request->angkatan;
            $mahasiswa->status = $request->status;
            $mahasiswa->nip = $request->nip;
            $mahasiswa->email = $email; // menghubungkan ke user yang baru dibuat
            $mahasiswa->save();
        });

        return redirect('dashboardOperator')->with('status', 'Data Mahasiswa berhasil ditambahkan.');
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Departemen;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardOperatorController extends Controller
{
    public function dashboardOperator(Request $request){
        $mahasiswaCount = Mahasiswa::count();
        $dosenCount = Dosen::count();
        $departemenCount = Departemen::count();
        $userCount = User::count();
        $user = User::join('mahasiswa', 'user.email', '=', 'mahasiswa.email')
            ->join('dosen', 'user.email', '=', 'dosen.email')
            ->join('departemen', 'user.email', '=', 'departemen.email')
            ->select('user.id', 'user.email', 'user.password', 'mahasiswa.nama as nama_mahasiswa', 'dosen.nama as nama_dosen', 'departemen.nama as nama_departemen');
        return view('dashboardOperator', ['user'=>$user,'user_count'=> $userCount, 'mahasiswa_count'=> $mahasiswaCount, 'dosen_count'=>$dosenCount,'departemen_count'=>$departemenCount]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Departemen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DashboardOperatorController extends Controller
{
    public function dashboardOperator(Request $request){
        // if(!Schema::hasTable('mahasiswa')){
        //     return "Error: Table 'mahasiswa' does not exist in the database.";
        // }
        
        $mahasiswaCount = Mahasiswa::count();
        $dosenCount = Dosen::count();
        $departemenCount = Departemen::count();
        $userCount = User::count();
        
        $mahasiswas = Mahasiswa::join('users','mahasiswa.email', '=', 'users.email')
                ->join('dosen_wali', 'mahasiswa.nip', '=', 'dosen_wali.nip')
                ->select('mahasiswa.nama', 'mahasiswa.nim', 'mahasiswa.angkatan', 'mahasiswa.status', 'users.email', 'dosen_wali.nip','dosen_wali.nama')
                ->get();
                
        return view('dashboardOperator', ['mahasiswas'=>$mahasiswas,'user_count'=> $userCount, 'mahasiswa_count'=>$mahasiswaCount,'dosen_count'=>$dosenCount, 'departemen_count'=>$departemenCount]);
    }    
}

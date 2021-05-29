<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->with('absen')->get();
        if (request()->has('filterKelas') && request()->has('query')) {
            $filterKelas = request()->get('filterKelas');
            $q = request()->get('query');

            if ($filterKelas != '' && $q != '') {
                $siswa = Siswa::with(['kelas' => function($query) use ($filterKelas) {
                    $query->where('id_kelas', $filterKelas);
                }])->with('absen')
                    ->whereHas('kelas', function($query) use ($filterKelas) {
                        $query->where('id_kelas', $filterKelas);
                    })->where('nama', 'LIKE', '%' . $q . '%')->get();
            } else if ($q != '') {
                $siswa = Siswa::with('kelas')->with('absen')->where('nama', 'LIKE', '%' . $q . '%')->get();
            } else {
                $siswa = Siswa::with(['kelas' => function($query) use ($filterKelas) {
                    $query->where('id_kelas', $filterKelas);
                }])->with('absen')
                    ->whereHas('kelas', function($query) use ($filterKelas) {
                        $query->where('id_kelas', $filterKelas);
                    })->get();
            }
        }
        $kelas = Kelas::all();

        return view('siswa.index_0310')
            ->with('siswa', $siswa)
            ->with('kelas', $kelas);
    }
}

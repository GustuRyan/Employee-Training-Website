<?php

namespace App\Http\Controllers;
use App\Models\Criteria;
use App\Models\SubKompetensi;
use App\Models\SubPenugasan;
use App\Models\SubWawancara;
use Illuminate\Http\Request;

class DSSController extends Controller
{
    public function index () 
    {
        return view('admin.pages.rekomendasi');
    }

    public function store (Request $request)
    {
        $request->validate([
            'nama_pelamar' => ['required', 'string', 'max:255'],
            'kompetensi' => ['required'],
            'penugasan' => ['required'],
            'wawancara' => ['required']
        ]);

        $request->validate([
            'riwayat' => ['required'],
            'pengalaman' => ['required'],
            'keahlian' => ['required'],
            'prestasi' => ['required']
        ]);
        
        $request->validate([
            'kesesuian' => ['required'],
            'kreativitas' => ['required'],
            'inovasi' => ['required']
        ]);

        $request->validate([
            'mental' => ['required'],
            'attitude' => ['required'],
            'komunikasi' => ['required'],
            'motivasi' => ['required']
        ]);

        $bobot_kompetensi = (($request->riwayat * 0.068) + ($request->pengalaman * 0.496) + ($request->keahlian * 0.121) + ($request->prestasi * 0.313)) * 0.106;
        $bobot_penugasan = (($request->kesesuaian * 0.524) + ($request->kreativitas * 0.141) + ($request->inovasi * 0.333)) * 0.260;
        $bobot_wawancara = (($request->mental * 0.288) + ($request->attitude * 0.129) + ($request->komunikasi * 0.495) + ($request->motivasi * 0.085)) * 0.633;
        $skor_final = $bobot_kompetensi + $bobot_penugasan + $bobot_wawancara;

        $request = Criteria::create([
            'nama_pelamar' => $request->nama_pelamar,
            'kompetensi' => $request->kompetensi,
            'penugasan' => $request->penugasan,
            'wawancara' => $request->wawancara,
            'skor_final' => $skor_final
        ]);

        $request = SubKompetensi::create([
            'riwayat' => $request->riwayat,
            'pengalaman' => $request->pengalaman,
            'keahlian' => $request->keahlian,
            'prestasi' => $request->prestasi,
            'bobot_total' => $bobot_kompetensi
        ]);

        $request = SubPenugasan::create([
            'kesesuain' => $request->kesesuaian,
            'kreativitas' => $request->kreativitas,
            'inovasi' => $request->inovasi,
            'bobot_total' => $bobot_penugasan
        ]);

        $request = SubWawancara::create([
            'mental' => $request->mental,
            'attitude' => $request->attitude,
            'komunikasi' => $request->komunikasi,
            'motivasi' => $request->motivasi,
            'bobot_total' => $bobot_wawancara
        ]);
    }

    public function result ()
    {
          
    }
}

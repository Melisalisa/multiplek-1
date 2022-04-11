<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laporan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public  function dataPenyetor(){
        $dataPenyetor = User::paginate(10);
        return view('dashboard.dataPenyetor', compact('dataPenyetor'));
    }

    public function createPenyetor(){
        return view('dashboard.createPenyetor');
    }

    public function storePenyetor(Request $request){
        $request->validate([
            'name' => 'required',
            'nik' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'alamat' => 'string',
        ]);

        User::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'role_id' => 2,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('data');
    }

    public function editPenyetor($id){
        $penyetor = User::findOrFail($id);
        return view('dashboard.editPenyetor', compact('penyetor'));
    }

    public function updatePenyetor(Request $request, $id){
        $penyetor = User::find($id);
        $penyetor->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('data');
    }

    public function deletePenyetor($id){
        $dataPenyetor = User::find($id);
        $dataPenyetor->delete();
        return redirect()->route('data');
    }

    public function searchPenyetor(Request $request){
        $keyword = $request->search;
        $dataPenyetor = User::where('name', 'like', '%'. $keyword . '%')->paginate(6);
        return view('welcome', [
            'dataPenyetor' => $dataPenyetor,
        ]);
    }

    // Laporan

    public function laporan(){
        $laporan = Laporan::with('User','kategori')->paginate(10);

        // dd($laporan);
        return view('dashboard.laporan', compact('laporan'));
    }

    public function createLaporan(){
        // create laporan store
        $kategori = Kategori::all();
        return view('dashboard.createPendapatan', compact('kategori'));
    }

    public function storeLaporan(Request $request){
        // create laporan store
        // dd($request);
        $createLaporan = $request->validate([
            'kategori_id' => 'required',
            'user_id' => 'required',
            'jumlah_pendapatan' => 'required',
            'tanggal' => 'required',
        ]);

        Laporan::create($createLaporan);

        return redirect()->route('laporan');
    }
}

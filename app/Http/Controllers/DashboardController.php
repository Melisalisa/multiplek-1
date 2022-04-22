<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laporan;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade as  PDF;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // use PDF;
    public function index()
    {
        return view('dashboard.index');
    }

    public function dataPenyetor(){
        $dataPenyetor = User::paginate(10);
        return view('dashboard.dataPenyetor', compact('dataPenyetor'));
    }

    public function searchPenyetor(Request $request){
        $keyword = $request->search;
        $dataPenyetor = User::where('name', 'like', '%'. $keyword . '%')->paginate(10);
        // dd($dataPenyetor);
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

    // Laporan

    public function laporan(){
        if (Auth()->user()->role_id == 1) {
            $laporan = Laporan::with('User','kategori')->paginate(10);
        }else{
            $laporan = Laporan::with('User','kategori')->where('user_id', Auth()->user()->id)->paginate(10);
        }

        // dd($laporan);
        return view('dashboard.laporan', compact('laporan'));
    }

    public function laporanTable(){


        if (Auth()->user()->role_id == 1) {
            $laporan = Laporan::with('User','kategori')->get();
        }else{
            $laporan = Laporan::with('User','kategori')->where('user_id', Auth()->user()->id)->get();
        }

        // dd($laporan);
        return view('dashboard.laporanTable', compact('laporan'));
    }

    public function cetakLaporan(){
        $laporan = Laporan::with('User','kategori')->get();
        $pdf = PDF::loadview('dashboard.laporanTable', compact('laporan'));
        return $pdf->stream();
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

    // Pengiriman
    public function pengiriman(){
        $pengiriman = Pengiriman::with('User','kategori')->paginate(10);
        return view('dashboard.pengiriman', compact('pengiriman'));
    }

    public function createPengiriman(){
        // create laporan store
        $kategori = Kategori::all();
        return view('dashboard.createPengiriman', compact('kategori'));
    }

    // create store pengiriman
    public function storePengiriman(Request $request){
        // create laporan store
        // dd($request);
        $createPengiriman = $request->validate([
            'kategori_id' => 'required',
            'user_id' => 'required',
            'tanggal' => 'required',
            'jumlah_stok' => 'required',
        ]);

        Pengiriman::create($createPengiriman);

        return redirect()->route('pengiriman');
    }

    public function changeStatusPengirim(Request $request,$id){
        $pengiriman = Pengiriman::find($id);
        $pengiriman->update([
            'status' => $request->status,
        ]);

        return redirect()->route('pengiriman');
    }

}

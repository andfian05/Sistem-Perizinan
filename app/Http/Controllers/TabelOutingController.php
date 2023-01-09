<?php

namespace App\Http\Controllers;

use App\Models\Outing;
use App\Models\TabelOuting;
use App\Models\User;
use Illuminate\Http\Request;

class TabelOutingController extends Controller
{
    public function index()
    {
        return view('page.mahasantri.info.keterangan',[
            'title' => ['Keterangan'],
            'out' => Outing::latest()->get(),
        ]);
    }
    
    public function submit(Request $request){
        $validatedData = $request->validate([
            'users_id' => 'required',
            'keterangan' => 'required',
        ]);

        $tab = TabelOuting::create($validatedData);

        if($tab){
            return redirect('/report-wait');
        }else{
        }
    }

    public function masuk($id,Request $request){
        $all = $request->except(['_token','_method']);
        $data = TabelOuting::find($id);
        $update = $data->update($all);

	if($update)
        {
            return redirect()->back()->with('success','Pengajuan Berhasil Terkirim');
        }
        else
        {
            return redirect()->back()->with('failed','Mahasantri Gagal Di Setujui');
        }
    }

    public function iya($id,Request $request){
        $all = $request->except(['_token','_method']);
        $data = TabelOuting::find($id);
        $update = $data->update($all);

	if($update)
        {
            return redirect()->back()->with('success','Mahasantri Berhasil Di Setujui');
        }
        else
        {
            return redirect()->back()->with('failed','Mahasantri Gagal Di Setujui');
        }
    }

    public function tidak($id,Request $request){
        $all = $request->except(['_token','_method']);
        $data = TabelOuting::find($id);
        $update = $data->update($all);

	if($update)
        {
            return redirect()->back()->with('success','Mahasantri Tidak Di Setujui');
        }
        else
        {
            return redirect()->back()->with('failed','Mahasantri Gagal Di Input');
        }
    }

    public function sukses(){
        return view('page.mahasantri.info.laporsucces',[
            'title' => ['Sukses!'],
            'out' => Outing::latest()->get()
        ]); 
    }

    public function wait(){
        return view('page.mahasantri.info.wait',[
            'title' => ['Berhasil!'],
            'out' => Outing::latest()->get(),
            'tab_out' => TabelOuting::all()
        ]);
    }

    public function gagal(){
        return view('page.mahasantri.info.laporfail',[
        'title' => ['Gagal!'],
            'out' => Outing::latest()->get()
        ]);
    }

    public function log_user(){
        return view('page.administrator.logouting',[
            'title' => ['Form Mahasantri'],
            'wait' => TabelOuting::latest()->where('absen','wait')->get(),
            'iya' => TabelOuting::latest()->where('absen','iya')->get(),
            'tidak' => TabelOuting::latest()->where('absen','tidak')->get(),
            'sudah' => TabelOuting::latest()->where('absen','sudah')->get(),
            'belum' => TabelOuting::latest()->where('absen','belum')->get(),
            'late' => TabelOuting::latest()->where('absen','late')->get(),
            'user' => User::where('level','mahasantri')->filter(request(['search']))->get(),
            'tab_outing' => TabelOuting::latest()->get()
        ]);
    }

    public function log_all_user(){
        return view('page.administrator.logall',[
            'title' => ['Form Mahasantri'],
            'sudah' => TabelOuting::latest()->where('absen','sudah')->get(),
            'belum' => TabelOuting::latest()->where('absen','belum')->get(),
            'late' => TabelOuting::latest()->where('absen','late')->get(),
            'user' => User::where('level','mahasantri')->filter(request(['search']))->get()
        ]);
    }

    public function sub_call($id,Request $request){

        $all = $request->except(['_token','_method']);
        $data = TabelOuting::find($id);
        $update = $data->update($all);

	if($update)
        {
            return redirect()->back()->with('success','Mahasantri Berhasil Di Update');
        }
        else
        {
            return redirect()->back()->with('failed','Mahasantri Gagal Di Update');
        }
    }
}

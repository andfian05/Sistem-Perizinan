<?php

namespace App\Http\Controllers;

use App\Models\Outing;
use Illuminate\Http\Request;

class OutingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.administrator.outing',[
            'title' => ['Form Izin Keluar'],
            'outing' =>  Outing::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.administrator.create.FormOuting',[
            'title' => ['Form Izin Keluar'],
            'outing' =>  Outing::latest()->paginate(7)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
        ]);
        Outing::create($validatedData);
        return redirect('/page-outing')->with('success','Data Baru Telah Ditambah !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outing  $outing
     * @return \Illuminate\Http\Response
     */
    public function show(Outing $outing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outing  $outing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $out = Outing::find($id);
        return view('page.administrator.edit.FormOuting',[
            'outing' => $out,
            'title' => ['Edit Category']
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outing  $outing
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $out = Outing::find($id);
        $validatedData = $request->validate([
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
        ]);
        $out->update($validatedData);
        return redirect('/page-outing')->with('success','Data Baru Telah Disimpan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outing  $outing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fla = Outing::find($id);
        $fla->delete();
        return redirect('/page-outing')->with('success','Tabel berhasil dihapus');
    }

	public function status($id,Request $request)
    {
        $all = $request->except(['_token','_method']);
        $data = Outing::find($id);
        $update = $data->update($all);

	if($update)
        {
            return redirect()->back()->with('success','Jam Berhasil Di Update');
        }
        else
        {
            return redirect()->back()->with('failed','Jam Gagal Di Update');
        }
    }
}

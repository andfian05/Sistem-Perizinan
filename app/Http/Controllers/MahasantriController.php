<?php

namespace App\Http\Controllers;

use App\Models\Mahasantri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MahasantriController extends Controller
{
    public function index(){
        return view('page.administrator.mahasantri',[
            'title' => ['Form Mahasantri'],
            'user' => User::latest()->paginate(7),
        ]);
    }


    public function create()
    {
        // off 'cause use Modal
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required|max:15',
            'password' => 'required|min:4',
            'level' => 'required',
            'kamar' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
            'image' => 'image|file|max:2048',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('profile-images');
        }
        // return dd($validatedData['image']);

        User::create($validatedData);
        return redirect('/page-mahasantri')->with('success','User Baru Telah Ditambah !');
    }


    public function show(Mahasantri $mahasantri)
    {
        // off 'cause useless
    }


    public function edit($id, Request $request)
    {
        // off 'cause use Modal
    }


    public function update($id, Request $request)
    {
        $mahasantri = User::find($id);
        $request->validate([
            'nama' => 'required',
            'username' => 'required|max:15',
            'current_password' => 'required',
            'password' => 'required|min:4',
            'level' => 'required',
            'kamar' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2000',
        ]);


        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profile-images');
        }

        $vardata = $request->except(['_method','_token']);
        if((Hash::check($request->current_password, $mahasantri->password) == 1)){
            $vardata['password'] = Hash::make($vardata['password']);
            $mahasantri->update($vardata);
            return redirect('/page-mahasantri')->with('success','success Sandi Berhasil Diganti');
        }else{
            return redirect('/page-mahasantri')->with('failed','Password Not Match !');
        }

    }


    public function destroy($id)
    {
        $mahasantri = User::find($id);
        $mahasantri->delete();

        if($mahasantri != null){
            return redirect('/page-mahasantri')->with('success','Mahasantri berhasil dihapus');
        }
        // if(Storage::delete($mahasantri->image)) {
            //     $mahasantri->delete();
            // }
            return redirect('/page-mahasantri')->with('failed','Mahasantri Gagal dihapus!!');
    }

    public function search($id = "all"){

        $data = [];

        if($id == "all"){
            $data = User::latest()->where('level','mahasantri')->paginate(7);
        }else{
            $data = User::where('level','mahasantri')->where('nama', 'like', $id . '%')->get();
        }

        return view('page.administrator.part.table.mahasantri',[
            'mahasantri' => $data,
            'data' => $data
        ]);
    }
}

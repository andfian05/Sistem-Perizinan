<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('page.administrator.user',[
            'title' => ['Form User'],
            'user' => User::latest()->paginate(7),
        ]);
    }

    public function create()
    {
        //Off 'cause Use Modal!
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required|max:255',
            'password' => 'required',
            'level' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/page-user')->with('success','User Baru Telah Ditambah !');
    }

    public function edit(User $user)
    {
        //Off 'cause Use Modal!
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'level' => 'required',
            'current_password' => 'required',
            'password' => 'required|min:4',
        ]);

        $vardata = $request->except(['_method','_token']);
        if((Hash::check($request->current_password, $user->password) == 1)){
            $vardata['password'] = Hash::make($vardata['password']);
            $user->update($vardata);
            return redirect('/page-user')->with('success','success Sandi Berhasil Diganti');
        }else{
            return redirect('/page-user')->with('failed','Password Not Match !');
        }

    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/page-user')->with('success','User '. $user->nama .' Berhasil Dihapus');
    }

    public function search($id = "all"){

        $data = [];

        if($id == "all"){
            $data = User::latest()->paginate(7);
        }else{
            $data = User::where('nama', 'like', $id . '%')->get();
        }

        return view('page.administrator.part.table.user',[
            'user' => $data,
            'data' => $data
        ]);
    }

    public function change(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:4',
        ]);
        $user = auth()->user()->id;
        $vardata = $request->only(['password','created_at','updated_at']);
        if((Hash::check($request->current_password, auth()->user()->password) == 1)){
            $vardata['password'] = Hash::make($vardata['password']);
            User::find($user)->update($vardata);
            return redirect('/change-pass')->with('success','success Sandi Berhasil Diganti');
        }else{
            return redirect('/change-pass')->with('failed','Password Not Match !');
        }
    }
}

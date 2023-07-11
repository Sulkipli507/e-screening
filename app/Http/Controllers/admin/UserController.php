<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create(){
        return view('admin.user.create');
    }
    
    public function store(Request $request){
        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->password = \Hash::make($request->get('password'));
        $user->save();
        return redirect()->route('user-index')->with('status', 'Sukses insert data user');
    }

    public function destroy($id){
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('user-index')->with('status', 'Sukses hapus data user');
    }

    public function edit($id){
        $user = User::where('id', $id)->first();
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::where('id', $id)->first();
        $user->update($request->all());
        return redirect()->route('user-index')->with('status', 'Sukses update data user');
    }
    public function editProfile(){
        $user = User::where('id', auth()->id())->first();
        return view('admin.user.profil',compact('user'));
    }

    public function updateProfile(Request $request, $id){
        $user = User::where('id', $id)->first();
        $user->update($request->all());
        return redirect()->route('user-profile')->with('status', 'Sukses update profil');
    }

    public function updatePassword(Request $request, $id){
        $this->validate($request, [
            'password' => 'required|confirmed'
        ]);
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user-profile')->with('status', 'Sukses update password');
    }
}

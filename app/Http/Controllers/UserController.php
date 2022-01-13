<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $objek = \App\User::latest()->paginate(10);
        $data['objek'] = $objek;
        return view ('user_index', $data);
    }
    public function tambah()
    {
        
        $data['objek'] = new \App\User();
        $data['action'] = 'UserController@simpan';
        $data['method'] = 'POST';
        $data['nama_tombol'] = 'SIMPAN';
        return view ('user_form', $data);
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'name'=> 'required|min:2',
            'email'=> 'required|email|unique:users,email',
            'password' => 'same:password_confirmation'
        ]);
        $objek = new \App\User();
        $objek->name = $request->name;
        $objek->email = $request->email;
        $objek->password = bcrypt($request->password);
        $objek->save();
        return back()->with('pesan', 'DATA SUDAH DISIMPAN');
    }
    public function edit($id)
    {
        
        $data['objek'] = \App\User::findOrFail($id);
        $data['action'] = ['UserController@update', $id];
        $data['method'] = 'PUT';
        $data['nama_tombol'] = 'UPDATE';
        return view ('user_form', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|min:2',
            'email'=> 'required|email|unique:users,email,'. $id,
            'password' => 'same:password_confirmation'
        ]);
        $objek = \App\User::findOrFail($id);
        $objek->name = $request->name;
        $objek->email = $request->email;
        if ($request->password !="")
        {
            $objek->password = bcrypt($request->password);
        }
        $objek->password = bcrypt($request->password);
        $objek->save();
        return redirect('admin/user/index')->with('pesan', 'DATA SUDAH DIUPDATE');
    }
    public function hapus($id)
    {
        $objek = \App\User::findOrFail($id);
        $objek->delete();
        return back()->with('pesan', 'DATA BERHASIL DIHAPUS');
    }
   
}

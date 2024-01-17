<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.contents2.user.index',['user'=>User::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contents2.user.create',[
            'user' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'username'=>'required',
            'email'=>'required',
            'email_verified_at'=>'required',
            'password' => 'required',
        ]);

        User::create($validatedData);
        return redirect('/user-backend')->with('pesan','Data Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.contents2.user.edit',[
            'user'=>USer::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData=$request->validate([
            'username'=>'required',
            'email'=>'required',
            'email_verified_at'=>'required',
            'password' => 'required',
        ]);

        User::where('id',$id)->update($validatedData);
        return redirect('/user-backend')->with('pesan','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/user-backend')->with('pesan','Data Berhasil di Hapus');
    }
}

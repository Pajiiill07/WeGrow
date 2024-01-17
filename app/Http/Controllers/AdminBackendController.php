<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.contents2.admin_outlet.index',['admin'=>Admin::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contents2.admin_outlet.create',[
            'admin' => Admin::all(),
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

        Admin::create($validatedData);
        return redirect('/admin-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('admin.contents2.admin_outlet.edit',[
            'admin'=>Admin::find($id),
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

        Admin::where('id',$id)->update($validatedData);
        return redirect('/admin-backend')->with('pesan','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Admin::destroy($id);
        return redirect('/admin-backend')->with('pesan','Data Berhasil di Hapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\BranchOutlet;
use Illuminate\Http\Request;

class MenuBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.contents.menu.index',['menu'=>Menu::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contents.menu.create',['branchs'=>BranchOutlet::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'menu_name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'branch_id' => 'required'
        ]);

        Menu::create($validatedData);
        return redirect('/menu-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('backend.contents.menu.edit',[
            'menu'=>Menu::find($id),
            'branchs'=>BranchOutlet::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData=$request->validate([
            'menu_name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'branch_id' => 'required'
        ]);

        Menu::where('id',$id)->update($validatedData);
        return redirect('/menu-backend')->with('pesan','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Menu::destroy($id);
        return redirect('/menu-backend')->with('pesan','Data Berhasil di Hapus');
    }
}

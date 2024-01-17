<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\BranchOutlet;
use Illuminate\Http\Request;

class BranchOutletBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.contents2.branch_outlet.index',['branch'=>BranchOutlet::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contents2.branch_outlet.create',[
            'branch' => BranchOutlet::all(),
            'outlets' => Outlet::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'outlet_id'=>'required',
            'branch_name'=>'required',
            'telp_number'=>'required',
            'address' => 'required',
        ]);

        BranchOutlet::create($validatedData);
        return redirect('/branch-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('admin.contents2.branch_outlet.edit',[
            'branch'=>BranchOutlet::find($id),
            'outlets'=>Outlet::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData=$request->validate([
            'outlet_id'=>'required',
            'branch_name'=>'required',
            'telp_number'=>'required',
            'address' => 'required',
        ]);

        BranchOutlet::where('id',$id)->update($validatedData);
        return redirect('/branch-backend')->with('pesan','Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BranchOutlet::destroy($id);
        return redirect('/branch-backend')->with('pesan','Data Berhasil di Hapus');
    }
}

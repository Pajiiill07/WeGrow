<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.contents2.outlet.index',['outlet'=>Outlet::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contents2.outlet.create',[
            'outlet' => Outlet::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'outlet_name' => 'required',
            'file_upload' => 'required',
            'telp_number' => 'required',
            'address' => 'required',
        ]);
    
        // Pemindahan file ke direktori public/images
        if ($request->hasFile('file_upload')) {
            $namaFile='img_'.time().'_'.$request->file_upload->getClientOriginalName();
            $request->file_upload->move('images',$namaFile);
        }
        else{
            $namaFile='img_default.png';
        }
        $validatedData['file_upload']=$namaFile;

        Outlet::create($validatedData);
        return redirect('/outlet-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('admin.contents2.outlet.edit',[
            'outlet'=>Outlet::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'outlet_name' => 'required',
            'file_upload' => 'required',
            'telp_number' => 'required',
            'address' => 'required',
        ]);
    
        // Pemindahan file ke direktori public/images
        if ($request->hasFile('file_upload')) {
            $namaFile='img_'.time().'_'.$request->file_upload->getClientOriginalName();
            $request->file_upload->move('images',$namaFile);
        }
        else{
            $namaFile='img_default.png';
        }
        $validatedData['file_upload']=$namaFile;

        Outlet::where('id',$id)->update($validatedData);
        return redirect('/outlet-backend')->with('pesan','Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cari=Outlet::find($id);
        if($cari->file_upload!=''){
            $image_url=public_path().'/images/'.$cari->file_upload;
            unlink($image_url);
        }
        
        Outlet::destroy($id);
        return redirect('/meja-backend')->with('pesan','Data Berhasil di Hapus');
    }
}

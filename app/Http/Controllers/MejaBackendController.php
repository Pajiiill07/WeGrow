<?php

namespace App\Http\Controllers;
use App\Models\Desk;
use App\Models\BranchOutlet;
use Illuminate\Http\Request;
use PDF;

class MejaBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.contents.meja.index',['meja'=>Desk::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contents.meja.create',['branchs'=>BranchOutlet::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_desk' => 'required',
            'capacity' => 'required',
            'lokasi_meja' => 'required',
            'file_upload' => 'required',
            'branch_id' => 'required'
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
        $validatedData['branch_id'] = $request->branch_id;

        Desk::create($validatedData);
        return redirect('/meja-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('backend.contents.meja.edit',[
            'meja'=>Desk::find($id),
            'branchs'=>BranchOutlet::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'no_desk' => 'required',
            'capacity' => 'required',
            'lokasi_meja' => 'required',
            'file_upload' => 'required',
            'branch_id' => 'required'
        ]);
    
        // Pemindahan file ke direktori public/images
        if ($request->hasFile('file_upload')) {
            if ($request->image_old){
                $image_url=public_path().'/images/'.$request->image_old;
                unlink($image_url);
            }
            $namaFile='img_'.time().'_'.$request->file_upload->getClientOriginalName();
            $request->file_upload->move('images',$namaFile);
        }
        else{
            $namaFile='';
        }
        $validatedData['file_upload']=$namaFile;
        $validatedData['branch_id']=$request->branch_id;

        Desk::where('id',$id)->update($validatedData);
        return redirect('/meja-backend')->with('pesan','Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cari=Desk::find($id);
        if($cari->file_upload!=''){
            $image_url=public_path().'/images/'.$cari->file_upload;
            unlink($image_url);
        }
        
        Desk::destroy($id);
        return redirect('/meja-backend')->with('pesan','Data Berhasil di Hapus');
    }

    public function export_meja_pdf()
    {
        $data['meja'] = Desk::all();

        $pdf = PDF::loadView('backend.pdf.meja', $data);
        // return $pdf->download('pemohon.pdf');
        return $pdf->stream();
    }
}

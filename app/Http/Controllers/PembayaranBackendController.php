<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;

class PembayaranBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.contents.pembayaran.index',['bayar'=>Payment::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contents.pembayaran.create',['reserve'=>Reservation::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'reserve_id'=>'required',
            'amount'=>'required',
            'payment_methode'=>'required',
            'payment_date' => 'required',
            'status' => 'required',
        ]);

        Payment::create($validatedData);
        return redirect('/bayar-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('backend.contents.pembayaran.edit',[
            'bayar'=>Payment::find($id),
            'reserves'=>Reservation::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData=$request->validate([
            'reserve_id'=>'required',
            'amount'=>'required',
            'payment_methode'=>'required',
            'payment_date' => 'required',
            'status' => 'required',
        ]);

        Payment::where('id',$id)->update($validatedData);
        return redirect('/bayar-backend')->with('pesan','Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Payment::destroy($id);
        return redirect('/bayar-backend')->with('pesan','Data Berhasil di Hapus');
    }
}

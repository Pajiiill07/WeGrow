<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\BranchOutlet;
use App\Models\Desk;
use App\Models\Customer;
use Illuminate\Http\Request;

class ReservasiBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.contents.reservasi.index',['reserve'=>Reservation::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contents.reservasi.create',[
            'mejas' => Desk::all(),
            'branchs' => BranchOutlet::all(),
            'customers' => Customer::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'reserve_date'=>'required',
            'reserve_time'=>'required',
            'num_visitors'=>'required',
            'meja_id' => 'required',
            'branch_id' => 'required',
            'customer_id' => 'required'
        ]);

        Reservation::create($validatedData);
        return redirect('/reserve-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('backend.contents.reservasi.edit',[
            'reserve'=>Reservation::find($id),
            'mejas'=>Desk::all(),
            'branchs'=>BranchOutlet::all(),
            'customers'=>Customer::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData=$request->validate([
            'reserve_date'=>'required',
            'reserve_time'=>'required',
            'num_visitors'=>'required',
            'meja_id' => 'required',
            'branch_id' => 'required',
            'customer_id' => 'required'
        ]);

        Reservation::where('id',$id)->update($validatedData);
        return redirect('/reserve-backend')->with('pesan','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Reservation::destroy($id);
        return redirect('/reserve-backend')->with('pesan','Data Berhasil di Hapus');
    }
}

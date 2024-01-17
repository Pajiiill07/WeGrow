<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Reservation;
use Illuminate\Http\Request;

class PesananBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.contents.pesanan.index',['order'=>Order::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contents.pesanan.create',[
            'reserves'=>Reservation::all(),
            'menus'=>Menu::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'reserve_id'=>'required',
            'menu_id'=>'required',
            'quantity'=>'required',
        ]);

        Order::create($validatedData);
        return redirect('/order-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('backend.contents.pesanan.edit',[
            'order'=>Order::find($id),
            'reserves'=>Reservation::all(),
            'menus'=>Menu::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData=$request->validate([
            'reserve_id'=>'required',
            'menu_id'=>'required',
            'quantity'=>'required',
        ]);

        Order::where('id',$id)->update($validatedData);
        return redirect('/order-backend')->with('pesan','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::destroy($id);
        return redirect('/order-backend')->with('pesan','Data Berhasil di Hapus');
    }
}

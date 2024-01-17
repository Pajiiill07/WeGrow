<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.contents2.customer.index',['customer'=>Customer::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contents2.customer.create',[
            'customer' => Customer::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'user_id'=>'required',
            'full_name'=>'required',
            'telp_number'=>'required',
            'address' => 'required',
        ]);

        Customer::create($validatedData);
        return redirect('/customer-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('admin.contents2.customer.edit',[
            'customer'=>Customer::find($id),
            'users'=>User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData=$request->validate([
            'user_id'=>'required',
            'full_name'=>'required',
            'telp_number'=>'required',
            'address' => 'required',
        ]);

        Customer::where('id',$id)->update($validatedData);
        return redirect('/customer-backend')->with('pesan','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::destroy($id);
        return redirect('/customer-backend')->with('pesan','Data Berhasil di Hapus');
    }
}

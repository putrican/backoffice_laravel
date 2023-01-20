<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagians = Bagian::all();
        return view('bagian.index', compact('bagians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bagian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'marketing' => 'required',
            'marking' => 'required',
            'item' => 'required',
            'size' => 'required',
            'qty' => 'required',
            'harga_custom' => 'required',
            'harga_kapal' => 'required',
            'harga_gudang' => 'required',
            'total' => 'required',
            'asal' => 'required',
            'port' => 'required',
            'consignee' => 'required',
            'desc_bl' => 'required',
            'hs_code' => 'required',
            'type' => 'required',
            'antar_ke' => 'required',
            'notify_party' => 'required',
            'ppn' => 'required',
            'total_invoice_rmb' =>'required',
            'ket'=> 'required',
        ]);

        Bagian::create($validatedData);
        return redirect('/')->with('pesan', "Bagian $request->marketing Berhasil Di simpan");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function show(Bagian $bagian)
    {
        return view('bagian.show', compact('bagian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function edit(Bagian $bagian)
    {
        return view('bagian.edit', compact('bagian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bagian $bagian)
    {
        $validatedData = $request->validate([
            'marketing' => 'required',
            'marking' => 'required',
            'item' => 'required',
            'size' => 'required',
            'qty' => 'required',
            'harga_custom' => 'required',
            'harga_kapal' => 'required',
            'harga_gudang' => 'required',
            'total' => 'required',
            'asal' => 'required',
            'port' => 'required',
            'consignee' => 'required',
            'desc_bl' => 'required',
            'hs_code' => 'required',
            'type' => 'required',
            'antar_ke' => 'required',
            'notify_party' => 'required',
            'ppn' => 'required',
            'total_invoice_rmb' =>'required',
            'ket'=> 'required',
        ]);

        Bagian::update($validatedData);
        return redirect('/bagians/' .$bagian->id)->with('pesan', "Bagian $request->marketing Berhasil Di ubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bagian $bagian)
    {
        $bagian->delete();
        return redirect('/')->with('pesan', "Bagian $bagian->marketing Berhasil di simpan");
    }
}

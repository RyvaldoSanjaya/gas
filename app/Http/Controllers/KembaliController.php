<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kembali;
use App\Models\Alumni;

class KembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Kembali::all();
        $data = Kembali::with('alumni')->get();
        return view('kembali',compact('data'));
        // return view('kembali');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kembali_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'tgl_kembali' => 'required|date',
            'gas_id' => 'required|integer',
            'qty' => 'required|integer|min:1',
        ]);

        Kembali::create([
            'nama' => $request->nama,
            'tgl_kembali' => $request->tgl_kembali,
            'gas_id' => $request->gas_id,
            'qty' => $request->qty,
        ]);
        Alumni::where('id', $request->gas_id)->increment('qty', $request->qty);
        return redirect()->route('kembali');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=kembali::where('id', $id)->firstorfail();
        return view('kembali_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Kembali::where('id', $id)
            ->update([
                'nama' => $request->nama,
                'tgl_kembali' => $request->tgl_kembali,
                'gas_id' => $request->gas_id,
                'qty' => $request->qty,
            ]);
        return redirect()->route('kembali');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kembali::where('id', $id)
            ->delete();
        
        return redirect()->route('kembali');
    }
}

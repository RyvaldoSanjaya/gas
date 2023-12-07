<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\Alumni;
use CreatePinjamTable;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Pinjam::all();
        $data = Pinjam::with('alumni')->get();
        // $data=[
        //     [
        //         'nama'      =>  'meytio',
        //         'tanggal'   =>  '08-10-2023',
        //         'Jenis'     =>  '5.5 KG',
        //         'qty'       =>  '100'
        //     ],
        //     [
        //         'nama'      =>  'surya',
        //         'tanggal'   =>  '08-10-2023',
        //         'Jenis'     =>  '14 KG',
        //         'qty'       =>  '100'
        //     ]
        // ];
        return view('pinjam',compact('data'));
        //return view('pinjam');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pinjam_create');
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
            'tgl_pinjam' => 'required|date',
            'gas_id' => 'required|integer',
            'qty' => 'required|integer|min:1',
        ]);

        Pinjam::create([
            'nama' => $request->nama,
            'tgl_pinjam' => $request->tgl_pinjam,
            'gas_id' => $request->gas_id,
            'qty' => $request->qty,
        ]);
        Alumni::where('id', $request->gas_id)->decrement('qty', $request->qty);
        return redirect()->route('pinjam');
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
        $data=pinjam::where('id', $id)->firstorfail();
        return view('pinjam_edit', compact('data'));
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
        $data = Pinjam::where('id', $id)
            ->update([
                'nama' => $request->nama,
                'tgl_pinjam' => $request->tgl_pinjam,
                'gas_id' => $request->gas_id,
                'qty' => $request->qty,
            ]);
        return redirect()->route('pinjam');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pinjam::where('id', $id)
            ->delete();
        
        return redirect()->route('pinjam');
    }
}

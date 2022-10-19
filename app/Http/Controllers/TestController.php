<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = app('firebase.firestore')->database()->collection('buku')->documents();
        return view('welcome',["buku" => $buku]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stuRef = app('firebase.firestore')->database()->collection('buku')->newDocument();
        $stuRef->set([
            'nama_buku' => $request->nama_buku,
            'penerbit' => $request->penerbit,
            'penulis' => $request->penulis,
            'tahun' => $request->tahun
        ]);

        return back()->withInput();
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
        echo $id;
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
        $book = app('firebase.firestore')->database()->collection('buku')->document($id)
        ->update([
            ['path' => 'nama_buku', 'value' => $request->nama_buku],
            ['path' => 'penerbit', 'value' => $request->penerbit],
            ['path' => 'penulis', 'value' => $request->penulis],
            ['path' => 'tahun', 'value' => $request->tahun]
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = app('firebase.firestore')->database()->collection('buku')->document($id)
        ->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penulis;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $penulis = Penulis::get();
        $count = $penulis->count();
        $search = $request->input('search');

        // Mendapatkan data penulis dengan pagination dan filter pencarian jika ada
        $penulis = Penulis::when($search, function ($query, $search) {
                        return $query->where('nama', 'like', "%{$search}%");
                    })
                    ->paginate(10);
        return view('penulis.index', compact('penulis', 'count', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penulis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
        ]);

        $penulis = new Penulis();
        $penulis->nama = $request->nama;
        $penulis->save();

        return redirect('/penulis')->with('pesan', 'Data berhasil disimpan');
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
    public function edit($id)
    {
        $penulis = Penulis::find($id);
        return view('penulis.edit', compact('penulis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
        ]);
        $penulis = Penulis::find($id);
        $penulis->nama = $request->input('nama');
        $penulis->save();

        return redirect('/penulis')->with('pesan', 'Item updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penulis = Penulis::find($id);
        $penulis->delete();

        return redirect('/penulis');
    }
}

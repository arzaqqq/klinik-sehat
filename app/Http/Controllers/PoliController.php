<?php
namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['poli'] = Poli::get();
        return view('poli_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'biaya' => 'required',
            'keterangan' => 'nullable',
        ]);
        Poli::create($requestData);
        flash('Berhasil tambah data')->success();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $poli = Poli::findOrFail($id);
        return view('poli_edit', compact('poli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'biaya' => 'required',
            'keterangan' => 'nullable',
        ]);

        $poli = Poli::findOrFail($id);
        $poli->update($requestData);
        flash('Berhasil mengupdate data')->success();
        return redirect()->route('poli.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();
        flash('Berhasil menghapus data')->success();
        return back();
    }
}

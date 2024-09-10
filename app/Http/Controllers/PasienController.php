<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use DragonCode\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = \App\Models\pasien::latest()->paginate(10);
        return view('pasien', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('pasien_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required | min:3',
             'no_pasien' => 'required',
             'alamat' => 'nullable',
             'umur' => 'required',
             'jenis_kelamin' => 'required', 
             'foto' => 'required|image|mimes:jpeg,png,jpg|max:300000'          
        ]);

        $pasien = new \App\Models\pasien;
        $pasien->fill($requestData);
        $pasien->foto = $request->file('foto')->store('public');
        $pasien->save();
        flash('Berhasil meyimpan data')->success();
        return back();
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
        $data['pasien']= Pasien::findOrFail($id);
        return view('pasien_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required | min:3',
             'no_pasien' => 'required | unique:pasiens,no_pasien,' . $id,
             'alamat' => 'nullable',
             'umur' => 'required',
             'jenis_kelamin' => 'required', 
             'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:300000'          
        ]);

        $pasien = new \App\Models\pasien;
        $pasien->fill($requestData);
        if ($request->hasFile('foto')) {
            Storage::delete($pasien->foto);
            $pasien->foto = $request->file('foto')->store('public');
        }
       
        $pasien->save();
        flash('Berhasil meyimpan data')->success();
        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        
        if($pasien->daftar->count() >= 1){
            flash('Pasien ini memiliki data yang masih aktif')->error();
            return back();
        }

        
        if ($pasien->foto != null && Storage::exists($pasien->foto)){
            Storage::delete($pasien->foto);
        }
        $pasien->delete();
        flash('Berhasil menghapus data')->success();
        return back();
    }
}
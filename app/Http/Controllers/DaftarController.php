<?php

namespace App\Http\Controllers;

use App\Models\poli;
use App\Models\daftar;
use App\Models\pasien;
use Illuminate\Http\Request;
use App\Http\Requests\StoredaftarRequest;
use App\Http\Requests\UpdatedaftarRequest;
use Nicolaslopezj\Searchable\SearchableTrait;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->filled('query')) {
            $data['daftar'] = daftar::search(request('query'))->paginate(10);
        }else{
            $data['daftar'] = daftar::latest()->paginate(10);
        }
        
        // $data['daftar'] = \App\Models\daftar::latest()->paginate(10);
        return view('daftar', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['ListPasien'] = pasien::orderBy('nama','ASC')->get();
        $data['listPoli'] = poli::orderBy('nama', 'ASC')->get();
        return view ('daftar_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $requestData = $request->validate([
        'tanggal_daftar' => 'required',
        'pasien_id' => 'required',
        'poli_id' => 'required',
        'keluhan' => 'required'
    ]) ;

    $poli = poli::findOrFail($requestData['poli_id']);
    $model = new daftar();
    $model->tanggal_daftar = $request->tanggal_daftar;
    $model->pasien_id = $request->pasien_id;
    $model->poli_id = $request->poli_id;
    $model->keluhan = $request->keluhan;
    $model->biaya = $poli->biaya;  // Tambahkan ini untuk menyimpan biaya ke database
    $model->save();

    flash('data disimpan')->success();
    return back();
}


    /**
     * Display the specified resource.
     */
    // public function show(daftar $daftar)
    public function show($id)
    {
        $data['daftar'] = \App\Models\Daftar::findOrFail($id);
        return view('daftar_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
     
        $requestData =$request->validate([
            'diagnosis' => 'required',
            'tindakan' => 'required',
        ]);

        $daftar = Daftar::findOrFail($id);
        $daftar->fill($requestData);
        $daftar->save();
        flash('data disempan')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(daftar $daftar)
    {
        $daftar->delete();
        flash('sudah dihapus')->success();
        return back(); 
    }
}
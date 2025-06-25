<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'keluhan' => 'required|string|max:255',
            'usia' => 'required|numeric|min:0',
            'kelamin' => 'required|in:pria,wanita',
            'alamat' => 'required|string|max:255',

        ]);

        Patient::create($validated);

        return redirect()->route('patients.index')->with('success', 'Pasien berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'keluhan' => 'required|string|max:255',
            'usia' => 'required|numeric|min:0',
            'kelamin' => 'required|in:pria,wanita',
            'alamat' => 'required|string|max:255',
            'status' => 'required|in:pending,setuju,tolak,ditangani,selesai'
        ]);

        $patient->update($validated);

        return redirect()->route('patients.index')->with('success', 'Data pasien berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Pasien berhasil dihapus!');
    }
}

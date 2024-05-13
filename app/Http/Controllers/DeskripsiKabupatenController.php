<?php

// app/Http/Controllers/DeskripsiKabupatenController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeskripsiKabupaten;

class DeskripsiKabupatenController extends Controller
{
    public function index()
    {
        $data = DeskripsiKabupaten::all();
        return view('visimisi.index', compact('data'));
    }

     public function index2()
    {
        $data = DeskripsiKabupaten::all();
        return view('Deskripsi', compact('data'));
    }

    public function create()
    {
        return view('visimisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Deskripsi' => 'required',
            'visi_misi' => 'required',
            'sejarah' => 'required',
            'geografis' => 'required',
        ]);

        DeskripsiKabupaten::create($request->all());

        return redirect()->route('visimisi.index')->with('success', 'Data added successfully.');
    }

    public function edit(DeskripsiKabupaten $deskripsiKabupaten)
    {
        return view('visimisi.edit', compact('deskripsiKabupaten'));
    }

    public function update(Request $request, DeskripsiKabupaten $deskripsiKabupaten)
    {
        $request->validate([
            'Deskripsi' => 'required',
            'visi_misi' => 'required',
            'sejarah' => 'required',
            'geografis' => 'required',
        ]);

        $deskripsiKabupaten->update($request->all());

        return redirect()->route('visimisi.index')->with('success', 'Data updated successfully.');
    }

    public function destroy(DeskripsiKabupaten $deskripsiKabupaten)
    {
        $deskripsiKabupaten->delete();

        return redirect()->route('visimisi.index')->with('success', 'Data deleted successfully.');
    }



}

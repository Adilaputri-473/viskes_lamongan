<?php

namespace App\Http\Controllers;

use App\Models\PenyakitMenular;
use Illuminate\Http\Request;

class PenyakitMenularController extends Controller
{
    public function add_penyakit_menular()
    {
        return view('admin.penyakit_menular.add_penyakit_menular');
    }

    public function upload_penyakit_menular(Request $request)
    {
        // Check if a penyakit with the same name (case-sensitive) already exists
        if (PenyakitMenular::where('indikator', $request->indikator)->exists()) {
            toastr()->timeOut(10000)->closeButton()->addError('Penyakit Menular already exists with this exact name.');
            return redirect()->back()->withInput();
        }
        
        $data = new PenyakitMenular;
        $data->indikator = $request->indikator;
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Penyakit Menular Added Successfully');
        
        return redirect('/view_penyakit_menular');
    }

    public function view_penyakit_menular()
    {
        $penyakit_menular = PenyakitMenular::paginate(10)->onEachSide(1);
        return view('admin.penyakit_menular.view_penyakit_menular', compact('penyakit_menular'));
    }

    public function delete_penyakit_menular($id)
    {
        $data = PenyakitMenular::find($id);
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Penyakit Menular Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_penyakit_menular($id)
    {
        $data = PenyakitMenular::find($id);
        
        return view('admin.penyakit_menular.update_penyakit_menular', compact('data'));
    }

    public function edit_penyakit_menular(Request $request, $id)
    {
        // Check if the new penyakit name (case-sensitive) already exists, excluding the current record
        if (PenyakitMenular::where('indikator', $request->indikator)
                     ->where('id', '!=', $id) // Exclude the current record by ID
                     ->exists()) {
            toastr()->timeOut(10000)->closeButton()->addError('Penyakit Menular already exists with this exact name.');
            return redirect()->back()->withInput();
        }
        
        $data = PenyakitMenular::find($id);
        $data->indikator = $request->indikator;
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Penyakit Menular Updated Successfully');

        return redirect('/view_penyakit_menular');  
    }
}
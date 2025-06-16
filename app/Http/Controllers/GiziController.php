<?php

namespace App\Http\Controllers;

use App\Models\Gizi;
use Illuminate\Http\Request;

class GiziController extends Controller
{
    public function add_gizi()
    {
        return view('admin.gizi.add_gizi');
    }

    public function upload_gizi(Request $request)
    {
        // Check if a penyakit with the same name (case-sensitive) already exists
        if (Gizi::where('indikator', $request->indikator)->exists()) {
            toastr()->timeOut(10000)->closeButton()->addError('Indikator Gizi already exists with this exact name.');
            return redirect()->back()->withInput();
        }
        
        $data = new Gizi;
        $data->indikator = $request->indikator;
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Indikator Gizi Added Successfully');
        
        return redirect('/view_gizi');
    }

    public function view_gizi()
    {
        $gizi = Gizi::paginate(10)->onEachSide(1);
        return view('admin.gizi.view_gizi', compact('gizi'));
    }

    public function delete_gizi($id)
    {
        $data = Gizi::find($id);
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Indikator Gizi Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_gizi($id)
    {
        $data = Gizi::find($id);
        
        return view('admin.gizi.update_gizi', compact('data'));
    }

    public function edit_gizi(Request $request, $id)
    {
        // Check if the new penyakit name (case-sensitive) already exists, excluding the current record
        if (Gizi::where('indikator', $request->indikator)
                     ->where('id', '!=', $id) // Exclude the current record by ID
                     ->exists()) {
            toastr()->timeOut(10000)->closeButton()->addError('Indikator Gizi already exists with this exact name.');
            return redirect()->back()->withInput();
        }
        
        $data = Gizi::find($id);
        $data->indikator = $request->indikator;
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Indikator Gizi Updated Successfully');

        return redirect('/view_gizi');  
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\IbuAnak;
use Illuminate\Http\Request;

class IbuAnakController extends Controller
{
    public function add_ibu_anak()
    {
        return view('admin.ibu_anak.add_ibu_anak');
    }

    public function upload_ibu_anak(Request $request)
    {
        // Check if a penyakit with the same name (case-sensitive) already exists
        if (IbuAnak::where('indikator', $request->indikator)->exists()) {
            toastr()->timeOut(10000)->closeButton()->addError('Indikator Kesehatan Ibu dan Anak already exists with this exact name.');
            return redirect()->back()->withInput();
        }
        
        $data = new IbuAnak;
        $data->indikator = $request->indikator;
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Indikator Kesehatan Ibu dan Anak Added Successfully');
        
        return redirect('/view_ibu_anak');
    }

    public function view_ibu_anak()
    {
        $ibu_anak = IbuAnak::paginate(10)->onEachSide(1);
        return view('admin.ibu_anak.view_ibu_anak', compact('ibu_anak'));
    }

    public function delete_ibu_anak($id)
    {
        $data = IbuAnak::find($id);
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Indikator Kesehatan Ibu dan Anak Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_ibu_anak($id)
    {
        $data = IbuAnak::find($id);
        
        return view('admin.ibu_anak.update_ibu_anak', compact('data'));
    }

    public function edit_ibu_anak(Request $request, $id)
    {
        // Check if the new penyakit name (case-sensitive) already exists, excluding the current record
        if (IbuAnak::where('indikator', $request->indikator)
                     ->where('id', '!=', $id) // Exclude the current record by ID
                     ->exists()) {
            toastr()->timeOut(10000)->closeButton()->addError('Indikator Kesehatan Ibu dan Anak already exists with this exact name.');
            return redirect()->back()->withInput();
        }
        
        $data = IbuAnak::find($id);
        $data->indikator = $request->indikator;
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Indikator Kesehatan Ibu dan Anak Updated Successfully');

        return redirect('/view_ibu_anak');  
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Google\Service\Datastore\Key;
use Illuminate\Support\Facades\Storage;

class KecamatanController extends Controller
{
    public function add_kecamatan()
    {
        return view('admin.kecamatan.add_kecamatan');
    }

    public function upload_kecamatan(Request $request)
    {
        // Check if a kecamatan with the same name (case-sensitive) already exists
        if (Kecamatan::where('kecamatan', $request->kecamatan)->exists()) {
            toastr()->timeOut(10000)->closeButton()->addError('Kecamatan already exists with this exact name.');
            return redirect()->back()->withInput();
        }
        
        $data = new Kecamatan;
        $data->kecamatan = $request->kecamatan;
        
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Kecamatan Added Successfully');
        
        return redirect('/view_kecamatan');
    }

    public function view_kecamatan()
    {
        $kecamatan = Kecamatan::paginate(10)->onEachSide(1);
        return view('admin.kecamatan.view_kecamatan', compact('kecamatan'));
    }

    public function delete_kecamatan($id)
    {
        $data = Kecamatan::find($id);
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kecamatan Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_kecamatan($id)
    {
        $data = Kecamatan::find($id);
        return view('admin.kecamatan.update_kecamatan', compact('data'));
    }

    public function edit_kecamatan(Request $request, $id)
    {
        // Check if the new kecamatan name (case-sensitive) already exists, excluding the current record
        if (Kecamatan::where('kecamatan', $request->kecamatan)
                     ->where('id', '!=', $id) // Exclude the current record by ID
                     ->exists()) {
            toastr()->timeOut(10000)->closeButton()->addError('Kecamatan already exists with this exact name.');
            return redirect()->back()->withInput();
        }
        
        $data = Kecamatan::find($id);
        $data->kecamatan = $request->kecamatan;
        
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kecamatan Updated Successfully');

        return redirect('/view_kecamatan');  
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function add_tahun()
    {
        return view('admin.tahun.add_tahun');
    }

    public function upload_tahun(Request $request)
    {
        // Check if the year already exists
    if (Tahun::where('tahun', $request->tahun)->exists()) {
        toastr()->timeOut(10000)->closeButton()->addError('Tahun already exists.');
        return redirect()->back();
    }
        $data = new Tahun;
        $data->tahun = $request->tahun;
        
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Tahun Added Successfully');
        
        return redirect('/view_tahun');
    }

    public function view_tahun()
    {
        $tahun = Tahun::paginate(10)->onEachSide(1);
        return view('admin.tahun.view_tahun', compact('tahun'));
    }

    public function delete_tahun($id)
    {
        $data = Tahun::find($id);
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Tahun Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_tahun($id)
    {
        $data = Tahun::find($id);
        return view('admin.tahun.update_tahun', compact('data'));
    }

    public function edit_tahun(Request $request, $id)
    {
        // Check if the year already exists, excluding the current record
    if (Tahun::where('tahun', $request->tahun)->where('id', '!=', $id)->exists()) {
        toastr()->timeOut(10000)->closeButton()->addError('Tahun already exists.');
        return redirect()->back();
    }
    
        $data = Tahun::find($id);
        $data->tahun = $request->tahun;
        
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Tahun Updated Successfully');

        return redirect('/view_tahun');  
    }
}
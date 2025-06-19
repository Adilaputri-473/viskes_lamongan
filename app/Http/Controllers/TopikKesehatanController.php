<?php

namespace App\Http\Controllers;

use App\Models\TopikKesehatan;
use Illuminate\Http\Request;

class TopikKesehatanController extends Controller
{
    public function add_topik_kesehatan()
    {
        return view('admin.topik_kesehatan.add_topik_kesehatan');
    }

    public function upload_topik_kesehatan(Request $request)
    {
        if (TopikKesehatan::where('topik_kesehatan', $request->topik_kesehatan)->exists()) {
            toastr()->timeOut(10000)->closeButton()->addError('Topik Kesehatan already exists with this exact name.');
            return redirect()->back()->withInput();
        }
        
        $data = new TopikKesehatan;
        $data->topik_kesehatan = $request->topik_kesehatan;
        
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Topik Kesehatan Added Successfully');
        
        return redirect('/view_topik_kesehatan');
    }

    public function view_topik_kesehatan()
    {
        $topik_kesehatan = TopikKesehatan::paginate(10)->onEachSide(1);
        return view('admin.topik_kesehatan.view_topik_kesehatan', compact('topik_kesehatan'));
    }

    public function delete_topik_kesehatan($id)
    {
        $data = TopikKesehatan::find($id);
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Topik Kesehatan Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_topik_kesehatan($id)
    {
        $data = TopikKesehatan::find($id);
        return view('admin.topik_kesehatan.update_topik_kesehatan', compact('data'));
    }

    public function edit_topik_kesehatan(Request $request, $id)
    {
        if (TopikKesehatan::where('topik_kesehatan', $request->topik_kesehatan)
                     ->where('id', '!=', $id) 
                     ->exists()) {
            toastr()->timeOut(10000)->closeButton()->addError('topik_kesehatan already exists with this exact name.');
            return redirect()->back()->withInput();
        }
        
        $data = TopikKesehatan::find($id);
        $data->topik_kesehatan = $request->topik_kesehatan;
        
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Topik Kesehatan Updated Successfully');

        return redirect('/view_topik_kesehatan');  
    }
}
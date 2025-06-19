<?php

namespace App\Http\Controllers;

use App\Models\IndikatorTopik;
use App\Models\TopikKesehatan;

use Illuminate\Http\Request;

class IndikatorTopikController extends Controller
{
   public function add_indikator_topik()
    {
        
        $topik_kesehatans = TopikKesehatan::all();

        return view('admin.indikator_topik.add_indikator_topik',compact('topik_kesehatans'));
    }
    public function upload_indikator_topik(Request $request)
    {
        
        $exists = IndikatorTopik::where('topik_kesehatan_id', $request->topik_kesehatan_id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Topik Kesehatan.');
            return redirect()->back()->withInput();
        }
        
        $data = new IndikatorTopik;
        $data-> indikator_topik = $request-> indikator_topik;
        $data-> infomasi = $request-> infomasi;
        $data-> topik_kesehatan_id = $request->topik_kesehatan_id; 
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Indikator Topik Added Successfully');
        
        return redirect('/view_indikator_topik');
    }

    public function view_indikator_topik()
    {
        $indikator_topik = IndikatorTopik::paginate(10)->onEachSide(1);
        return view('admin.indikator_topik.view_indikator_topik', compact('indikator_topik'));
    }

    public function delete_indikator_topik($id)
    {
        $data = IndikatorTopik::find($id);
        
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Indikator Topik Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_indikator_topik($id)
    {
        $data = IndikatorTopik::find($id);
        $topik_kesehatans = TopikKesehatan::all(); 
        return view('admin.indikator_topik.update_indikator_topik', compact('data', 'topik_kesehatan' ));
    }

    public function edit_indikator_topik(Request $request, $id)
    {
        
        // Check for duplicates excluding the current record ID
        $exists = IndikatorTopik::where('topik_kesehatan_id', $request->topik_kesehatan_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Topik Kesehatan.');
            return redirect()->back()->withInput();
        }
        
        $data = IndikatorTopik::find($id);
        $data->indikator_topik = $request->indikator_topik;
        $data->informasi = $request->informasi;
        $data->topik_kesehatan_id = $request->topik_kesehatan_id;
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Indikator Topik Updated Successfully');

        return redirect('/view_indikator_topik');  
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\VisualisasiKasusPenyakitMenular;
use App\Models\PenyakitMenular;
use App\Models\Tahun;
use Smalot\PdfParser\Parser;
use Illuminate\Http\Request;

class VisualisasiKasusPenyakitMenularController extends Controller
{
    public function add_visualisasi_kasus_penyakit_menular()
    {
        $tahuns = Tahun::all(); 
        $penyakit_menulars = PenyakitMenular::all();
        

        return view('admin.visualisasi_kasus_penyakit_menular.add_visualisasi_kasus_penyakit_menular',compact('tahuns', 'penyakit_menulars'));
    }
    public function upload_visualisasi_kasus_penyakit_menular(Request $request)
    {
        
        // Check if a record with the same combination exists
        $exists = VisualisasiKasusPenyakitMenular::where('tahun_id', $request->tahun_id)
            ->where('indikator_id', $request->indikator_id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Tahun, Indikator Penyakit');
            return redirect()->back()->withInput();
        }
        
        $data = new VisualisasiKasusPenyakitMenular;
        $data-> link_visualisasi = $request-> link_visualisasi;
        $data-> tahun_id = $request->tahun_id; 
        $data-> indikator_id = $request->indikator_id; 
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Penyakit Added Successfully');
        
        return redirect('/view_visualisasi_kasus_penyakit_menular');
    }

    public function view_visualisasi_kasus_penyakit_menular()
    {
        $visualisasi_kasus_penyakit_menular = VisualisasiKasusPenyakitMenular::paginate(10)->onEachSide(1);
        return view('admin.visualisasi_kasus_penyakit_menular.view_visualisasi_kasus_penyakit_menular', compact('visualisasi_kasus_penyakit_menular'));
    }

    public function delete_visualisasi_kasus_penyakit_menular($id)
    {
        $data = VisualisasiKasusPenyakitMenular::find($id);
        
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Penyakit Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_visualisasi_kasus_penyakit_menular($id)
    {
        $data = VisualisasiKasusPenyakitMenular::find($id);
        $tahuns = Tahun::all(); 
        $penyakit_menulars = PenyakitMenular::all(); 
        return view('admin.visualisasi_kasus_penyakit_menular.update_visualisasi_kasus_penyakit_menular', compact('data', 'tahuns', 'penyakit_menulars'));
    }

    public function edit_visualisasi_kasus_penyakit_menular(Request $request, $id)
    {
        
        // Check for duplicates excluding the current record ID
        $exists = VisualisasiKasusPenyakitMenular::where('tahun_id', $request->tahun_id)
            ->where('indikator_id', $request->indikator_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Tahun, Penyakit, and Puskesmas.');
            return redirect()->back()->withInput();
        }
        
        $data = VisualisasiKasusPenyakitMenular::find($id);
        $data->link_visualisasi = $request->link_visualisasi;
        $data->tahun_id = $request->tahun_id;
        $data->indikator_id = $request->indikator_id;
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Penyakit Updated Successfully');

        return redirect('/view_visualisasi_kasus_penyakit_menular');  
    }
    
}
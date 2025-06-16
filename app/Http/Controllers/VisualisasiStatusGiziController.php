<?php

namespace App\Http\Controllers;

use App\Models\VisualisasiStatusGizi;
use App\Models\Gizi;
use App\Models\Tahun;
use Smalot\PdfParser\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class VisualisasiStatusGiziController extends Controller
{
    public function add_visualisasi_status_gizi()
    {
        $tahuns = Tahun::all(); 
        $gizis = Gizi::all();

        return view('admin.visualisasi_status_gizi.add_visualisasi_status_gizi',compact('tahuns', 'gizis'));
    }
    public function upload_visualisasi_status_gizi(Request $request)
    {
        
        // Check if a record with the same combination exists
        $exists = VisualisasiStatusGizi::where('tahun_id', $request->tahun_id)
            ->where('indikator_id', $request->indikator_id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Tahun, Indikator Gizi');
            return redirect()->back()->withInput();
        }
        
        $data = new VisualisasiStatusGizi;
        $data-> link_visualisasi = $request-> link_visualisasi;
        $data-> tahun_id = $request->tahun_id; 
        $data-> indikator_id = $request->indikator_id; 
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Gizi Added Successfully');
        
        return redirect('/view_visualisasi_status_gizi');
    }

    public function view_visualisasi_status_gizi()
    {
        $visualisasi_status_gizi = VisualisasiStatusGizi::paginate(10)->onEachSide(1);
        return view('admin.visualisasi_status_gizi.view_visualisasi_status_gizi', compact('visualisasi_status_gizi'));
    }

    public function delete_visualisasi_status_gizi($id)
    {
        $data = VisualisasiStatusGizi::find($id);
        
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Gizi Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_visualisasi_status_gizi($id)
    {
        $data = VisualisasiStatusGizi::find($id);
        $tahuns = Tahun::all(); 
        $gizis = Gizi::all(); 
        return view('admin.visualisasi_status_gizi.update_visualisasi_status_gizi', compact('data', 'tahuns', 'gizis' ));
    }

    public function edit_visualisasi_status_gizi(Request $request, $id)
    {
        
        // Check for duplicates excluding the current record ID
        $exists = VisualisasiStatusGizi::where('tahun_id', $request->tahun_id)
            ->where('indikator_id', $request->indikator_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Tahun, Gizi');
            return redirect()->back()->withInput();
        }
        
        $data = VisualisasiStatusGizi::find($id);
        $data->jumlah = $request->jumlah;
        $data->tahun_id = $request->tahun_id;
        $data->indikator_id = $request->indikator_id;
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Gizi Updated Successfully');

        return redirect('/view_visualisasi_status_gizi');  
    }
}
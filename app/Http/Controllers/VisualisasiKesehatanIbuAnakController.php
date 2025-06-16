<?php

namespace App\Http\Controllers;

use App\Models\VisualisasiKesehatanIbuAnak;
use App\Models\IbuAnak;
use App\Models\Tahun;
use Smalot\PdfParser\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class VisualisasiKesehatanIbuAnakController extends Controller
{
    public function add_visualisasi_kesehatan_ibu_anak()
    {
        $tahuns = Tahun::all(); 
        $ibu_anaks = IbuAnak::all();

        return view('admin.visualisasi_kesehatan_ibu_anak.add_visualisasi_kesehatan_ibu_anak',compact('tahuns', 'ibu_anaks'));
    }
    public function upload_visualisasi_kesehatan_ibu_anak(Request $request)
    {
        
        // Check if a record with the same combination exists
        $exists = VisualisasiKesehatanIbuAnak::where('tahun_id', $request->tahun_id)
            ->where('indikator_id', $request->indikator_id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Tahun, Indikator Kesehatan Ibu Anak');
            return redirect()->back()->withInput();
        }
        
        $data = new VisualisasiKesehatanIbuAnak;
        $data-> link_visualisasi = $request-> link_visualisasi;
        $data-> tahun_id = $request->tahun_id; 
        $data-> indikator_id = $request->indikator_id; 
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Kesehatan Ibu Anak Added Successfully');
        
        return redirect('/view_visualisasi_kesehatan_ibu_anak');
    }

    public function view_visualisasi_kesehatan_ibu_anak()
    {
        $visualisasi_kesehatan_ibu_anak = VisualisasiKesehatanIbuAnak::paginate(10)->onEachSide(1);
        return view('admin.visualisasi_kesehatan_ibu_anak.view_visualisasi_kesehatan_ibu_anak', compact('visualisasi_kesehatan_ibu_anak'));
    }

    public function delete_visualisasi_kesehatan_ibu_anak($id)
    {
        $data = VisualisasiKesehatanIbuAnak::find($id);
        
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Kesehatan Ibu Anak Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_visualisasi_kesehatan_ibu_anak($id)
    {
        $data = VisualisasiKesehatanIbuAnak::find($id);
        $tahuns = Tahun::all(); 
        $ibu_anaks = IbuAnak::all(); 
        return view('admin.visualisasi_kesehatan_ibu_anak.update_visualisasi_kesehatan_ibu_anak', compact('data', 'tahuns', 'ibu_anaks' ));
    }

    public function edit_visualisasi_kesehatan_ibu_anak(Request $request, $id)
    {
        
        // Check for duplicates excluding the current record ID
        $exists = VisualisasiKesehatanIbuAnak::where('tahun_id', $request->tahun_id)
            ->where('indikator_id', $request->indikator_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Tahun, Kesehatan Ibu Anak');
            return redirect()->back()->withInput();
        }
        
        $data = VisualisasiKesehatanIbuAnak::find($id);
        $data->link_visualisasi = $request->link_visualisasi;
        $data->tahun_id = $request->tahun_id;
        $data->indikator_id = $request->indikator_id;
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Kesehatan Ibu Anak Updated Successfully');

        return redirect('/view_visualisasi_kesehatan_ibu_anak');  
    }

}
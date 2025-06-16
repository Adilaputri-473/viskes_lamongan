<?php

namespace App\Http\Controllers;

use App\Models\StatusGizi;
use App\Models\Gizi;
use App\Models\Kecamatan;
use App\Models\Tahun;
use Smalot\PdfParser\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\StatusGiziImport;
use Maatwebsite\Excel\Facades\Excel;


class StatusGiziController extends Controller
{
    public function add_status_gizi()
    {
        $tahuns = Tahun::all(); 
        $gizis = Gizi::all();
        $kecamatans = Kecamatan::all();

        return view('admin.status_gizi.add_status_gizi',compact('tahuns', 'gizis', 'kecamatans'));
    }
    public function upload_status_gizi(Request $request)
    {
        
        // Check if a record with the same combination exists
        $exists = StatusGizi::where('tahun_id', $request->tahun_id)
            ->where('indikator_id', $request->indikator_id)
            ->where('kecamatan_id', $request->kecamatan_id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Tahun, Indikator Gizi, and Kecamatan.');
            return redirect()->back()->withInput();
        }
        
        $data = new StatusGizi;
        $data-> jumlah = $request-> jumlah;
        $data-> tahun_id = $request->tahun_id; 
        $data-> indikator_id = $request->indikator_id; 
        $data-> kecamatan_id = $request->kecamatan_id; 
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Gizi Added Successfully');
        
        return redirect('/view_status_gizi');
    }

    public function view_status_gizi()
    {
        $status_gizi = StatusGizi::paginate(10)->onEachSide(1);
        return view('admin.status_gizi.view_status_gizi', compact('status_gizi'));
    }

    public function delete_status_gizi($id)
    {
        $data = StatusGizi::find($id);
        
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Gizi Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_status_gizi($id)
    {
        $data = StatusGizi::find($id);
        $tahuns = Tahun::all(); 
        $gizis = Gizi::all(); 
        $kecamatans = Kecamatan::all(); 
        return view('admin.status_gizi.update_status_gizi', compact('data', 'tahuns', 'gizis', 'kecamatans' ));
    }

    public function edit_status_gizi(Request $request, $id)
    {
        
        // Check for duplicates excluding the current record ID
        $exists = StatusGizi::where('tahun_id', $request->tahun_id)
            ->where('indikator_id', $request->indikator_id)
            ->where('kecamatan_id', $request->kecamatan_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Tahun, Gizi, and Puskesmas.');
            return redirect()->back()->withInput();
        }
        
        $data = StatusGizi::find($id);
        $data->jumlah = $request->jumlah;
        $data->tahun_id = $request->tahun_id;
        $data->indikator_id = $request->indikator_id;
        $data->kecamatan_id = $request->kecamatan_id;
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Gizi Updated Successfully');

        return redirect('/view_status_gizi');  
    }

    public function excel_status_gizi()
    {
        return view('admin.status_gizi.excel_status_gizi');
    }

    public function import_status_gizi(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:xlsx,xls,csv',
    ]);

    Excel::import(new StatusGiziImport, $request->file('file'));

    toastr()->timeOut(10000)->closeButton()->addSuccess('Data berhasil diimpor.');

        return redirect('/view_status_gizi');  
}
}
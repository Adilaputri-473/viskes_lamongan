<?php

namespace App\Http\Controllers;

use App\Models\KasusPenyakitMenular;
use App\Models\PenyakitMenular;
use App\Models\Kecamatan;
use App\Models\Tahun;
use Smalot\PdfParser\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\KasusPenyakitMenularImport;
use Maatwebsite\Excel\Facades\Excel;


class KasusPenyakitMenularController extends Controller
{
    public function add_kasus_penyakit_menular()
    {
        $tahuns = Tahun::all(); 
        $penyakit_menulars = PenyakitMenular::all();
        $kecamatans = Kecamatan::all();

        return view('admin.kasus_penyakit_menular.add_kasus_penyakit_menular',compact('tahuns', 'penyakit_menulars', 'kecamatans'));
    }
    public function upload_kasus_penyakit_menular(Request $request)
    {
        
        // Check if a record with the same combination exists
        $exists = KasusPenyakitMenular::where('tahun_id', $request->tahun_id)
            ->where('indikator_id', $request->indikator_id)
            ->where('kecamatan_id', $request->kecamatan_id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Tahun, Indikator Penyakit, and Kecamatan.');
            return redirect()->back()->withInput();
        }
        
        $data = new KasusPenyakitMenular;
        $data-> jumlah = $request-> jumlah;
        $data-> tahun_id = $request->tahun_id; 
        $data-> indikator_id = $request->indikator_id; 
        $data-> kecamatan_id = $request->kecamatan_id; 
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Penyakit Added Successfully');
        
        return redirect('/view_kasus_penyakit_menular');
    }

    public function view_kasus_penyakit_menular()
    {
        $kasus_penyakit_menular = KasusPenyakitMenular::paginate(10)->onEachSide(1);
        return view('admin.kasus_penyakit_menular.view_kasus_penyakit_menular', compact('kasus_penyakit_menular'));
    }

    public function delete_kasus_penyakit_menular($id)
    {
        $data = KasusPenyakitMenular::find($id);
        
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Penyakit Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_kasus_penyakit_menular($id)
    {
        $data = KasusPenyakitMenular::find($id);
        $tahuns = Tahun::all(); 
        $penyakit_menulars = PenyakitMenular::all(); 
        $kecamatans = Kecamatan::all(); 
        return view('admin.kasus_penyakit_menular.update_kasus_penyakit_menular', compact('data', 'tahuns', 'penyakit_menulars', 'kecamatans' ));
    }

    public function edit_kasus_penyakit_menular(Request $request, $id)
    {
        
        // Check for duplicates excluding the current record ID
        $exists = KasusPenyakitMenular::where('tahun_id', $request->tahun_id)
            ->where('indikator_id', $request->indikator_id)
            ->where('kecamatan_id', $request->kecamatan_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Tahun, Penyakit, and Puskesmas.');
            return redirect()->back()->withInput();
        }
        
        $data = KasusPenyakitMenular::find($id);
        $data->jumlah = $request->jumlah;
        $data->tahun_id = $request->tahun_id;
        $data->indikator_id = $request->indikator_id;
        $data->kecamatan_id = $request->kecamatan_id;
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Penyakit Updated Successfully');

        return redirect('/view_kasus_penyakit_menular');  
    }
    public function excel_kasus_penyakit_menular()
    {
        return view('admin.kasus_penyakit_menular.excel_kasus_penyakit_menular');
    }

    public function import_kasus_penyakit_menular(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:xlsx,xls,csv',
    ]);

    Excel::import(new KasusPenyakitMenularImport, $request->file('file'));

    toastr()->timeOut(10000)->closeButton()->addSuccess('Impor Data Berhasil');
        
        return redirect('/view_kasus_penyakit_menular');
}
}
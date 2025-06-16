<?php

namespace App\Http\Controllers;

use App\Models\KesehatanIbuAnak;
use App\Models\IbuAnak;
use App\Models\Kecamatan;
use App\Models\Tahun;
use Smalot\PdfParser\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\KesehatanIbuAnakImport;
use Maatwebsite\Excel\Facades\Excel;


class KesehatanIbuAnakController extends Controller
{
    public function add_kesehatan_ibu_anak()
    {
        $tahuns = Tahun::all(); 
        $ibu_anaks = IbuAnak::all();
        $kecamatans = Kecamatan::all();

        return view('admin.kesehatan_ibu_anak.add_kesehatan_ibu_anak',compact('tahuns', 'ibu_anaks', 'kecamatans'));
    }
    public function upload_kesehatan_ibu_anak(Request $request)
    {
        
        // Check if a record with the same combination exists
        $exists = KesehatanIbuAnak::where('tahun_id', $request->tahun_id)
            ->where('indikator_id', $request->indikator_id)
            ->where('kecamatan_id', $request->kecamatan_id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Tahun, Indikator Kesehatan Ibu Anak, and Kecamatan.');
            return redirect()->back()->withInput();
        }
        
        $data = new KesehatanIbuAnak;
        $data-> jumlah = $request-> jumlah;
        $data-> tahun_id = $request->tahun_id; 
        $data-> indikator_id = $request->indikator_id; 
        $data-> kecamatan_id = $request->kecamatan_id; 
        
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Kesehatan Ibu Anak Added Successfully');
        
        return redirect('/view_kesehatan_ibu_anak');
    }

    public function view_kesehatan_ibu_anak()
    {
        $kesehatan_ibu_anak = KesehatanIbuAnak::paginate(10)->onEachSide(1);
        return view('admin.kesehatan_ibu_anak.view_kesehatan_ibu_anak', compact('kesehatan_ibu_anak'));
    }

    public function delete_kesehatan_ibu_anak($id)
    {
        $data = KesehatanIbuAnak::find($id);
        
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Kesehatan Ibu Anak Deleted Successfully');

         return redirect()->back(); 
    }

    public function update_kesehatan_ibu_anak($id)
    {
        $data = KesehatanIbuAnak::find($id);
        $tahuns = Tahun::all(); 
        $ibu_anaks = IbuAnak::all(); 
        $kecamatans = Kecamatan::all(); 
        return view('admin.kesehatan_ibu_anak.update_kesehatan_ibu_anak', compact('data', 'tahuns', 'ibu_anaks', 'kecamatans' ));
    }

    public function edit_kesehatan_ibu_anak(Request $request, $id)
    {
        
        // Check for duplicates excluding the current record ID
        $exists = KesehatanIbuAnak::where('tahun_id', $request->tahun_id)
            ->where('indikator_id', $request->indikator_id)
            ->where('kecamatan_id', $request->kecamatan_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            toastr()->timeOut(10000)->closeButton()->addError('Duplicate entry with the same Tahun, Kesehatan Ibu Anak, and Puskesmas.');
            return redirect()->back()->withInput();
        }
        
        $data = KesehatanIbuAnak::find($id);
        $data->jumlah = $request->jumlah;
        $data->tahun_id = $request->tahun_id;
        $data->indikator_id = $request->indikator_id;
        $data->kecamatan_id = $request->kecamatan_id;
        
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Kasus Kesehatan Ibu Anak Updated Successfully');

        return redirect('/view_kesehatan_ibu_anak');  
    }

    public function excel_kesehatan_ibu_anak()
    {
        return view('admin.kesehatan_ibu_anak.excel_kesehatan_ibu_anak');
    }

    public function import_kesehatan_ibu_anak(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:xlsx,xls,csv',
    ]);

    Excel::import(new KesehatanIbuAnakImport, $request->file('file'));

    toastr()->timeOut(10000)->closeButton()->addSuccess('Impor data berhasil');
        
        return redirect('/view_kesehatan_ibu_anak');
}
}
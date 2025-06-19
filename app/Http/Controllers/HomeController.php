<?php

namespace App\Http\Controllers;

use App\Models\IbuAnak;
use App\Models\Gizi;
use App\Models\KesehatanIbuAnak;
use App\Models\Tahun;
use App\Models\PenyakitMenular;
use App\Models\VisualisasiKasusPenyakitMenular;
use App\Models\VisualisasiKesehatanIbuAnak;
use App\Models\VisualisasiStatusGizi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $totalIbuAnaks = IbuAnak::count();
        // $totalGizis = Gizi::count();
        // $totalPenyakitMenulars = PenyakitMenular::count();
        $indikatorPenyakit = PenyakitMenular::pluck('indikator');
        $indikatorGizi = Gizi::pluck('indikator');
        $indikatorIbuAnak = IbuAnak::pluck('indikator');

        $items = [
            [
                'url' => '/penyakit_menular',
                'icon' => 'fas fa-virus',
                'label' => 'Penyakit Menular',
                'indicators' => $indikatorPenyakit,
            ],
            [
                'url' => '/status_gizi',
                'icon' => 'fas fa-apple-alt',
                'label' => 'Status Gizi',
                'indicators' => $indikatorGizi,
            ],
            [
                'url' => '/kia',
                'icon' => 'fas fa-baby',
                'label' => 'Kesehatan Ibu dan Anak',
                'indicators' => $indikatorIbuAnak,
            ],
        ];

        return view('home.index', compact('items'));
    }
    public function restriction_file()
    {
         return view('home.restriction_file');
    }
    public function restriction_download()
    {
         return view('home.restriction_download');
    }
    public function restriction_data()
    {
         return view('home.restriction_data');
    }

    public function penyakit_menular()
    {
        $tahuns = Tahun::orderBy('tahun', 'desc')->get();
        $penyakit_menulars = PenyakitMenular::orderBy('indikator')->get();

        // Ambil semua visualisasi, nanti kita filter di frontend pakai JS
        $visualisasi = VisualisasiKasusPenyakitMenular::with(['tahun', 'penyakit_menular'])->get();
        
         return view('home.penyakit_menular', compact('tahuns', 'penyakit_menulars', 'visualisasi'));
    }
    public function status_gizi()
    {
        $tahuns = Tahun::orderBy('tahun', 'desc')->get();
        $gizis = Gizi::orderBy('indikator')->get();

        // Ambil semua visualisasi, nanti kita filter di frontend pakai JS
        $visualisasi = VisualisasiStatusGizi::with(['tahun', 'gizi'])->get();
        
         return view('home.status_gizi', compact('tahuns', 'gizis', 'visualisasi'));
  }
    public function kia()
    {
        $tahuns = Tahun::orderBy('tahun', 'desc')->get();
        $ibu_anaks = IbuAnak::orderBy('indikator')->get();

        // Ambil semua visualisasi, nanti kita filter di frontend pakai JS
        $visualisasi = VisualisasiKesehatanIbuAnak::with(['tahun', 'ibu_anak'])->get();
        
         return view('home.kia', compact('tahuns', 'ibu_anaks', 'visualisasi'));
  }
    // public function phbs()
    // {
    //     $tahuns = Tahun::orderBy('tahun', 'desc')->get();
    //     $gizis = Gizi::orderBy('indikator')->get();

    //     // Ambil semua visualisasi, nanti kita filter di frontend pakai JS
    //     $visualisasi = VisualisasiStatusGizi::with(['tahun', 'gizi'])->get();
        
    //      return view('home.phbs', compact('tahuns', 'gizis', 'visualisasi'));
    // }
}
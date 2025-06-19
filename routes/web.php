<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\TopikKesehatanController;
use App\Http\Controllers\IndikatorTopikController;
use App\Http\Controllers\PenyakitMenularController;
use App\Http\Controllers\GiziController;
use App\Http\Controllers\IbuAnakController;
use App\Http\Controllers\KasusPenyakitMenularController;
use App\Http\Controllers\StatusGiziController;
use App\Http\Controllers\KesehatanIbuAnakController;
use App\Http\Controllers\VisualisasiKasusPenyakitMenularController;
use App\Http\Controllers\VisualisasiStatusGiziController;
use App\Http\Controllers\VisualisasiKesehatanIbuAnakController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index']);
Route::get('/beranda', [HomeController::class, 'index']);
Route::get('/penyakit_menular', [HomeController::class, 'penyakit_menular']);
Route::get('/status_gizi', [HomeController::class, 'status_gizi']);
Route::get('/kia', [HomeController::class, 'kia']);
Route::get('/phbs', [HomeController::class, 'phbs']);
Route::get('/restriction_file', [HomeController::class, 'restriction_file']);
Route::get('/restriction_download', [HomeController::class, 'restriction_download']);
Route::get('/restriction_data', [HomeController::class, 'restriction_data']);

Route::get('lihat-pdf', function () {
    return redirect('https://link-ke-pdf.com/file.pdf');
})->middleware(['auth']);



// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return redirect('/login');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/redirect-after-login', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin/dashboard');
    } else {
        return redirect('/'); // user biasa tetap di index
    }
});



Route::middleware(['auth', 'verified', 'is_admin'])->group(function ()
 {
    Route::get('admin/dashboard', [AdminController::class, 'index']);
     // Redirect /dashboard ke /admin/dashboard
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    Route::get('add_user', [AdminController::class, 'add_user']);
    Route::post('upload_user', [AdminController::class, 'upload_user']);
    Route::get('view_user', [AdminController::class, 'view_user']);
    Route::get('delete_user/{id}', [AdminController::class, 'delete_user']);
    Route::get('update_user/{id}', [AdminController::class, 'update_user']);
    Route::post('edit_user/{id}', [AdminController::class, 'edit_user']);

    Route::get('add_kecamatan', [KecamatanController::class, 'add_kecamatan']);
    Route::post('upload_kecamatan', [KecamatanController::class, 'upload_kecamatan']);
    Route::get('view_kecamatan', [KecamatanController::class, 'view_kecamatan']);
    Route::get('delete_kecamatan/{id}', [KecamatanController::class, 'delete_kecamatan']);
    Route::get('update_kecamatan/{id}', [KecamatanController::class, 'update_kecamatan']);
    Route::post('edit_kecamatan/{id}', [KecamatanController::class, 'edit_kecamatan']);

    Route::get('add_tahun', [TahunController::class, 'add_tahun']);
    Route::post('upload_tahun', [TahunController::class, 'upload_tahun']); 
    Route::get('view_tahun', [TahunController::class, 'view_tahun']);
    Route::get('delete_tahun/{id}', [TahunController::class, 'delete_tahun']);
    Route::get('update_tahun/{id}', [TahunController::class, 'update_tahun']);
    Route::post('edit_tahun/{id}', [TahunController::class, 'edit_tahun']);

    Route::get('add_topik_kesehatan', [TopikKesehatanController::class, 'add_topik_kesehatan']);
    Route::post('upload_topik_kesehatan', [TopikKesehatanController::class, 'upload_topik_kesehatan']);
    Route::get('view_topik_kesehatan', [TopikKesehatanController::class, 'view_topik_kesehatan']);
    Route::get('delete_topik_kesehatan/{id}', [TopikKesehatanController::class, 'delete_topik_kesehatan']);
    Route::get('update_topik_kesehatan/{id}', [TopikKesehatanController::class, 'update_topik_kesehatan']);
    Route::post('edit_topik_kesehatan/{id}', [TopikKesehatanController::class, 'edit_topik_kesehatan']);
    
    Route::get('add_indikator_topik', [IndikatorTopikcontroller::class, 'add_indikator_topik']);
    Route::post('upload_indikator_topik', [IndikatorTopikcontroller::class, 'upload_indikator_topik']);
    Route::get('view_indikator_topik', [IndikatorTopikcontroller::class, 'view_indikator_topik']);
    Route::get('delete_indikator_topik/{id}', [IndikatorTopikcontroller::class, 'delete_indikator_topik']);
    Route::get('update_indikator_topik/{id}', [IndikatorTopikcontroller::class, 'update_indikator_topik']);
    Route::post('edit_indikator_topik/{id}', [IndikatorTopikcontroller::class, 'edit_indikator_topik']);
    
    Route::get('add_penyakit_menular', [PenyakitMenularController::class, 'add_penyakit_menular']);
    Route::post('upload_penyakit_menular', [PenyakitMenularController::class, 'upload_penyakit_menular']); 
    Route::get('view_penyakit_menular', [PenyakitMenularController::class, 'view_penyakit_menular']);
    Route::get('delete_penyakit_menular/{id}', [PenyakitMenularController::class, 'delete_penyakit_menular']);
    Route::get('update_penyakit_menular/{id}', [PenyakitMenularController::class, 'update_penyakit_menular']);
    Route::post('edit_penyakit_menular/{id}', [PenyakitMenularController::class, 'edit_penyakit_menular']);

    Route::get('add_gizi', [GiziController::class, 'add_gizi']);
    Route::post('upload_gizi', [GiziController::class, 'upload_gizi']); 
    Route::get('view_gizi', [GiziController::class, 'view_gizi']);
    Route::get('delete_gizi/{id}', [GiziController::class, 'delete_gizi']);
    Route::get('update_gizi/{id}', [GiziController::class, 'update_gizi']);
    Route::post('edit_gizi/{id}', [GiziController::class, 'edit_gizi']);

    Route::get('add_ibu_anak', [IbuAnakController::class, 'add_ibu_anak']);
    Route::post('upload_ibu_anak', [IbuAnakController::class, 'upload_ibu_anak']); 
    Route::get('view_ibu_anak', [IbuAnakController::class, 'view_ibu_anak']);
    Route::get('delete_ibu_anak/{id}', [IbuAnakController::class, 'delete_ibu_anak']);
    Route::get('update_ibu_anak/{id}', [IbuAnakController::class, 'update_ibu_anak']);
    Route::post('edit_ibu_anak/{id}', [IbuAnakController::class, 'edit_ibu_anak']);

    Route::get('add_kasus_penyakit_menular', [KasusPenyakitMenularController::class, 'add_kasus_penyakit_menular']);
    Route::post('upload_kasus_penyakit_menular', [KasusPenyakitMenularController::class, 'upload_kasus_penyakit_menular']); 
    Route::get('view_kasus_penyakit_menular', [KasusPenyakitMenularController::class, 'view_kasus_penyakit_menular']);
    Route::get('delete_kasus_penyakit_menular/{id}', [KasusPenyakitMenularController::class, 'delete_kasus_penyakit_menular']);
    Route::get('update_kasus_penyakit_menular/{id}', [KasusPenyakitMenularController::class, 'update_kasus_penyakit_menular']);
    Route::post('edit_kasus_penyakit_menular/{id}', [KasusPenyakitMenularController::class, 'edit_kasus_penyakit_menular']);
    Route::get('/excel_kasus_penyakit_menular', [KasusPenyakitMenularController::class, 'excel_kasus_penyakit_menular']);
    Route::post('/import_kasus_penyakit_menular', [KasusPenyakitMenularController::class, 'import_kasus_penyakit_menular']);


    Route::get('add_status_gizi', [StatusGiziController::class, 'add_status_gizi']);
    Route::post('upload_status_gizi', [StatusGiziController::class, 'upload_status_gizi']); 
    Route::get('view_status_gizi', [StatusGiziController::class, 'view_status_gizi']);
    Route::get('delete_status_gizi/{id}', [StatusGiziController::class, 'delete_status_gizi']);
    Route::get('update_status_gizi/{id}', [StatusGiziController::class, 'update_status_gizi']);
    Route::post('edit_status_gizi/{id}', [StatusGiziController::class, 'edit_status_gizi']);
    Route::get('/excel_status_gizi', [StatusGiziController::class, 'excel_status_gizi']);
    Route::post('/import_status_gizi', [StatusGiziController::class, 'import_status_gizi']);

    Route::get('add_kesehatan_ibu_anak', [KesehatanIbuAnakController::class, 'add_kesehatan_ibu_anak']);
    Route::post('upload_kesehatan_ibu_anak', [KesehatanIbuAnakController::class, 'upload_kesehatan_ibu_anak']); 
    Route::get('view_kesehatan_ibu_anak', [KesehatanIbuAnakController::class, 'view_kesehatan_ibu_anak']);
    Route::get('delete_kesehatan_ibu_anak/{id}', [KesehatanIbuAnakController::class, 'delete_kesehatan_ibu_anak']);
    Route::get('update_kesehatan_ibu_anak/{id}', [KesehatanIbuAnakController::class, 'update_kesehatan_ibu_anak']);
    Route::post('edit_kesehatan_ibu_anak/{id}', [KesehatanIbuAnakController::class, 'edit_kesehatan_ibu_anak']);
    Route::get('/excel_kesehatan_ibu_anak', [KesehatanIbuAnakController::class, 'excel_kesehatan_ibu_anak']);
    Route::post('/import_kesehatan_ibu_anak', [KesehatanIbuAnakController::class, 'import_kesehatan_ibu_anak']);
    
    Route::get('add_visualisasi_kasus_penyakit_menular', [VisualisasiKasusPenyakitMenularController::class, 'add_visualisasi_kasus_penyakit_menular']);
    Route::post('upload_visualisasi_kasus_penyakit_menular', [VisualisasiKasusPenyakitMenularController::class, 'upload_visualisasi_kasus_penyakit_menular']); 
    Route::get('view_visualisasi_kasus_penyakit_menular', [VisualisasiKasusPenyakitMenularController::class, 'view_visualisasi_kasus_penyakit_menular']);
    Route::get('delete_visualisasi_kasus_penyakit_menular/{id}', [VisualisasiKasusPenyakitMenularController::class, 'delete_visualisasi_kasus_penyakit_menular']);
    Route::get('update_visualisasi_kasus_penyakit_menular/{id}', [VisualisasiKasusPenyakitMenularController::class, 'update_visualisasi_kasus_penyakit_menular']);
    Route::post('edit_visualisasi_kasus_penyakit_menular/{id}', [VisualisasiKasusPenyakitMenularController::class, 'edit_kasus_penyakit_menular']);
    
    Route::get('add_visualisasi_status_gizi', [VisualisasiStatusGiziController::class, 'add_visualisasi_status_gizi']);
    Route::post('upload_visualisasi_status_gizi', [VisualisasiStatusGiziController::class, 'upload_visualisasi_status_gizi']); 
    Route::get('view_visualisasi_status_gizi', [VisualisasiStatusGiziController::class, 'view_visualisasi_status_gizi']);
    Route::get('delete_visualisasi_status_gizi/{id}', [VisualisasiStatusGiziController::class, 'delete_visualisasi_status_gizi']);
    Route::get('update_visualisasi_status_gizi/{id}', [VisualisasiStatusGiziController::class, 'update_visualisasi_status_gizi']);
    Route::post('edit_visualisasi_status_gizi/{id}', [VisualisasiStatusGiziController::class, 'edit_visualisasi_status_gizi']);
    
    Route::get('add_visualisasi_kesehatan_ibu_anak', [VisualisasiKesehatanIbuAnakController::class, 'add_visualisasi_kesehatan_ibu_anak']);
    Route::post('upload_visualisasi_kesehatan_ibu_anak', [VisualisasiKesehatanIbuAnakController::class, 'upload_visualisasi_kesehatan_ibu_anak']); 
    Route::get('view_visualisasi_kesehatan_ibu_anak', [VisualisasiKesehatanIbuAnakController::class, 'view_visualisasi_kesehatan_ibu_anak']);
    Route::get('delete_visualisasi_kesehatan_ibu_anak/{id}', [VisualisasiKesehatanIbuAnakController::class, 'delete_visualisasi_kesehatan_ibu_anak']);
    Route::get('update_visualisasi_kesehatan_ibu_anak/{id}', [VisualisasiKesehatanIbuAnakController::class, 'update_visualisasi_kesehatan_ibu_anak']);
    Route::post('edit_visualisasi_kesehatan_ibu_anak/{id}', [VisualisasiKesehatanIbuAnakController::class, 'edit_visualisasi_kesehatan_ibu_anak']);
   
});

require __DIR__.'/auth.php';
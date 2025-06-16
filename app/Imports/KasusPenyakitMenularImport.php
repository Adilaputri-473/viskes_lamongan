<?php

namespace App\Imports;

use App\Models\KasusPenyakitMenular;
use App\Models\Tahun;
use App\Models\Kecamatan;
use App\Models\PenyakitMenular;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KasusPenyakitMenularImport implements ToModel, WithHeadingRow
{
    public function model(array $row) 
    {
        $kecamatanId = Kecamatan::where('kecamatan', $row['kecamatan'])->value('id');
        $tahunId = Tahun::where('tahun', $row['tahun'])->value('id');
        $indikatorId = PenyakitMenular::where('indikator', $row['indikator'])->value('id');

        // Optional: kalau data tidak ditemukan, bisa di-skip atau return null
        if (!$kecamatanId || !$tahunId || !$indikatorId) {
            return null;
        }

        return new KasusPenyakitMenular([
            'kecamatan_id' => $kecamatanId,
            'tahun_id' => $tahunId,
            'indikator_id' => $indikatorId,
            'jumlah' => isset($row['jumlah']) ? $row['jumlah'] : 0,
        ]);
    }
}
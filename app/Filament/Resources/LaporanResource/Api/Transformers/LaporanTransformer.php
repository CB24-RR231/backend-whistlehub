<?php
namespace App\Filament\Resources\LaporanResource\Api\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Resources\Json\JsonResource;

class LaporanTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'kategori_id' => $this->kategori_id,
            'kepada' => $this->kepada,
            'judul' => $this->judul,
            'isi' => $this->isi,
            'lokasi' => $this->lokasi,
            'telp' => $this->telp,
            'lampiran' => $request->lampiran,
            'tanggal_kejadian' => $this->created_at
        ];

    }
}

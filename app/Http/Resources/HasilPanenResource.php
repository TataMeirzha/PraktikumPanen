<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HasilPanenResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_komoditas' => $this->nama_komoditas,
            'jumlah_kg' => $this->jumlah_kg,
            'tanggal_panen' => $this->tanggal_panen,
            'created_at' => $this->created_at,
        ];
    }
}
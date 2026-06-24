<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHasilPanenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_komoditas' => 'required|string|max:255',
            'jumlah_kg' => 'required|numeric|min:0',
            'tanggal_panen' => 'nullable|date',
        ];
    }
}
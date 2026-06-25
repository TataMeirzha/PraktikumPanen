<?php

namespace App\Http\Controllers;

use App\Models\HasilPanen;
use App\Http\Requests\StoreHasilPanenRequest;
use App\Http\Resources\HasilPanenResource;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PanenController extends Controller
{
    // GET ALL + Filtering & Pagination
    public function index(Request $request)
    {
        $query = HasilPanen::query();

        // Filter nama komoditas
        if ($request->has('commodity')) {
            $query->where('nama_komoditas', 'like', '%' . $request->commodity . '%');
        }

        // Filter rentang tanggal
        if ($request->has('start_date')) {
            $query->whereDate('tanggal_panen', '>=', $request->start_date);
        }

        if ($request->has('end_date')) {
            $query->whereDate('tanggal_panen', '<=', $request->end_date);
        }

        $harvests = $query->paginate(10);
        return HasilPanenResource::collection($harvests);
    }

        // POST - Create
        public function store(StoreHasilPanenRequest $request)
        {
            $harvest = HasilPanen::create($request->validated());
            return (new HasilPanenResource($harvest))
                ->additional(['message' => 'Data panen berhasil dicatat'])
                ->response()
                ->setStatusCode(201);
        }

    // GET BY ID
    public function show($id)
    {
        try {
            $harvest = HasilPanen::findOrFail($id);
            return new HasilPanenResource($harvest);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Resource tidak ditemukan',
                'message' => 'Data panen dengan ID ' . $id . ' tidak ada.',
            ], 404);
        }
    }

    // PUT/PATCH - Update
    public function update(StoreHasilPanenRequest $request, $id)
    {
        try {
            $panen = HasilPanen::findOrFail($id);
            $panen->update($request->validated());
            return new HasilPanenResource($panen);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Resource tidak ditemukan',
                'message' => 'Data panen dengan ID ' . $id . ' tidak ada.',
            ], 404);
        }
    }

    // DELETE
    public function destroy($id)
    {
        try {
            $panen = HasilPanen::findOrFail($id);
            $panen->delete();
            return response()->json([
                'message' => 'Data panen berhasil dihapus',
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Resource tidak ditemukan',
                'message' => 'Data panen dengan ID ' . $id . ' tidak ada.',
            ], 404);
        }
    }
}
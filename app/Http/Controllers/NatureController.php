<?php

namespace App\Http\Controllers;

use App\Models\Nature;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NatureController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $type = $request->input('_type');
        $query = $request->input('q');

        return $type === 'query' ? $this->searchNatures($query) : response()->json();
    }

    private function searchNatures($search): JsonResponse
    {
        $query = Nature::query()->where('active', true)
            ->has('trees', '>', 0);

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('code', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('tags', function ($query) use ($search) {
                        $query->where('tag', 'LIKE', '%' . $search . '%');
                    });
            })->with('tags');
        }

        $natures = $query->distinct();

        return response()->json($natures->get(['id', 'code', 'description']));
    }
}

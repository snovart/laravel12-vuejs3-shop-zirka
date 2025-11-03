<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Product; // uncomment when model exists

class SearchController extends Controller
{
    // Plain Blade search page
    public function index(Request $request)
    {
        $q = trim((string)$request->query('query', ''));

        // TODO: plug real search here when models are ready
        // $results = Product::query()
        //     ->when($q !== '', fn($qrb) => $qrb->where('title', 'like', "%{$q}%"))
        //     ->limit(50)
        //     ->get();

        return view('front.search', [
            'title'   => __('ui.search_results'),
            'query'   => $q,
            // 'items' => $results,
        ]);
    }
}

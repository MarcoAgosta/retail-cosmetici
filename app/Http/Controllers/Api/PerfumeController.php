<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function index(Request $request){

        $search = $request->header('search');

        if ($search===""){
            $perfumes=Perfume::paginate();
            return response()->json([
                'success'=>true,
                'results'=>$perfumes
            ]);

        }else{
            // Search in the title and body columns from the posts table
            $perfumes = Perfume::query()
                ->where('name', 'like', '%' . $search . '%')
                ->get();

            // Return the search view with the resluts compacted
            return response()->json([
                'success'=>true,
                'results'=>$perfumes
            ]);
        };
        
    }

    public function show($id){
        $perfume=Perfume::findOrFail($id);
        return response()->json($perfume);
    }
}

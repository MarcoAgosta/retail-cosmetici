<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

        if (!$search){
            $perfumes=Perfume::paginate();
            return response()->json([
                'success'=>true,
                'results'=>$perfumes
            ]);

        }else{
            
            $perfumes = Perfume::query()
                ->where('name', 'like', '%' . $search . '%')
                ->paginate();


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

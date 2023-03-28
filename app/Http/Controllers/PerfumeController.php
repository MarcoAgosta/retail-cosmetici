<?php

namespace App\Http\Controllers;

use App\Models\Perfume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerfumeController extends Controller
{
    public function index(){
        $perfumes=Perfume::all();
        return view("perfumes.index", compact("perfumes"));
    }

    public function show($id){
        $perfume=Perfume::findOrFail($id);
        return view("perfumes.show", compact("perfume"));
    }

    public function create(){
        return view("perfumes.create");
    }

    public function store(Request $request){
        $data=$request->all();
        $path=Storage::disk('public')->put("perfume_img", $data["cover_img"]);
        $perfume= new Perfume();
        $perfume->fill($data);
        $perfume["cover_img"]=$path;
        $perfume->save();

        return redirect()->route("perfumes.show", $perfume->id);
    }

    public function edit($id){
        $perfume=Perfume::find($id);
        if(!$perfume){
            abort(404, "Ritenta.");
        };

        return view("perfumes.edit", compact("perfume"));
    }

    public function update(Request $request, $id){
        $data=$request->all();
        $perfume=Perfume::findOrFail($id);
        $perfume->fill($data);
        $perfume->save();

        return redirect()->route("perfumes.show", $perfume->id);
    }

    public function destroy($id){
        $perfume=Perfume::findOrFail($id);
        $perfume->delete();
        return redirect()->route("perfumes.index");
    }
}

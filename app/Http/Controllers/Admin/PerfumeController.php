<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerfumeController extends Controller
{
    public function index(){
        $perfumes=Perfume::all();
        return view("admin.perfumes.index", compact("perfumes"));
    }

    public function show($id){
        $perfume=Perfume::findOrFail($id);
        return view("admin.perfumes.show", compact("perfume"));
    }

    public function create(){
        return view("admin.perfumes.create");
    }

    public function store(Request $request){
        $data=$request->all();
        $path=Storage::disk('public')->put("perfume_img", $data["cover_img"]);
        $perfume= new Perfume();
        $perfume->fill($data);
        $perfume["cover_img"]=$path;
        $perfume->save();

        return redirect()->route("admin.perfumes.show", $perfume->id);
    }

    public function edit($id){
        $perfume=Perfume::find($id);
        if(!$perfume){
            abort(404, "Ritenta.");
        };

        return view("admin.perfumes.edit", compact("perfume"));
    }

    public function update(Request $request, $id){
        $data=$request->all();
        $perfume=Perfume::findOrFail($id);
        $perfume->fill($data);
        $perfume->save();

        return redirect()->route("admin.perfumes.show", $perfume->id);
    }

    public function destroy($id){
        $perfume=Perfume::findOrFail($id);
        $perfume->delete();
        return redirect()->route("admin.perfumes.index");
    }
}

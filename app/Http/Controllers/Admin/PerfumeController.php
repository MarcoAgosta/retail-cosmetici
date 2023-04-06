<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerfumeRequest;
use App\Http\Requests\UpdatePerfumeRequest;
use App\Models\Perfume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PerfumeController extends Controller
{
    public function index(){
        $allPerfumes=Perfume::all();
        $id_admin=Auth::user()->id;
        $perfumes=[];
        foreach($allPerfumes as $perfume){
            if($perfume->user_id==$id_admin){
                array_push($perfumes, $perfume);
            };
        };
        return view("admin.perfumes.index", compact("perfumes"));
    }

    public function show($id){
        $perfume=Perfume::findOrFail($id);
        $id_admin=Auth::user()->id;
        if($id_admin===$perfume->user_id){
            return view("admin.perfumes.show", compact("perfume"));
        }else{
            return redirect()->route("dashboard");
        }   
    }

    public function create(){
        return view("admin.perfumes.create");
    }

    public function store(StorePerfumeRequest $request){
        $data=$request->all();
        $perfume= new Perfume();
        if (key_exists('product_img', $data)){
            $path=Storage::disk('public')->put("product_img", $data["product_img"]);
            $perfume->product_img=$path;
        }
        $perfume->name=$data["name"];
        $perfume->description=$data["description"];
        $perfume->brand=$data["brand"];
        $perfume->user_id=Auth::id();
        $perfume->save();

        return redirect()->route("admin.perfumes.show", $perfume->id);
    }

    public function edit($id){
        $perfume=Perfume::find($id);
        $id_admin=Auth::user()->id;
        if(!$perfume){
            abort(404, "Ritenta.");
        };
        if($id_admin===$perfume->user_id){
            return view("admin.perfumes.edit", compact("perfume"));
        }else{
            return redirect()->route("dashboard");
        }   
    }

    public function update(UpdatePerfumeRequest $request, $id){
        $data=$request->all();
        $perfume=Perfume::findOrFail($id);
        if (key_exists('product_img', $data)) {
            $path = Storage::disk('public')->put('product_img', $data['product_img']);
            $perfume->product_img=$path;
        }
        $perfume->name=$data["name"];
        $perfume->description=$data["description"];
        $perfume->brand=$data["brand"];
        $perfume->save();

        return redirect()->route("admin.perfumes.show", $perfume->id);
    }

    public function destroy($id){
        $perfume=Perfume::findOrFail($id);
        $perfume->delete();
        return redirect()->route("admin.perfumes.index");
    }
}

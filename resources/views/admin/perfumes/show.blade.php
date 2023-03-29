@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-5">
        <h2>{{$perfume->name}}</h2>
    </div>
    <div class="row mt-5">
        <div class="col-4 offset-1">
            <img src="{{ asset('storage/' . $perfume->product_img) }}" class="w-100" alt="Immagine del profumo {{$perfume->name}}">
        </div>
        <div class="col-6 d-flex justify-content-between flex-column">
            <p>
                {{$perfume->description}}
            </p>
            <div class="d-flex justify-content-end">
                <a href="{{route('admin.perfumes.edit', $perfume->id)}}" style="margin-right:1rem" class="btn btn-primary">Modifica profumo</a>
                <form action="{{route('admin.perfumes.show', $perfume->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Elimina profumo</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
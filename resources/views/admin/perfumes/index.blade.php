@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-4 mt-4 mb-5">
        @foreach($perfumes as $perfume)
        <div class="col-3">
            <div class="card" style="height:425px" >
                <div class="card-img-top">
                    <img class="w-100" src="{{ asset('storage/' . $perfume->product_img) }}" alt="Card image cap">
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                    <h5 class="card-title mb-3 text-center">{{$perfume->name}}</h5>
                    <a href="{{route('admin.perfumes.show', $perfume->id)}}" class="btn btn-primary">Mostra il profumo</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
.card-img-top{
    border-bottom: 1px solid lightgray;
}
</style>
@endsection
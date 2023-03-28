@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-4 mt-4">
        @foreach($perfumes as $perfume)
        <div class="col-3">
            <div class="card" >
                <img class="card-img-top" src="{{ asset('storage/' . $perfume->product_img) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title mb-3 text-center">{{$perfume->name}}</h5>
                    <a href="{{route('admin.perfumes.show', $perfume->id)}}" class="btn btn-primary">Mostra il profumo</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
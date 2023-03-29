@extends('layouts.app')

@section('content')
    
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger mt-5">
            I dati inseriti non sono validi:

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('admin.perfumes.store')}}" class="mt-5" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">Nome</label>
            <input name="name" type="text" class="form-control" id="name" >
        </div>

        <div class="mb-3">
            <label class="form-label" for="descrizione">Descrizione</label>
            <textarea name="description" class="form-control" id="desciption" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="img">Immagine del prodotto</label>
            <input name="product_img" type="file" class="form-control" id="product_img">
        </div>

        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
</div>

@endsection
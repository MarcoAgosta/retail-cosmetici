@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">

                        <div class="col d-flex justify-content-between flex-column align-items-center">
                            <a class="h-100 d-flex justify-content-between flex-column align-items-center" 
                            href="{{ route('admin.perfumes.index') }}">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="w-50" src="{{ url('profumi.jpg') }}" alt="Disegno di profumi di varie dimensioni">
                            </div>
                            <h4 class="text-center">Mostra tutti i profumi salvati</h4>
                            </a>
                        </div>

                        <div class="col">
                            <a class="h-100 d-flex justify-content-between flex-column align-items-center" 
                            href="{{ route('admin.perfumes.create') }}">
                            <div class="d-flex justify-content-center align-items-center flex-grow-1">
                                <img class="w-50" src="{{ url('profumo.jpg') }}" alt="Disegno di un solo profumo">
                            </div>
                            <h4  class="text-center">Aggiungi un nuovo profumo</h4>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

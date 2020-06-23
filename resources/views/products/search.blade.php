@extends('layouts.master')
@section('content')
@foreach ($products as $product)
    <div class="col-md-6">
        <div class="row no-gutters border rounded d-flex align-items-center flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-info">
                @foreach ($product->categories as $categorie)
                    {{$categorie->name}}
                @endforeach
            </strong>
        <h5 class="mb-0">{{$product->title}}</h5>
            <div class="mb-auto text-muted">{{$product->created_at->format('d/m/Y')}}</div>
            <p class="mb-3 text-muted">{{$product->subtitle}}</p>
            <strong class="mb-4 display-4 text-secondary">{{$product->getPrice()}}</strong>
        <a href="{{route('products.show', $product->slug)}}" class="stretched-link btn btn-info"><i class="fa fa-location-arrow" aria-hidden="true"></i> Voir l'article</a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="{{asset('storage/' . $product->image)}}" alt="">
        </div>
        </div>
    </div>
    @endforeach
    {{$products->appends(request()->input())->links()}}
@endsection
